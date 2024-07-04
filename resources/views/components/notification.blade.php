<div class="right-sidebar" id="notifications">
    <div class="right-sidebar-header">
        <span class="right-sidebar-title">Thông báo</span>
        <a data-right-sidebar="settings" title="Settings" href="#">
            <i class="mdi mdi-cog"></i>
        </a>
        <a href="#" class="right-sidebar-close">
            <i class="mdi mdi-close"></i>
        </a>
    </div>
    <div class="right-sidebar-content">
        <ul class="list-group list-group-flush list-notify">
            @foreach(auth()->user()->notifications as $notification)
            <li class="list-group-item py-3 px-0 d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <figure style="min-width:40px" class="avatar avatar-state-warning mr-3">
                            <span class="avatar-title bg-info-bright text-info rounded-circle">
                                <img style="width: 100%; height: 100%;object-fit: cover;border-radius:50%" src="{{$notification->data['avatar']}}" alt="">
                            </span>
                    </figure>
                    <div>
                        <div>
                            <span class="text-primary">{{$notification->data['username']}}</span> {{$notification->data['message']}} <br>
                        </div>
                        <span class="text-muted small">
                            <i class="mdi mdi-clock-outline small mr-1"></i>{{$notification->created_at->format('h:i d-m-Y')}}
                        </span>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="mdi mdi-dots-horizontal"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <button data-id="{{$notification->id}}" type="button" class="delete-notification dropdown-item">Xóa</button>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@push('script')
    <script>
        $(document).on('click','.delete-notification',function(){
            let that = $(this);
            if(confirm('Bạn chắc chắn muốn xóa thông báo này chứ?')){
                axios.delete("{{route('delete.notification','id')}}".replace('id',$(this).data('id')))
                    .then(response => {
                        that.closest('.list-group-item').remove();
                    })
            }
        })
    </script>
@endpush
