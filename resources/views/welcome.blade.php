<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        @if (!empty($starContent))
{{--            {{dd($starContent)}}--}}
            <div class="alert alert-danger">
                <!-- <strong>請檢查您輸入的資料！</strong> -->
                @foreach ($starContent as $content)
                    @foreach($content as $show)
                    <li>{{ '星座：'.$show['created_at']  }}</li>
                    <li>{{ '星座：'.$show['star_signs']  }}</li>
                    <li>{{ '類型：'.$show['key'] }}</li>
                    <li>{{ '說明：'.$show['value'] }}</li>
                    @endforeach
                @endforeach

            </div>
        @endif

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{url('/redirect')}}" class="btn btn-info">Login with Facebook</a>
                        <a href="{{ route('register') }}">Register</a>
                        <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="false" data-use-continue-as="false"></div>
                    @endauth
                </div>
            @endif

            <div class="content">
                <ul class="nav nav-pills nav-stacked; " style="font-size:20px;">
                    <li><a href="star" class="btn btn-info" role="button">星座資料撈取</a></li>
                </ul>

                <div class="links">

                </div>
            </div>
        </div>
    </body>
</html>
