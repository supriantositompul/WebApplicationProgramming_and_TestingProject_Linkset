@extends('layouts.app')

@section('content')
    <style>
        section {
            background-color: #fff;
            color: #636b6f;

            font-weight: 200;
            height: 100vh;
            margin: 0;
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
    <section class="h-1000 gradient-form" style="background-color: rgb(95, 138, 224);"ner py-5 h-100">
        <div class="container py-5 h-100">
            <div class="col-md-12 offset-md-12">
                <div class="card cascading-right"
                    style=" background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);

                    ">
                    <div class="card-body">
                        <h4 class="card-title">Create New Link</h4>
                        <form action="{{ route('links.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Link Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Social Media Name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Link Url</label>
                                        <input type="text" name="link"
                                            class="form-control @error('link') is-invalid @enderror"
                                            placeholder="https://your-links.com" value="{{ old('link') }}">
                                        @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Save Link</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
