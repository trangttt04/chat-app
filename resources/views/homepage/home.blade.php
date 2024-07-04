@extends('layouts.web')
@section('content')
    <!-- preloader -->
    @include('components.loader')
    <!-- ./ preloader -->

    <!-- layout -->
    @include('components.layout')
    <!-- ./ layout -->

    <!-- Notifications -->
    @include('components.notification')
    <!-- ./ Notifications -->

    <!-- User profile -->
    @include('components.profile')
    <!-- ./ User profile -->

    <!-- Settings -->
    @include('components.setting')
    <!-- ./ Settings -->

    <!-- disconnected modals -->
    @include('components.disconnect')
    <!-- ./ disconnected modals -->

    <!-- voice call modals -->
    @include('modals.call')
    <!-- ./ Video call modals -->

    <!-- add friends modals -->
    @include('modals.friend')
    <!-- ./ add friends modals -->

    <!-- new group modals -->
    @include('modals.group')
    <!-- ./ new group modals -->

    <!-- setting modals -->
    @include('modals.setting')
    <!-- ./ setting modals -->

    <!-- edit profile modals -->
    @include('modals.profile')
    <!-- ./ edit profile modals -->
@endsection
@push('script')
    <script>
        $("#close-chat").click();
        $(document).on('click','#close-chat',function(){
            $("#id-chat-user").val('');
        });
    </script>
    <script type="module">
        Echo.join('online')
            .here((users) => {
                axios.post('{{route('change.online')}}',{
                    id: {{auth()->id()}},
                    data: 1,
                })
            })
            .joining((user) => {
                $(".status-user-"+user.id).addClass('avatar-state-warning');
                axios.put('{{route('change.message')}}',{user})
                axios.post('{{route('change.online')}}',{
                    id: user.id,
                    data: 1,
                })
                    .then(function(response){
                        if(response.status == 200){
                            if(response.data.data.is_online){
                                console.log('boo');
                                $(".status-user-"+user.id).addClass('avatar-state-warning');
                                $(".user-chat-"+user.id).addClass('avatar-state-success');
                                $(".user-chat-status-"+user.id).text('Online');
                                $(".user-chat-"+user.id).addClass('avatar-state-success');
                            }
                        }
                    })
            })
            .leaving((user) => {
                axios.post('{{route('change.online')}}',{
                    id: user.id,
                    data: 0,
                })
                    .then(function(response){
                        if(response.status == 200){
                            $(".user-chat-"+user.id).removeClass('avatar-state-success');
                            $(".status-user-"+user.id).removeClass('avatar-state-warning');
                            $(".user-chat-status-"+user.id).text('Offline');
                        }
                    })
            })
    </script>
    <script type="module">
        Echo.private('notification.friend.toggle.{{auth()->id()}}')
            .notification((notification) => {
                let content = `
                    <li class="list-group-item py-3 px-0 d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <figure style="min-width:40px" class="avatar avatar-state-warning mr-3">
                                <span class="avatar-title bg-info-bright text-info rounded-circle">
                                    <img style="width: 100%; height: 100%;object-fit: cover;border-radius:50%" src="${notification.avatar}" alt="">
                                </span>
                            </figure>
                            <div>
                                <div>
                                    <span class="text-primary">${notification.username}</span> ${notification.message} <br>
                                </div>
                                <span class="text-muted small">
                                    <i class="mdi mdi-clock-outline small mr-1"></i>{{now()->format('h:i d-m-Y')}}
                                </span>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown">
                                <i class="mdi mdi-dots-horizontal"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button data-id="${notification.id ?? ''}" type="button" class="delete-notification dropdown-item">Xóa</button>
                            </div>
                        </div>
                    </li>
                `;
                $('.list-group.list-group-flush.list-notify').prepend(content);
            });
    </script>
@endpush
