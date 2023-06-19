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
                    <div class="col-12 mb-4">
                        <img src="https://dummyimage.com/200x100/d4d4d4/ffffff" alt="" class="mx-auto d-block">
                    </div>
                </div>
                <div class="row align-items-center justify-content-center align-middle">
                    <div class="col-md-6 col-lg-5">
                        <div class="login-box bg-white box-shadow border-radius-10">
                            <div class="login-title">
                                <h2 class="text-center text-primary">Create New Account</h2>
                            </div>
                            <form method="POST" action="{{ route('register.store') }}">
                                @csrf
                                <label>Email</label>
                                <div class="input-group custom">
                                    <input type="email" class="form-control form-control-lg" placeholder="Email"
                                        name="email" />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
                                    </div>
                                </div>
                                <label>Username</label>
                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg" placeholder="Username"
                                        name="username" />
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
                                <label>Password Confirmation</label>
                                <div class="input-group custom">
                                    <input type="password" class="form-control form-control-lg"
                                        placeholder="Password Confirmation" name="password_confirmation" />
                                    <div class="input-group-append custom">
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
                                            <input type="text" class="form-control" placeholder="Answer"
                                                name="answer" />
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
@endsection
