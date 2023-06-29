@extends('templates.admin')
@section('content')
<div class="row mt-4 d-flex align-items-center flex-wrap justify-content-center">
    <div class="col-md-6">
        <div class="card-box mb-30 shadow">
            <div class="pd-20">
                @auth
                    <form action="{{ route('app.link.store') }}" method="POST">
                    @endauth
                    @guest
                        <form action="{{ route('app.link.guest.store') }}" method="POST">
                        @endguest
                        @csrf
                        @method('POST')
                        <img src="{{asset('storage/image/Logo2.png')}}" alt="Logo">
                        <br>
                        <h3 class="text-center mt-4 mb-4">"Link Simpler, Reach Faster"</h3>
                        <div class="input-group mb-3 h-100">
                            <input type="url" class="form-control rounded-start-pill text-center" placeholder="https://example.com/my-long-url" name="link[destination]" required>
                            @auth
                                <button type="submit" class="btn btn-info rounded-start rounded-5" id="button-addon1">Shorten!</button>
                            @endauth
                            @guest
                                <button type="button" class="btn btn-info rounded-start rounded-5" data-toggle="modal" data-target="#loginModal" id="button-addon1">Login First!</button>
                            @endguest
                        </div>
                        <div class="input-group mb-3 h-100">
                            <button class="btn btn-success rounded-end rounded-5" type="button" id="copyButton" onclick="myFunction()">Copy</button>
                            
                            <input type="text" class="form-control rounded-end-pill text-center" placeholder="Shortened link shown here" aria-label="Example text with button addon" readonly id="myInput"
                            @if(request()->has('shorted'))
                            value="{{env('APP_URL')}}/{{ request('shorted') }}"
                            @endif
                        ></div>
                        @auth
                        </form>
                    @endauth
            </div>

            @guest
                <!-- Modal -->
                <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loginModalLabel">Login and get your link</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label>Email</label>
                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg" name="email" />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                </div>
                                <label>Password</label>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" name="password" id="password"/>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><button type="button" id="togglePassword" class="border-0 bg-transparent"><i class="fa-regular fa-eye-slash"></i></button></span>
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                </div>
                                <div class="row pb-30">
                                    <div class="col-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" />
                                            <label class="custom-control-label" for="customCheck1">Remember</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="forgot-password">
                                            <a href="{{ route('password.forgot') }}" class="text-primary">Forgot
                                                Password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-center">
                                    <p>Don't have an account? <a href="{{route('register')}}" class="text-primary">Register</a></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#togglePassword').click(function() {
                        var passwordField = $('#password');
                        var passwordFieldType = passwordField.attr('type');

                    // Toggle password field type
                    if (passwordFieldType === 'password') {
                        passwordField.attr('type', 'text');
                        $(this).html('<i class="fa-regular fa-eye"></i>');
                    } else {
                        passwordField.attr('type', 'password');
                        $(this).html('<i class="fa-regular fa-eye-slash"></i>');
                    }
                    });
                });
                </script>
            @endguest
            @guest
                </form>
            @endguest
        </div>
        <script>
        function myFunction() {
            var copyText = document.getElementById("myInput");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);
            
            var tooltip = document.getElementById("myTooltip");
            tooltip.innerHTML = "Copied: " + copyText.value;
        }
        </script>
                    
{{-- @include('backend.links.create') --}}
@endsection