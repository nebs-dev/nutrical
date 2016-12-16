<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nutrical</title>

    <link rel="stylesheet" href="/css/backend/app.css">
    <link rel="stylesheet" href="/css/theme.css">
    <link rel="stylesheet" href="/css/backend/libs.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        @if (Auth::check())
            @include('backend.partials.sidebar')
            @include('backend.partials.navbar')
        @else
            @include('backend.partials.sidebar_guest')
            @include('backend.partials.navbar_guest')
        @endif

        @if ($errors->any())
            <div class="row">
                <div class='flash alert-danger'>
                    @foreach ( $errors->all() as $error )
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        @yield('content')

        @include('backend.partials.footer')
    </div>
</div>

<script type="text/javascript" src="/js/theme.js"></script>
<script type="text/javascript" src="/js/backend/libs.js"></script>
@yield('js')
@include('flash')
</body>
</html>
