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
        <nav class="flex items-center justify-between flex-wrap bg-red p-4">
            <div class="flex items-center flex-no-shrink text-white mr-6">
                <img src="" alt="" width="300px">
            </div>

            <div class="flex items-center w-auto">
                <div class="text-sm flex-grow">
                    <a class="no-underline block mt-4 md:inline-block md:mt-0 text-red-lightest hover:text-white mr-4" href="/tables">
                        tables
                    </a>
                    <a class="no-underline block mt-4 md:inline-block md:mt-0 text-red-lightest hover:text-white mr-4" href="/pos">
                        pos
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