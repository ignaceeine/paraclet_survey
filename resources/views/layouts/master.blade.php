@php use Illuminate\Support\Facades\URL; @endphp
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Paraclet-survey</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ URL::asset('build/img/logo-paraclet.png') }}" type="image">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ URL::asset('build/img/apple-touch-icon-57x57-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ URL::asset('build/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{{ URL::asset('build/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{{ URL::asset('build/img/apple-touch-icon-144x144-precomposed.png') }}">
    @yield('css')
    @include('layouts.head-css')
</head>
<body class="style_3">
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->
    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><!-- /loader_form -->
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    @yield('scripts')
</body>
</html>
