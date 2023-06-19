@if (Session::has('success'))
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
                                    <h2 class="text-center text-primary">Forgot Password</h2>
                                </div>
                                <form method="POST" action="{{ route('password.new.store') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="col-12">
                                            <label>Password</label>
                                            <div class="input-group custom">
                                                <input type="password" class="form-control form-control-lg"
                                                    placeholder="Password" name="password" />
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Password Confirmation</label>
                                            <div class="input-group custom">
                                                <input type="password" class="form-control form-control-lg"
                                                    placeholder="Password Confirmation" name="password_confirmation" />
                                                <div class="input-group-append custom">
                                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                                </div>
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

@endif
