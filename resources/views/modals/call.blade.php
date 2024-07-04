<div class="modal fade" id="voiceCallRequest" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content call-request">
            <div class="modal-body">
                <figure class="avatar avatar-xl">
                    <img src="{{ asset('assets/media/img/avatar4.jpg') }}" class="rounded-circle" alt="image">
                </figure>
                <h4 class="my-4">Brietta Blogg <span class="text-success">calling...</span></h4>
                <div class="call-action-button">
                    <button type="button" class="btn btn-danger btn-floating btn-lg" data-dismiss="modal">
                        <i class="mdi mdi-phone-cancel"></i>
                    </button>
                    <button type="button" class="btn btn-success btn-pulse btn-floating btn-lg voice-call-accept">
                        <i class="mdi mdi-phone-check"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal voice-call fade" id="voiceCall" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body" style="background: url({{ asset('assets/media/img/avatar2.jpg') }})">
                <figure class="avatar mb-4 avatar-state-success avatar-xl">
                    <img src="{{ asset('assets/media/img/avatar2.jpg') }}" class="rounded-circle" alt="image">
                </figure>
                <div class="mb-2 font-weight-bold lead">Brietta Blogg</div>
                <div class="mb-4 chat-stopwatch">00:00:00</div>
                <div class="call-action-button">
                    <button type="button" class="btn btn-pulse btn-floating btn-lg mute-event" data-toggle="tooltip"
                            title="Turn on / off sound">
                        <i data-feather="volume-2"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-floating btn-lg" data-toggle="tooltip"
                            title="Stop talking" data-dismiss="modal">
                        <i class="mdi mdi-close"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="videoCallRequest" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content call-request">
            <div class="modal-body">
                <figure class="avatar avatar-xl">
                    <img src="{{ asset('assets/media/img/avatar2.jpg') }}" class="rounded-circle" alt="image">
                </figure>
                <h4 class="my-4">Brietta Blogg <span class="text-success">calling...</span></h4>
                <div class="call-action-button">
                    <button type="button" class="btn btn-danger btn-floating btn-lg" data-dismiss="modal">
                        <i class="mdi mdi-video-minus-outline"></i>
                    </button>
                    <button type="button"
                            class="btn btn-success btn-pulse btn-floating btn-lg video-call-request-accept">
                        <i class="mdi mdi-video-check-outline"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal call fade" id="videoCall" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-zoom" role="document">
        <div class="modal-content">
            <div class="modal-body" style="background: url({{ asset('assets/media/img/video-call') }}.jpg)">
                <div class="call-time chat-stopwatch">00:00:00</div>
                <div class="call-action">
                    <div class="call-action-button">
                        <button type="button" class="btn btn-pulse btn-floating btn-lg mute-event"
                                data-toggle="tooltip" data-placement="right" title="Turn on / off sound">
                            <i data-feather="volume-2"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-floating btn-lg" data-toggle="tooltip"
                                data-placement="right" title="Stop talking" data-dismiss="modal">
                            <i class="mdi mdi-close"></i>
                        </button>
                    </div>
                    <div class="call-users">
                        <figure class="avatar" data-toggle="tooltip" data-placement="left"
                                title="Margaretta Worvell">
                            <img src="{{ asset('assets/media/img/avatar2.jpg') }}" class="rounded-circle" alt="image">
                        </figure>
                        <figure class="avatar" data-toggle="tooltip" data-placement="left" title="Matteo Reedy">
                            <span class="avatar-title bg-info rounded-circle">M</span>
                        </figure>
                        <figure class="avatar" data-toggle="tooltip" data-placement="left" title="Townsend Seary">
                            <img src="{{ asset('assets/media/img/avatar1.jpg') }}" class="rounded-circle" alt="image">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
