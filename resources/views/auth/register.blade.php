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
                    <div class="card-body">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h1>{{ __('Register') }}</h1>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">


                                    <div class="col-md-8 offset-md-2">
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username" autofocus
                                            placeholder="Username">

                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">


                                    <div class="col-md-8 offset-md-2">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

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
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">


                                    <div class="col-md-8 offset-md-2">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-2">
                                        <a href="{{ route('login') }}"><button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button></a>
                                        <label for="" class="small">Already have an account?</label>
                                        <a href="{{ route('login') }}">
                                            {{ __('Login') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
