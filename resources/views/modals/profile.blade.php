<div class="modal fade" id="editProfile" ng-controller="EditProfileController" tabindex="-1" role="dialog"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <form id="form-add" class="modal-content" enctype="multipart/form-data">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="mdi mdi-clipboard-edit-outline mr-2"></i> Chỉnh sửa thông tin
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal" role="tab"
                           aria-controls="personal" aria-selected="true">Cá nhân</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#about" role="tab" aria-controls="about"
                           aria-selected="false">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#social-links" role="tab"
                           aria-controls="social-links" aria-selected="false">Mạng xã hội</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="personal" role="tabpanel">
                        <div>
                            <div class="form-group">
                                <label for="fullname" class="col-form-label">Họ và tên</label>
                                <div class="input-group">
                                    <input type="text" class="form-control full-name-input" id="fullname" value="{{auth()->user()->name}}">
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-account-outline"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Ảnh đại diện</label>
                                <div class="d-flex align-items-center">
                                    <div>
                                        <figure class="avatar mr-3 item-rtl">
                                            <img src="{{auth()->user()->avatar}}" id="image-avatar-toggle"
                                                 class="image-avatar-user rounded-circle" alt="image">
                                        </figure>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" id="image-avatar" class="custom-file-input"
                                               onchange="toggleImage(this,$('#image-avatar-toggle'))" id="image">
                                        <label class="custom-file-label" for="customFile">Chọn ảnh</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-form-label">Địa chỉ</label>
                                <div class="input-group">
                                    <input type="text" id="address" class="form-control address-input" value="{{optional(auth()->user()->profile)->address }}" placeholder="Địa chỉ">
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-map-marker-outline"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Số điện thoại</label>
                                <div class="input-group">
                                    <input type="text" class="form-control phone-input" value="{{optional(auth()->user()->profile)->phone }}" id="phone"
                                           placeholder="Số điện thoại">
                                    <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="mdi mdi-phone"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="about" role="tabpanel">
                        <div>
                            <div class="form-group">
                                <label for="about-text" class="col-form-label">Viết một chút gì đó giới thiệu về
                                    bạn</label>
                                <textarea class="form-control about-input" id="about-text">{{optional(auth()->user()->profile)->about }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="social-links" role="tabpanel">
                        <div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" value="{{$social['Facebook'] ?? ''}}" class="form-control facebook-input"
                                           id="facebook" placeholder="https://facebook.com">
                                    <div class="input-group-append">
                                            <span class="input-group-text bg-facebook">
                                                <i class="mdi mdi-facebook"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input value="{{$social['Twitter'] ?? ''}}" type="text" class="form-control twitter-input"
                                           id="twitter" placeholder="https://twitter.com">
                                    <div class="input-group-append">
                                            <span class="input-group-text bg-twitter">
                                                <i class="mdi mdi-twitter"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input value="{{$social['Instagram'] ?? ''}}" type="text" class="form-control instagram-input"
                                           id="instagram" placeholder="https://instagram.com">
                                    <div class="input-group-append">
                                            <span class="input-group-text bg-instagram">
                                                <i class="mdi mdi-instagram"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input value="{{$social['Youtube'] ?? ''}}" type="text" class="form-control youtube-input"
                                           id="youtube" placeholder="https://youtube.com">
                                    <div class="input-group-append">
                                            <span class="input-group-text bg-youtube">
                                                <i class="mdi mdi-youtube"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input value="{{$social['Google'] ?? ''}}" type="text" class="form-control google-input"
                                           id="google" placeholder="https://google.com">
                                    <div class="input-group-append">
                                            <span class="input-group-text bg-google">
                                                <i class="mdi mdi-google"></i>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="btn-edit-profile" class="btn btn-primary">Lưu thông tin</button>
            </div>
        </form>
    </div>
</div>
@push('style')
    <style>
        @keyframes loader {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
        .loader{
            animation: loader 1s linear infinite;
        }
    </style>
@endpush
@push('script')
    <script>

        $(document).on('submit','#form-add',function(e){
            e.preventDefault();
            let fullname = $("#fullname").val();
            let about = $("#about-text").val();
            let address = $("#address").val();
            let phone = $("#phone").val();
            let image = $("#image-avatar").prop('files')[0];

            let formData = new FormData();
            formData.append('fullname', fullname);
            formData.append('about', about);
            formData.append('address', address);
            formData.append('phone', phone);
            formData.append('image', image);
            $("#btn-edit-profile").html('<i class="fa-solid loader fa-spinner"></i>');
            $("#btn-edit-profile").addClass('disabled');
            axios.post("{{route('change.profile')}}",formData)
                .then(response => {
                    console.log(response);
                })
                .finally(function(){
                    $("#btn-edit-profile").removeClass('disabled');
                    $("#btn-edit-profile").text('Lưu thông tin');
                })

            let facebook = $('#facebook').val();
            let twitter = $('#twitter').val();
            let instagram = $('#instagram').val();
            let youtube = $('#youtube').val();
            let google = $('#google').val();
            let data = {
                1: facebook,
                2: twitter,
                3: instagram,
                4: youtube,
                5: google,
            };
            axios.post('{{{route('change.social')}}}',data)
                .then(response=>{
                    console.log(response);
                })
        })

        function toggleImage(input, image){
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    image.attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
