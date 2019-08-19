<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="font-sans antialiased fixed z-20 pin-t pin-x" id="app">
        <nav class="flex items-center justify-between flex-wrap bg-green-lightest p-4">
            <div class="flex items-center flex-no-shrink text-white mr-6">
                <!-- <a class="no-underline block mt-4 md:inline-block md:mt-0 text-red-lightest hover:text-white mr-4" href="/tables">
                    tables
                </a> -->
                <!-- <a class="no-underline block mt-4 md:inline-block md:mt-0 text-red-lightest hover:text-white mr-4" href="/tables">
                    dishes
                </a>
                <a class="no-underline block mt-4 md:inline-block md:mt-0 text-red-lightest hover:text-white mr-4" href="/tables">
                    in kitchen
                </a>
                <a class="no-underline block mt-4 md:inline-block md:mt-0 text-red-lightest hover:text-white mr-4" href="/tables">
                    reservations
                </a> -->
                <a href="https://kashable.tonkabits.com/"><img src="/images/logo_simple_002.png" alt="" width="128px"></a>
            </div>

            <div class="flex items-center w-auto">
                <div class="text-sm flex-grow">
                    <a class="no-underline block mt-4 md:inline-block md:mt-0 text-green-darkest hover:text-green-darker mr-4 uppercase text-md font-bold" href="/tables">
                        tables
                    </a>
                </div>
                <div class="block md:inline-flex">
                </div>


            </div>
        </nav>

        @yield('content')

    </div>
</body>

</html>