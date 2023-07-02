@extends('layouts.app')
@section('content')
    <div class="login-page ">
        <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-12 mb-4">
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
                                <h2 class="text-center text-primary">Forgot Password</h2>
                            </div>
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                                <label>Email</label>
                                <div class="input-group custom">
                                    <input type="text" class="form-control form-control-lg" 
                                        name="email" />
                                    <div class="input-group-append custom">
                                        <span class="input-group-text"><i class="icon-copy dw dw-email"></i></span>
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
                                            <button type="submit"
                                                class="btn btn-primary btn-lg btn-block">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($message = Session::get('errors'))
            swal({
            text: "{{ $message->first() }}",
            type: 'error',
            })
        @endif
    @endsection
