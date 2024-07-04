<div class="modal fade" id="newGroup" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="mdi mdi-account-group-outline mr-2"></i> New Group
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="mdi mdi-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="group_name" class="col-form-label">Group name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="group_name">
                            <div class="input-group-append">
                                <button class="btn btn-success" data-toggle="dropdown" title="Emoji" type="button">
                                    <i class="mdi mdi-face"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-big dropdown-menu-right p-0">
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
                        </div>
                    </div>
                    <p class="mb-2">The group members</p>
                    <div class="form-group">
                        <div class="avatar-group">
                            <figure class="avatar" data-toggle="tooltip" title="Tobit Spraging">
                                <span class="avatar-title bg-success rounded-circle">T</span>
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Cloe Jeayes">
                                <img src="{{ asset('assets/media/img/avatar8.jpg') }}" class="rounded-circle" alt="image">
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Marlee Perazzo">
                                <span class="avatar-title bg-warning rounded-circle">M</span>
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Stafford Pioch">
                                <img src="{{ asset('assets/media/img/avatar1.jpg') }}" class="rounded-circle" alt="image">
                            </figure>
                            <figure class="avatar" data-toggle="tooltip" title="Bethena Langsdon">
                                <span class="avatar-title bg-info rounded-circle">B</span>
                            </figure>
                        </div>
                        <button type="button" class="btn btn-light" title="Add User" data-toggle="dropdown">
                            Add new user
                        </button>
                        <div class="dropdown-menu p-0">
                            <div class="dropdown-menu-search">
                                <input type="text" class="form-control" placeholder="Search users">
                            </div>
                            <div class="px-3 pb-3">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <div class="mr-2">
                                            <figure class="avatar avatar-sm">
                                                <span class="avatar-title bg-info rounded-circle">V</span>
                                            </figure>
                                        </div>
                                        <div>Valentine Maton</div>
                                        <button type="button" class="btn ml-auto text-primary">Add</button>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center px-0">
                                        <div class="mr-2">
                                            <figure class="avatar avatar-sm">
                                                <img src="{{ asset('assets/media/img/avatar1.jpg') }}" class="rounded-circle"
                                                     alt="image">
                                            </figure>
                                        </div>
                                        <div>Forest Kroch</div>
                                        <button type="button" class="btn ml-auto text-primary">Add</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-form-label">Description</label>
                        <textarea class="form-control" id="description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Create Group</button>
            </div>
        </div>
    </div>
</div>
