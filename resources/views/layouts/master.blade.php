@php use Illuminate\Support\Facades\URL; @endphp
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Paraclet-survey</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ URL::asset('img/logo-paraclet.png') }}" type="image">
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
