@extends('layouts.chat')
@section('content')
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="img/agora-logo.png" alt="Agora Logo" class="img-fuild" />
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group">
                        <button
                            type="button"
                            class="btn btn-primary mr-2">
                            Call
                            <span class="badge badge-light">Offline</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Incoming Call  -->
            <div class="row my-5" v-if="incomingCall">
                <div class="col-12">
                    <p>
                        Incoming Call From <strong>Incoming</strong>
                    </p>
                    <div class="btn-group" role="group">
                        <button
                            type="button"
                            class="btn btn-danger"
                            data-dismiss="modal"
                        >
                            Decline
                        </button>
                        <button
                            type="button"
                            class="btn btn-success ml-5"
                        >
                            Accept
                        </button>
                    </div>
                </div>
            </div>
            <!-- End of Incoming Call  -->
        </div>

        <section id="video-container" v-if="callPlaced">
            <div id="local-video"></div>
            <div id="remote-video"></div>

            <div class="action-btns">
                <button type="button" class="btn btn-info">
                   Mute
                </button>
                <button
                    type="button"
                    class="btn btn-primary mx-4"
                >
                    Hide
                </button>
                <button type="button" class="btn btn-danger">
                    EndCall
                </button>
            </div>
        </section>
    </main>
@endsection
@push('scripts')
    <script>

        window.onload = function () {
            Echo.join('agora-online-channel')
                .here((users) => {
                    console.log(users)
                })
                .joining((users) => {
                    console.log(users)
                })
                .leaving((user) => {
                    console.log('leaft')
                })
        }

    </script>

@endpush
