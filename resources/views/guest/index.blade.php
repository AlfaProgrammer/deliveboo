<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/front.css') }}">
    </head>
    <body>
        <div class="bg-red-600">
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ route('admin.plates.index') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>

        <div id="app"></div>

        <script src="{{ asset('js/guest.js') }}"></script>

    </body>
</html>
