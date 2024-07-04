<div class="modal fade" id="intiveUsers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="mdi mdi-account-plus-outline"></i> Thêm bạn bè
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <form id="form-add-friend" class="form-group">
                        <label for="invite_emails" class="col-form-label">Địa chỉ email</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="invite_emails"
                                   placeholder="Email...">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-success">
                                    <i class="mdi mdi-plus"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <label for="invite_topic" class="col-form-label">Lời mở đẩu</label>
                        <input type="text" class="form-control" id="invite_topic"
                               placeholder="Viết gì đó về bạn....">
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <span>Người dùng</span>
                    <span class="text-muted small">Tổng <span class="count-add-friend">0</span> người dùng</span>
                </div>
                <hr>
                <div>
                    <ul class="list-group list-add-friend list-group-unlined"></ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="invite_add-friend" class="btn btn-primary">Thêm bạn bè</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(document).on('submit','#form-add-friend',function(e){
            e.preventDefault();
            let email = $(this).find('#invite_emails').val().trim();
            if(email == ''){
                $(this).find('#invite_emails').prop('placeholder','Vui lòng nhập email');
            }else if(!/\S+@\S+\.\S+/.test(email)){
                alert('Không phải email');
            }else{
                $(this).find('button').html('<i class="fa-solid loader fa-spinner"></i>');
                axios.get('{{route('friend.show','email')}}'.replace('email',email))
                    .then(function(response){
                        if(response.status == 200){
                            let user = response.data.data;
                            if(user.statusFriend && (user.statusFriend == 'friend')){
                                alert('Các bạn đã là bạn bè');
                            }else{
                                let listId = $(".list-friend-add-id").map(function() {
                                    return $(this).data('id');
                                }).get();
                                if(!listId.includes(user.id)){
                                    let button;
                                    if(user.statusFriend){
                                        if(user.statusFriend == 'seen'){
                                            button = `
                                                <button data-id="${user.id}" data-friend="${user.idStatusFriend}" type="button"
                                                        class="list-friend-add-id text-danger btn-clost-friend btn text-center d-flex align-items-center ml-auto"
                                                       data-toggle="tooltip" title="Hủy lời mời kết bạn với người này"
                                                           data-placement="right" href="#">
                                                   <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            `;
                                        }else{
                                            button = `
                                                <button data-id="${user.id}" data-friend="${user.idStatusFriend}" type="button"
                                                        class="list-friend-add-id text-danger btn-confirm-friend btn text-center d-flex align-items-center ml-auto"
                                                         data-toggle="tooltip" title="Chập nhận lời mời kết bạn"
                                                           data-placement="right" href="#">
                                                    <i class="fa-solid fa-check"></i>
                                                </button>
                                            `;
                                        }
                                    }else{
                                        button = `
                                            <button data-id="${user.id}" type="button"
                                                    class="list-friend-add-id text-danger btn-delete-friend btn text-center d-flex align-items-center ml-auto"
                                                    data-toggle="tooltip" title="Không muốn gửi cho người này nữa"
                                                           data-placement="right" href="#">
                                                <i class="mdi mdi-delete-outline border"></i>
                                            </button>
                                        `;
                                    }

                                    let content = `
                                    <li class="list-group-item px-0 d-flex">
                                        <figure class="avatar mr-3">
                                            <img src="${user.avatar}" class="rounded-circle" alt="image">
                                        </figure>
                                        <div>
                                            <div>${user.name}</div>
                                            <div class="small text-muted">${user.email}</div>
                                        </div>
                                        `+
                                            button
                                        +`
                                    </li>
                                `;
                                    $(".list-group.list-add-friend").append(content);
                                    $(".count-add-friend").text(parseInt($(".count-add-friend").text())+1)
                                }
                            }
                        }
                    })
                    .catch(function(error){
                        let status = error.response.status;
                        let errorMsg = error.response.data.error;
                        if(status == 400){
                            alert(errorMsg);
                        }else if(status == 404){
                            alert(errorMsg)
                        }
                    })
                    .finally(function(){
                        $('#form-add-friend').find('#invite_emails').val('');
                        $('#form-add-friend').find('button').html('<i class="mdi mdi-plus"></i>');
                    })
            }
        })
        $(document).on('click','.btn-delete-friend',function(){
            $(this).closest('.list-group-item').remove();
            $(".count-add-friend").text(parseInt($(".count-add-friend").text())-1)
        })
        $(document).on('click','.btn-confirm-friend',function(){
            let idFriend = $(this).data('friend');
            axios.put('{{route('friend.update','id')}}'.replace('id',idFriend),{status: 0})
                .then(response => {
                    $(this).closest('.list-group-item').remove();
                    $(".count-add-friend").text(parseInt($(".count-add-friend").text())-1)
                })
        });
        $(document).on('click','.btn-clost-friend',function(){
            let idFriend = $(this).data('friend');
            axios.delete('{{route('friend.destroy','id')}}'.replace('id',idFriend))
                .then(response => {
                    if(response.status == 204){
                        $(this).closest('.list-group-item').remove();
                        $(".count-add-friend").text(parseInt($(".count-add-friend").text())-1)
                    }
                })
        });
        $(document).on('click','#invite_add-friend',function(){
            $(this).html('<i class="fa-solid loader fa-spinner"></i>');
            let message = $("#invite_topic").val().trim() ?? '';
            let listId = $(".list-friend-add-id").map(function() {
                return $(this).data('id');
            }).get();
            if(listId.length == 0){
                alert('Vui lòng tìm người dùng bạn muốn kết bạn!');
            }else{
                axios.post('{{route('friend.store')}}',{data:listId,message})
                    .then(response => {
                        $('.list-group.list-add-friend.list-group-unlined').html('');
                        $(".count-add-friend").text('0');
                        alert('Đã gửi yêu cầu kết bạn!');
                    })
                    .finally(function(){
                        $('#invite_add-friend').html('Thêm bạn bè');
                    })
            }
        })
    </script>
@endpush
