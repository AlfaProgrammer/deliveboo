<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/front.css') }}">
    </head>
    <body>
        <div class="bg-stone-100 mb-6 py-4 px-3 flex items-center">
            <figure class="grow">
                <img class="logo" src="https://cdn.discordapp.com/attachments/976763752844230717/981947802919788574/deliveroo-3442893-2875354.png" alt="">
            </figure>
            @if (Route::has('login'))
                <div class="font-bold text-white text-lg">
                    @auth
                        <a class="bg-deliveroo px-3 py-1 hover:bg-[#440063]" href="{{ route('admin.plates.index') }}">Home</a>
                    @else
                        <a class="text-deliveroo px-3 py-2 hover:text-[#440063]" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="bg-deliveroo px-3 py-1 rounded hover:bg-[#440063]" href="{{ route('register') }}">Register</a>
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
