<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
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
            font-size: 84px;
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
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height" style="background-color:white; width:100%;">



        <div class="content">
            <div class="title m-b-md">
                <img src="/images/kashable_logo_001.png" alt="" width="230px">


                <img src="/images/kashable_illus.png" alt="" width="480px" style="position:absolute; right:3%; top:1%;">
            </div>

            <div class="links">
                <a href="https://kashable.tonkabits.com/tables">Demo</a>
                <a href="https://github.com/tonkabits/kashable">Github</a>
                <a href="https://tonkabits.com">Tonkabits.com </a>
                <a href="http://tonkabits.com/projects/point-of-sale/">Blog Post</a>
            </div>

        </div>
    </div>
</body>

</html>