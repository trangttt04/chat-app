<div class="layout">
    <!-- navigation -->
    <nav class="navigation">
        <div class="nav-group">
            <ul>
                <li class="logo">
                    <a href="#">
                        <img src="{{ asset('assets/media/img/logo.png') }}" alt="logo">
                    </a>
                </li>
                <li class="navigation-action-button dropright" title="Thêm" data-placement="right">
                    <a href="#" data-intro-js="1" data-toggle="dropdown">
                        <i class="mdi mdi-plus"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item" data-left-sidebar="friends">Start Chat</a>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#newGroup">Add Group</a>
                        <a href="#" class="dropdown-item" data-toggle="modal" id="modal-intiveUsers"
                           data-target="#intiveUsers">Thêm bạn bè</a>
                    </div>
                </li>
                <li>
                    <a class="active" data-intro-js="2" data-left-sidebar="chats" href="#" data-toggle="tooltip"
                       title="Trò chuyện" data-placement="right">
                        <span class="badge badge-warning"></span>
                        <i data-feather="message-circle"></i>
                    </a>
                </li>
                <li>
                    <a data-left-sidebar="friends" href="#" data-toggle="tooltip" title="Bạn bè"
                       data-placement="right">
                        <span class="badge badge-danger"></span>
                        <i data-feather="user"></i>
                    </a>
                </li>
                <li>
                    <a data-left-sidebar="favorites" data-toggle="tooltip" title="Yêu thích" data-placement="right"
                       href="#">
                        <i data-feather="star"></i>
                    </a>
                </li>
                <li class="brackets">
                    <a data-left-sidebar="archived" href="#" data-toggle="tooltip" title="Lưu trữ"
                       data-placement="right">
                        <i data-feather="archive"></i>
                    </a>
                </li>
                <li class="d-none d-lg-block" data-toggle="tooltip" title="Settings" data-placement="right">
                    <a href="#" data-toggle="modal" data-right-sidebar="settings">
                        <i data-feather="settings"></i>
                    </a>
                </li>
                <li data-toggle="tooltip" title="User menu" data-placement="right">
                    <a href="login.html" data-intro-js="3" data-toggle="dropdown">
                        <figure class="avatar avatar-sm">
                            <img src="{{auth()->user()->avatar}}" class="image-avatar-user rounded-circle" alt="image">
                        </figure>
                    </a>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#editProfile">Chỉnh sửa
                            trang cá nhân</a>
                        <a href="#" class="dropdown-item show-profile" data-email="{{auth()->user()->email}}"
                           data-right-sidebar="user-profile">Trang cá nhân</a>
                        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#settingsModal">Cài
                            đặt</a>
                        <a href="#" class="dropdown-item d-none d-md-block example-app-tour-start">Bắt đầu</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('logout')}}" class="dropdown-item text-danger">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- ./ navigation -->

    <!-- Chat left sidebar -->
    <div id="chats" class="left-sidebar open">
        <div class="left-sidebar-header">
            <div class="story-block">
                <h4 class="mb-4">Stories</h4>
                <div class="story-items mb-4" data-intro-js="4">
                    <div class="story-item">
                        <a href="#" class="avatar avatar-border-primary">
                            <span class="avatar-title bg-info rounded-circle">M</span>
                            <span class="story-content">Matteo Reedy</span>
                        </a>
                    </div>
                    <div class="story-item">
                        <a href="#" class="avatar avatar-border-success">
                            <img src="{{ asset('assets/media/img/avatar6.jpg') }}" class="rounded-circle" alt="image">
                            <span class="story-content">Meredith Dyet</span>
                        </a>
                    </div>
                    <div class="story-item">
                        <a href="#" class="avatar avatar-border-primary">
                            <span class="avatar-title bg-success rounded-circle">C</span>
                            <span class="story-content">Cesar Weems</span>
                        </a>
                    </div>
                    <div class="story-item">
                        <a href="#" class="avatar">
                            <img src="{{ asset('assets/media/img/avatar2.jpg') }}" class="rounded-circle" alt="image">
                            <span class="story-content">Pansy Coghill</span>
                        </a>
                    </div>
                    <div class="story-item">
                        <a href="#" class="avatar">
                            <img src="{{ asset('assets/media/img/avatar7.jpg') }}" class="rounded-circle" alt="image">
                            <span class="story-content">Cullen Scyone</span>
                        </a>
                    </div>
                    <div class="story-item">
                        <a href="#" class="avatar">
                            <img src="{{ asset('assets/media/img/avatar1.jpg') }}" class="rounded-circle" alt="image">
                            <span class="story-content">North Boorer</span>
                        </a>
                    </div>
                    <div class="story-item">
                        <a href="#" class="avatar">
                            <img src="{{ asset('assets/media/img/avatar9.jpg') }}" class="rounded-circle" alt="image">
                            <span class="story-content">Dilan Maasze</span>
                        </a>
                    </div>
                    <div class="story-item">
                        <a href="#" class="avatar">
                            <img src="{{ asset('assets/media/img/avatar5.jpg') }}" class="rounded-circle" alt="image">
                            <span class="story-content">Antons Cornier</span>
                        </a>
                    </div>
                </div>
            </div>
            <form>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn" type="button">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search chats">
                </div>
            </form>
        </div>
        <div class="left-sidebar-content">
            <ul class="list-group list-group-flush">
                @foreach($friends as $friend)
                    @php
                        $countMessage = $friend->messageFrom()->where('seen','<=',1)->count();
                    @endphp
                    <li data-email="{{$friend->email}}"
                        class="list-group-item-{{$friend->id}} list-group-item {{((optional($friend->last_message)->to_id == auth()->id()) && ($countMessage > 0)) ? 'unread-chat' : ''}}">
                        <div>
                            <figure
                                class="avatar status-user-{{$friend->id}} {{$friend->is_online != 0 ? 'avatar-state-warning' : ''}} mr-3">
                                <img src="{{$friend->avatar}}" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>{{$friend->name}}</h5>
                                @if ($friend->last_message)
                                    <p class="last-message-{{$friend->id}}">{{(optional($friend->last_message)->from_id == auth()->id()) ? 'Bạn: ': ''}}{{ $friend->last_message->body }}</p>
                                @else
                                    <p class="last-message-{{$friend->id}}">Bắt đầu cuộc trò chuyện ngay!</p>
                                @endif
                            </div>
                            <div class="users-list-action">
                                @if((optional($friend->last_message)->to_id == auth()->id()) && $countMessage > 0)
                                    <div class="new-message-count">{{$countMessage}}</div>
                                @endif
                                @if($friend->last_message)
                                    <small
                                        class="time-new-{{$friend->id}}">{{ optional($friend->last_message)->created_at->format('h:i A') }}</small>
                                @endif
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- ./ Chat left sidebar -->

    <!-- Friends left sidebar -->
    <div id="friends" class="left-sidebar">
        <div class="left-sidebar-header">
            <form>
                <h4 class="mb-4">Bạn bè</h4>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn" type="button">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Tìm kiếm đoạn chat...">
                </div>
            </form>
        </div>
        <div class="left-sidebar-content">
            <!--  -->
            <ul class="list-group list-group-flush">
                @foreach($friends as $friend)
                    <li class="list-group-item" data-email="{{$friend->email}}">
                        <div>
                            <figure
                                class="status-user-{{$friend->id}} avatar mr-3 {{$friend->is_online != 0 ? 'avatar-state-warning' : ''}}">
                                <img src="{{$friend->avatar}}" class="rounded-circle" alt="image">
                            </figure>
                        </div>
                        <div class="users-list-body">
                            <div>
                                <h5>{{$friend->name}}</h5>
                                <p>{{$friend->email}}</p>
                            </div>
                            <div class="users-list-action">
                                <div class="action-toggle">
                                    <div class="dropdown">
                                        <a data-toggle="dropdown" href="#">
                                            <i class="mdi mdi-dots-horizontal"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item">Nhắn tin</a>
                                            <a href="#" data-email="{{$friend->email}}"
                                               data-right-sidebar="user-profile" class="show-profile dropdown-item">Trang
                                                cá nhân</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item text-danger">Chặn</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- ./ Friends left sidebar -->
    <input type="hidden" value="" id="id-chat-user">
    <!-- Favorites left sidebar -->
    <div id="favorites" class="left-sidebar">
        <div class="left-sidebar-header">
            <form>
                <h4 class="mb-4">Favorites</h4>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn" type="button">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search favorites">
                </div>
            </form>
        </div>
        <div class="left-sidebar-content">
            <ul class="list-group list-group-flush users-list">
                <li class="list-group-item">
                    <div class="users-list-body">
                        <div>
                            <h5>Jennica Kindred</h5>
                            <p>I know how important this file is to you. You can trust me ;)</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Remove favorites</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="users-list-body">
                        <div>
                            <h5>Marvin Rohan</h5>
                            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Remove favorites</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="users-list-body">
                        <div>
                            <h5>Frans Hanscombe</h5>
                            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Remove favorites</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="users-list-body">
                        <div>
                            <h5>Karl Hubane</h5>
                            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Remove favorites</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Favorites left sidebar -->

    <!-- Archived left sidebar -->
    <div id="archived" class="left-sidebar">
        <div class="left-sidebar-header">
            <form>
                <h4 class="mb-4">Archived</h4>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn" type="button">
                            <i class="ti-search"></i>
                        </button>
                    </div>
                    <input type="text" class="form-control" placeholder="Search archived">
                </div>
            </form>
        </div>
        <div class="left-sidebar-content">
            <ul class="list-group list-group-flush users-list">
                <li class="list-group-item">
                    <figure class="avatar mr-3">
                        <span class="avatar-title bg-danger rounded-circle">M</span>
                    </figure>
                    <div class="users-list-body">
                        <div>
                            <h5>Mercedes Pllu</h5>
                            <p>I know how important this file is to you. You can trust me ;)</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Restore</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <figure class="avatar mr-3">
                        <span class="avatar-title bg-secondary rounded-circle">R</span>
                    </figure>
                    <div class="users-list-body">
                        <div>
                            <h5>Rochelle Golley</h5>
                            <p>Lorem ipsum dolor sitsdc sdcsdc sdcsdcs</p>
                        </div>
                        <div class="users-list-action">
                            <div class="action-toggle">
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item">Open</a>
                                        <a href="#" class="dropdown-item">Restore</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item text-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Archived left sidebar -->

    <!-- chat -->
    <div class="chat"> <!-- no-message -->
        <div class="chat-preloader d-none">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="no-message-container">
            <div class="row mb-5">
                <div class="col-md-4 offset-4">
                    <img src="{{ asset('assets/media/svg/chat_empty.svg') }}" class="img-fluid" alt="image">
                </div>
            </div>
            <p class="lead">Chọn một cuộc trò chuyển để bắt đầu hoặc <a href="#" data-left-sidebar="friends">thêm 1 cuộc
                    trò chuyện mới</a>.</p>
        </div>
        <div class="chat-header">
            <div class="chat-header-user">
                <figure class="avatar avatar-state-success">
                    <img src="" class="rounded-circle" alt="image">
                </figure>
                <div>
                    <h5></h5>
                    <small class="text-success"></small>
                </div>
            </div>
            <div class="chat-header-action">
                <ul class="list-inline" data-intro-js="7">
                    <li class="list-inline-item d-inline d-lg-none">
                        <a href="#" class="btn btn-danger btn-floating example-chat-close">
                            <i class="mdi mdi-arrow-left"></i>
                        </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="Voice call">
                        <a href="#" class="btn btn-info btn-floating" data-right-sidebar="notifications">
                            <i class="mdi mdi-bell-outline"></i>
                        </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="Voice call">
                        <a href="#" class="btn btn-success btn-floating voice-call-request">
                            <i class="mdi mdi-phone"></i>
                        </a>
                    </li>
                    <li class="list-inline-item" data-toggle="tooltip" title="Video call">
                        <a href="#" class="btn btn-warning btn-floating video-call-request">
                            <i class="mdi mdi-video-outline"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-dark btn-floating" data-toggle="dropdown">
                            <i class="mdi mdi-dots-horizontal"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" data-right-sidebar="user-profile" class="dropdown-item show-profile" id="show-prifile" data-email="{{auth()->user()->email}}">Trang cá nhân</a>
                            <a href="#" class="dropdown-item example-close-selected-chat" id="close-chat">Đóng đoạn
                                chat</a>
                            <a href="#" class="dropdown-item">Add to archive</a>
                            <a href="#" class="dropdown-item example-delete-chat">Delete</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item text-danger example-block-user">Block</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="chat-body">
            <div class="messages">
                {{--                <div class="message-item messages-divider sticky-top" data-label="Yesterday"></div>--}}
                {{--                <div class="message-item in in-typing">--}}
                {{--                    <div class="message-content">--}}
                {{--                        <div class="message-text">--}}
                {{--                            <div class="writing-animation">--}}
                {{--                                <div class="writing-animation-line"></div>--}}
                {{--                                <div class="writing-animation-line"></div>--}}
                {{--                                <div class="writing-animation-line"></div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
        <div class="chat-footer">
            <form class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-light-info btn-floating mr-3" data-toggle="dropdown" title="Emoji"
                            type="button">
                        <i class="mdi mdi-face"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-big p-0">
                        <div class="dropdown-menu-search">
                            <input type="text" class="form-control" placeholder="Search emoji">
                        </div>
                        <div class="emojis chat-emojis">
                            <ul>
                                <li>😁</li>
                                <li>😂</li>
                                <li>😃</li>
                                <li>😄</li>
                                <li>😅</li>
                                <li>😆</li>
                                <li>😉</li>
                                <li>😊</li>
                                <li>😋</li>
                                <li>😌</li>
                                <li>😍</li>
                                <li>😏</li>
                                <li>😒</li>
                                <li>😓</li>
                                <li>😔</li>
                                <li>😖</li>
                                <li>😘</li>
                                <li>😝</li>
                                <li>😠</li>
                                <li>😢</li>
                                <li>🙅</li>
                                <li>🙆</li>
                                <li>🙇</li>
                                <li>🙈</li>
                                <li>🙉</li>
                                <li>🙊</li>
                                <li>🙋</li>
                                <li>🙌</li>
                                <li>🙍</li>
                                <li>🙎</li>
                                <li>🙏</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light-info btn-floating mr-3" data-toggle="dropdown" title="Emoji"
                            type="button">
                        <i class="mdi mdi-plus"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Location</a>
                        <a href="#" class="dropdown-item">Attach</a>
                        <a href="#" class="dropdown-item">Document</a>
                        <a href="#" class="dropdown-item">File</a>
                        <a href="#" class="dropdown-item">Video</a>
                    </div>
                </div>
                <input type="text" id="message-send" class="form-control form-control-main"
                       placeholder="Nhắn tin ở đây.">
                <div>
                    <button class="btn btn-primary ml-2 btn-floating" type="submit">
                        <i class="mdi mdi-send"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- ./ chat -->
</div>
@push('script')
    <script>
        $(document).on('click', ".list-group-flush .list-group-item", function () {
            axios("{{route('friend.show','_email_')}}".replace('_email_', $(this).data('email')))
                .then(function (response) {
                    let user = response.data.data;
                    $("#id-chat-user").val(user.id);
                    $(".chat-header .chat-header-user .avatar > img").attr('src', user.avatar);
                    $("#show-prifile").data('email',user.email);
                    $(".chat-header .chat-header-user div h5").text(user.name);
                    $(".chat-header .chat-header-user div small").addClass('user-chat-status-' + user.id);
                    $(".chat-header .chat-header-user div small").addClass('user-chat-status-' + $("#id-chat-user").val());
                    if (user.is_online != 0) {
                        $(".chat-header .chat-header-user .avatar").addClass('avatar-state-success user-chat-' + user.id);
                        $(".chat-header .chat-header-user div small").text('Online');
                    } else {
                        $(".chat-header .chat-header-user .avatar").removeClass('avatar-state-success user-chat-' + user.id);
                        $(".chat-header .chat-header-user div small").text(`Offline`);
                    }
                    return user;
                })
                .then(function (user) {
                    getMessage(user, 1, 0);
                    return user;
                })
                .then(function (user) {
                    let page = 1;
                    $('.chat-body').on('scroll', function () {
                        if ($('.chat-body')[0].scrollTop == 0) {
                            page++;
                            getMessage(user, page, 1);
                        }
                    })
                })
        });

        function getMessage(user, page = 1, load) {
            let api = "{{route('message.show','_id_')}}".replace('_id_', user.id);
            axios(api + "?page=" + page)
                .then(function (response) {
                    let data = response.data;
                    if (data != []) {
                        let content = data.map(item => {
                            return `
                                <div class="message-item ${item.from_id == {{auth()->id()}} ? 'out' : 'in'}">
                                    <div class="message-avatar">
                                        <figure class="avatar avatar-sm">
                                            <img src="${item.from_id == {{auth()->id()}} ? '{{auth()->user()->avatar}}' : user.avatar}" class="rounded-circle" alt="image">
                                        </figure>
                                        <div>
                                            <h5>${item.from_id == {{auth()->id()}} ? '{{auth()->user()->name}}' : user.name}</h5>
                                            <div class="time">${item.time_send} ${item.from_id == {{auth()->id()}} ? `<i class="mdi mdi-check${item.seen == 0 ? '' : '-all'} text-info ml-1"></i>` : ''}</div>
                                        </div>
                                    </div>
                                    <div class="message-content">
                                        <div class="message-text">
                                            ${item.body}
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Reply</a>
                                                <a href="#" class="dropdown-item">Forward</a>
                                                <a href="#" class="dropdown-item">Copy</a>
                                                <a href="#" class="dropdown-item">Starred</a>
                                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                        }).join('');
                        if (load == 0) {
                            $(".messages").html(content);
                            $(".chat-body").scrollTop($(".chat-body").height());
                        } else {
                            $(".messages").prepend(content);
                            $('.chat-body').scrollTop(2000);
                        }
                    } else {
                        console.log(123);
                    }
                })
        }

        function setScroll() {
            $(".chat-body").animate({scrollTop: $(".chat-body").prop("scrollHeight")}, "slow");
        }

        $(document).on("submit", ".chat .chat-footer form", function (e) {
            e.preventDefault();
            let message = $("#message-send").val().trim();
            if (message === '') {
                $("#message-send").val('');
                $("#message-send").focus();
            } else {
                let id = $("#id-chat-user").val();
                $(".last-message-" + id).text('Bạn: ' + message);
                axios.post('{{route('message.store')}}', {message, id})
                $(".time-new-" + id).text('{{now()->format('h:i A')}}');
                let content = `
                    <div class="message-item out">
                        <div class="message-avatar">
                            <figure class="avatar avatar-sm">
                                <img src="{{auth()->user()->avatar}}" class="rounded-circle" alt="image">
                            </figure>
                            <div>
                                <h5>{{auth()->user()->name}}</h5>
                                <div class="time">{{now()->format('h:i A')}} <i class="mdi mdi-check text-info ml-1"></i></div>
                            </div>
                        </div>
                        <div class="message-content">
                            <div class="message-text">
                                ${message}
                            </div>
                            <div class="dropdown">
                                <a href="#" data-toggle="dropdown">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item">Reply</a>
                                    <a href="#" class="dropdown-item">Forward</a>
                                    <a href="#" class="dropdown-item">Copy</a>
                                    <a href="#" class="dropdown-item">Starred</a>
                                    <a href="#" class="dropdown-item example-delete-message">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                $("#message-send").val('');
                $(".messages").append(content);
                setScroll();
            }
        })
    </script>
    <script type="module">
        Echo.private('send.message.{{auth()->id()}}')
            .listen('SendMessage', function (e) {
                let message = e.data;
                let id = message.from_id;
                let idChat = $("#id-chat-user").val();
                $(".time-new-" + id).text(message.last_time ?? '{{now()->format('h:i A')}}');
                $(".last-message-" + id).text(message.body);
                if (message.from_id == idChat) {
                    axios.put('{{route('message.update','_id_')}}'.replace('_id_', message.id), {status: 2})
                        .then(function (response) {
                            let ms = response.data;
                            let content = `
                                <div class="message-item in">
                                    <div class="message-avatar">
                                        <figure class="avatar avatar-sm">
                                            <img src="${message.from_user.avatar}" class="rounded-circle" alt="image">
                                        </figure>
                                        <div>
                                            <h5>${message.from_user.name}</h5>
                                            <div class="time">${ms.last_time}</div>
                                        </div>
                                    </div>
                                    <div class="message-content">
                                        <div class="message-text">
                                            ${message.body}
                                        </div>
                                        <div class="dropdown">
                                            <a href="#" data-toggle="dropdown">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item">Reply</a>
                                                <a href="#" class="dropdown-item">Forward</a>
                                                <a href="#" class="dropdown-item">Copy</a>
                                                <a href="#" class="dropdown-item">Starred</a>
                                                <a href="#" class="dropdown-item example-delete-message">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            $(".messages").append(content);
                            setScroll();
                        })
                } else {
                    axios.put('{{route('message.update','_id_')}}'.replace('_id_', message.id), {status: 1});
                    $(".list-group-item-" + message.from_id).addClass('unread-chat');
                    let tag = $(".list-group-item-" + message.from_id).find('.users-list-action').find('.new-message-count');
                    if (tag.length != 0) {
                        let noti = parseInt(tag.text()) + 1;
                        tag.text(noti)
                    } else {
                        $(".list-group-item-" + message.from_id).find('.users-list-action').prepend(`<div class="new-message-count">1</div>`);
                    }
                }
            })
    </script>
    <script type="module">
        Echo.private('message.toggle.{{auth()->id()}}')
            .listen('ToggleMessage', function (e) {
                let idChat = $("#id-chat-user").val();
                let message = e.message;
                if (message.to_id == idChat) {
                    $(".mdi.mdi-check").addClass('mdi-check-all');
                    $(".mdi.mdi-check").addClass('mdi-check');
                }
            })
    </script>

    <script>
        $(document).on('click', function (e) {
            let data = e.target.dataset;
            let toggle = data.toggle;
            let target = data.target;
            if (toggle == 'modal' && target) {
                e.preventDefault();
                $(target).addClass('show');
                $(target).css('display', 'block');
                $(target).css('background', 'rgba(0,0,0,0.3)');
            }
        })
        $(document).on('click', '.close', function () {
            let data = $(this).data('dismiss');
            if (data && data == 'modal') {
                $('.modal').removeClass('show');
                $('.modal').css('display', 'none');
                $(target).css('background', 'none');
            }
        })
    </script>
@endpush
<script>
    let initialProfileUser;

    $(document).ready(function() {
        initialProfileUser = $("#myTabContent .tab-pane").html();
    });
    $(document).on('click', '.show-profile', function () {
        let email = $(this).data('email');
        if (email === '{{auth()->user()->email}}') {
            $("#myTabContent").html(initialProfileUser);
        } else {
            axios.get('{{route("friend.show","email")}}'.replace('email', email))
                .then(function (response) {
                    let data = response.data.data;
                    let socials = '';
                    if(data.socials.length !== 0){
                        socials = `
                            <div class="mt-4 mb-4">
                                <h6 class="mb-3">Mạng xã hội</h6>
                                <ul class="list-inline social-links">`;
                        socials += data.socials.map(function(item){
                            return `
                                <li class="list-inline-item">
                                    <a href="${item.link}" target="_blank" class="btn btn-floating btn-${item.name.toLowerCase()}" data-toggle="tooltip"
                                       title="${item.name}">
                                        <i class="mdi mdi-${item.name.toLowerCase()}"></i>
                                    </a>
                                </li>
                            `;
                        }).join('');

                        socials += `
                                </ul>
                            </div>
                        `;
                    }

                    let profiles = '';
                    let logProfiles = '';
                    if(!data.hasOwnProperty('profile')){
                        logProfiles = 'Tài khoản này đã khóa trang cá nhân';
                    } else {
                        if(data.profile){
                            profiles = `
                                <p class="text-muted about-user">${data.profile.about ?? 'Chưa cập nhật'}</p>
                                <div class="mt-4 mb-4">
                                    <h6>Số điện thoại</h6>
                                    <p class="text-muted phone-user">${data.profile.phone ?? 'Chưa cập nhật'}</p>
                                </div>
                                <div class="mt-4 mb-4">
                                    <h6>Địa chỉ</h6>
                                    <p class="text-muted address-user">${data.profile.address ?? 'Chưa cập nhật'}</p>
                                </div>
                            `
                        } else {
                            logProfiles = 'Tài khoản chưa cập nhật thông tin cá nhân';
                        }
                    }
                    let content = `
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="text-center mb-4">
                                <figure class="avatar avatar-xl mb-4">
                                    <img src="${data.avatar}" class="image-avatar-user rounded-circle" alt="image">
                                </figure>
                                <h5 class="mb-1 full-name-user">${data.name}</h5>
                                <small class="text-muted font-italic text-center">${logProfiles}</small>
                            </div>
                            `+profiles+`
                        `+socials+`
                        </div>
                    </div>`;
                    $("#myTabContent").html(content);
                })
        }
    })
</script>
@section('style')
    <style>
        .layout .chat .chat-body {
            flex: 1;
            padding: 30px;
            border-top-left-radius: .75rem;
            border-top-right-radius: .75rem;
            background-color: #fff;
            overflow: auto;
        }

        .layout .chat .chat-body::-webkit-scrollbar {
            width: 3px;
        }

        .layout .chat .chat-body::-webkit-scrollbar-thumb {
            background-color: #00ff00;
        }

        .layout .chat .chat-body::-webkit-scrollbar-track {
            background-color: #f1f1f1;
        }
    </style>
@endsection
