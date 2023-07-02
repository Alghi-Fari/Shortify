@extends('layouts.app')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            @php
                
                Session::forget('success');
                
            @endphp
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="login-page ">

        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-12 mb-1">
                        {{-- <img src="https://dummyimage.com/200x100/d4d4d4/ffffff" alt="" class="mx-auto d-block"> --}}
                    </div>
                </div>
                <div class="row align-items-center justify-content-center align-middle">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-box bg-white box-shadow border-radius-10 shadow">
                            <div class="login-title">
                                {{-- <img src="{{asset('storage/image/Logo.png')}}" alt="" class="mx-auto d-block" width="400px"> --}}
                                <img src="{{ asset('assets/images/Logo.png') }}" alt="Foto Logo" class="mx-auto d-block" width="400px"/>
                                <br>
                                <h2 class="text-center text-primary">Create New Account</h2>
                            </div>
                            <form method="POST" action="{{ route('register.store') }}">
                                @csrf
                                <label>Email</label>
                                <div class="input-group custom">
                                    <input type="email" class="form-control form-control-lg"
                                        name="email" required/>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
                                    </div>
                                </div>
                                <label>Username</label>
                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg"
                                        name="username" required/>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                </div>
                                <label>Password</label>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" name="password" id="password" required/>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><button type="button" id="togglePassword" class="border-0 bg-transparent"><i class="fa-regular fa-eye-slash"></i></button></span>
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                </div>
                                <label>Password Confirmation</label>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password2" required/>
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><button type="button" id="togglePassword2" class="border-0 bg-transparent"><i class="fa-regular fa-eye-slash"></i></button></span>
                                        <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Security Question</label>
                                            <select class="form-control" name="question">
                                                <option value="Di mana tempat kelahiran Anda?">Di mana tempat kelahiran
                                                    Anda?</option>
                                                <option value="Apa nama hewan peliharaan pertama Anda?">Apa nama hewan
                                                    peliharaan pertama Anda?
                                                </option>
                                                <option value="Siapa nama artis atau tokoh favorit Anda?">Siapa nama artis
                                                    atau tokoh favorit Anda?</option>
                                                <option value="Apa warna kesukaan Anda?">Apa warna kesukaan Anda?</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input type="text" class="form-control" placeholder="Answer" name="answer" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group mb-0">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Create
                                                Account</button>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 text-center">
                                        <a href="{{ route('login') }}" class="text-primary ">Already have
                                            an Account?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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

        $(document).ready(function() {
            $('#togglePassword2').click(function() {
                var passwordField = $('#password2');
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
@endsection
