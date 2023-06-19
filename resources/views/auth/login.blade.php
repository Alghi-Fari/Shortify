@extends('layouts.app')
@section('content')
    <div class="login-page ">
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-12 mb-4">
                        <img src="https://dummyimage.com/200x100/d4d4d4/ffffff" alt="" class="mx-auto d-block">
                    </div>
                </div>
                <div class="row align-items-center justify-content-center align-middle">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary">Sign In To Your Account</h2>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label>Email</label>
                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg" placeholder="Email"
                                        name="email" />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                    </div>
                                </div>
                                <label>Password</label>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg" placeholder="Password"
                                        name="password" />
                                    <div class="input-group-append custom">
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
                                                Password</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="input-group mb-0">
                                            <a class="btn btn-primary btn-lg btn-block" href="{{ route('register') }}">
                                                Register
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group mb-0">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
