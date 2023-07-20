@extends('layouts.app')

@section('style')

    <head>
        <!--- basic page needs
                                           ================================================== -->
        <meta charset="utf-8">

        <meta name="description" content="">
        <meta name="author" content="">

        <!-- mobile specific metas
                                           ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSS
                        <link rel="stylesheet" href="css/base.css">
                        <link rel="stylesheet" href="css/vendor.css">
                        <link rel="stylesheet" href="css/main.css">

                        <!-- script
                                           ================================================== -->
        <script src="js/modernizr.js"></script>
        <script src="js/pace.min.js"></script>

        <!-- favicons
                                         ================================================== -->
        <style>
            section {
                background-color: #fff;
                color: #636b6f;

                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            html,
            body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 30px;
            }

            .links>a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .livesearch {
                margin: 300px;
                background-color: #636b6f;
                height: 40px;
                border-radius: 40px;
                padding: 100px;

            }

            .card {
                margin: 30px;
            }

            ..newStyle {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, 50%);
                background: #2f3640;
                height: 40px;
                border-radius: 40px;
                padding: 10px;

            }

            @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

            *,
            *:before,
            *:after {
                box-sizing: border-box
            }

            body {
                min-height: 100vh;
                font-family: 'Raleway', sans-serif;
            }

            .background {
                width: 530px;
                height: 320px;
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
@endsection

@section('content')
    <div class="container">
        <h2 class="card-title" style="color: rgb(50, 255, 252)">Welcome to the Linkset website (Bio Link)!</h2>
        <p class="card-text" style="color: rgb(50, 255, 252)">To get started, sign in to your account or register for a new
            one.
        </p>
        <br><br><br>

        <div class="container  py-5 h-100">
            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>
            <div class="row justify-content-center col-md-12 offset-md-12">
                <div class="content"
                    style=" background: hsla(0, 0%, 100%, 0.55);
                                  backdrop-filter: blur(30px);">
                    <div class="card-body" style="margin:30px; ">
                        <div class="title" style="color: rgb(16, 72, 71)">
                            Find Your Username!
                        </div>
                        <select name="livesearch" class="form-control livesearch newStyle" id=""></select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        let $q = $('.livesearch');

        $q.select2({
            placeholder: "Search Username",
            ajax: {
                url: "/search",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                id: item.id,
                                text: item.username,
                                username_slug: item.username_slug,
                            }
                        })
                    };
                },
                cache: true
            }
        });

        $q.on('select2:select', function(e) {
            window.location.href = "/" + e.params.data.username_slug;
        })
    </script>
@endsection
