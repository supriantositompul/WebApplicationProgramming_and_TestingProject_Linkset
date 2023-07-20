@extends('layouts.app')
@section('content')

    <head>
        <style>
            .gradient-custom-2 {
                /* fallback for old browsers */
                background: #fccb90;

                /* Chrome 10-25, Safari 5.1-6 */
                background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

                /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
            }

            @media (min-width: 768px) {
                .gradient-form {
                    height: 100vh !important;
                }
            }

            @media (min-width: 769px) {
                .gradient-custom-2 {
                    border-top-right-radius: .3rem;
                    border-bottom-right-radius: .3rem;
                }
            }

            .background {
                width: 430px;
                height: 520px;
                position: absolute;
                transform: translate(-50%, -50%);
                left: 50%;
                top: 50%;
            }

            .background .shape {
                height: 200px;
                width: 200px;
                position: absolute;
                border-radius: 50%;
            }

            .shape:first-child {
                background: linear-gradient(#1845ad,
                        #23a2f6);
                left: -80px;
                top: -80px;
            }

            .shape:last-child {
                background: linear-gradient(to right,
                        #ff512f,
                        #f09819);
                right: -30px;
                bottom: -80px;
            }
        </style>
    </head>

    <body>
        <div class="background">
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        <section class="h-100 gradient-form" style="background-color: rgb(95, 138, 224);"ner py-5 h-100">


            <div class="container py-5 h-100">
                <div class="col-md-8 offset-md-2">
                    <div class="card cascading-right"
                        style=" background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);

                    ">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h1>Login</h1>
                        </div>

                        <div class="card-body ">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row ">

                                    <div class="col-md-8 offset-md-2">
                                        <input id="email" type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus placeholder="Enter Email Address.">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">


                                    <div class="col-md-8 offset-md-2">
                                        <input id="password" type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-8 offset-md-2">
                                    <div class="custom-control custom-checkbox small">
                                        <input class="custom-control-input" type="checkbox" name="remember" id="customCheck"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                        @if (Route::has('password.request'))
                                            <a class="small offset-md-5" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-2">
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <!--<button type="submit" class="btn btn-primary">
                                                                                                                                                                                                                                                                                                                                                {{ __('Login') }}
                                                                                                                                                                                                                                                                                                                                            </button> -->


                                        <label for="" class="small">Dont have an account?</label><a class="small"
                                            href="{{ route('register') }}">
                                            {{ __('Create Account') }}
                                        </a>
                                        @endif
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        @endsection
    </section>
</body>
