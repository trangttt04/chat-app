<div class="right-sidebar" id="user-profile">
    <div class="right-sidebar-header with-tab-menu">
        <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                   aria-controls="home" aria-selected="true">Cá nhân</a>
            </li>
        </ul>
        <a href="#" class="right-sidebar-close">
            <i class="mdi mdi-window-close"></i>
        </a>
    </div>
    <div class="right-sidebar-content">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="text-center mb-4">
                    <figure class="avatar avatar-xl mb-4">
                        <img src="{{auth()->user()->avatar}}" class="image-avatar-user rounded-circle" alt="image">
                    </figure>
                    <h5 class="mb-1 full-name-user"></h5>
                    <small class="text-muted font-italic">Last seen: Today</small>
                </div>
                <p class="text-muted about-user">
                    {{optional(auth()->user()->profile)->about}}
                </p>
                <div class="mt-4 mb-4">
                    <h6>Số điện thoại</h6>
                    <p class="text-muted phone-user">{{optional(auth()->user()->profile)->phone}}</p>
                </div>
                <div class="mt-4 mb-4">
                    <h6>Địa chỉ</h6>
                    <p class="text-muted address-user">{{optional(auth()->user()->profile)->address}}</p>
                </div>
                <div class="mt-4 mb-4">
                    <h6 class="mb-3">Mạng xã hội</h6>
                    <ul class="list-inline social-links">
                        @foreach($social as $key => $so)
                        <li class="list-inline-item">
                            <a href="{{$so}}" target="_blank" class="btn btn-floating btn-{{ strtolower($key) }}" data-toggle="tooltip"
                               title="{{$key}}">
                                <i class="mdi mdi-{{ strtolower($key) }}"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @if(auth()->user()->roles()->exists())
                <div class="mt-4 mb-4">
                    <h6 class="mb-3">Cài đặt</h6>
                    @foreach(auth()->user()->roles as $rol)
                    <div class="form-group">
                        <div class="form-item custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" disabled checked id="toggleSwSt-{{$rol->id}}">
                            <label class="custom-control-label" for="toggleSwSt-{{$rol->id}}">{{$rol->name}}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
