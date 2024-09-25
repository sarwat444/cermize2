<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8"/>
    <title>@stack('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
    <title>Keramik selber bemalen in Moers - Ceramaze Studio</title>
    <meta name="description"
          content="cermaze Studio - Das Keramikmalstudio. Ideal für Afterwork, Kindergeburtstag, Junggesellinnenabschied und Firmenevents">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="Keramik selber bemalen in Moers - Ceramaze Studio">
    <meta property="og:description"
          content="cermaze Studio - Das Keramikmalstudio. Ideal für Afterwork, Kindergeburtstag, Junggesellinnenabschied und Firmenevents">
    <meta property="og:url" content="https://ceramaze-studio.de">
    <meta property="og:image" content="https://ceramaze-studio.de/images/ceramaze_hero1.webp">
    <meta property="og:locale" content="de_DE">
    <meta name="robots" content="noindex,follow">

    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">

    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/events.css')}}">
    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/reservation.css')}}">
    <link rel="stylesheet" href="{{asset(config('constants.asset_path').'assets/front/css/slick.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha384-O3QraDS9uWr+N8H2RoLXImw3RU91uLIG7zMFOOYlFNHcNzg3mTfV1+gK2PB/8T13" crossorigin="anonymous">


@stack('styles')
<body>
@include('front.includes.navbar')

@yield('content')

@include('front.includes.footer')

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="{{asset(config('constants.asset_path').'assets/front/js/script.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/front/js/main.min.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/front/js/wow.js')}}"></script>
<script src="{{asset(config('constants.asset_path').'assets/front/js/slick.min.js')}}"></script>
<!-- Slick Slider JS -->
@stack('scripts')
</body>
</html>
