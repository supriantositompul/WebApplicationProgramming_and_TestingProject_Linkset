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
    </style>
    <section class="h-1000 gradient-form" style="background-color: rgb(95, 138, 224);"ner py-5 h-100">
        <div class="container py-5 h-1000">
            <div class="col-md-12 offset-md-12">
                <div class="card cascading-right"
                    style=" background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);

                    ">

                    <div class="card-body">
                        <h4 class="card-title">Edit Link</h4>
                        <form action="{{ route('links.update', $link->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Link Name</label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Social Media Name" value="{{ $link->name }}">
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
                                            placeholder="https://your-social-media.com" value="{{ $link->link }}">
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
                                    <button type="submit" class="btn btn-primary">Save Link</button>
                                    <button type="button" class="btn btn-secondary"
                                        onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete
                                        Link</button>
                                </div>
                            </div>
                        </form>
                        <form id="delete-form" method="POST" action="{{ route('links.destroy', $link->id) }}">
                            @csrf
                            @method('DELETE')

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
