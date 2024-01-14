<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fiverr Workshop') }}</title>
    <link rel="icon" href="{{ asset('/img/fiverr-favicon.ico') }}" type="image/x-icon">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Arial" rel="stylesheet">
    <!-- Add these lines to your layout file -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    
    <style>
       body, html {
    height: 100%;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}
@media (max-width: 767px) {
        /* Hide the left section on mobile view */
        .left-section {
            display: none;
        }
        /* Adjust the right section to take full width */
        .right-section {
            width: 100% !important;
        }
    }
main {
    display: flex;
    justify-content: space-between;
    height: 100%;
    width: 100%;
    position: relative;
}

.left-section {
    width: 65%;
    position: relative;
    overflow: hidden;
    background-color:#3EE09F;
}

.background-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
}

.logo {
    position: absolute;
    top: 20px;
    left: 20px;
    width: 100px; /* Adjust the width as needed */
    height: auto;
}

.right-section {
    width: 35%;
    padding: 20px;
    height: 100%;
    background-color: #f4f4f4;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.separator {
    margin-top: 20px;
    text-align: center;
}

.separator a {
    text-decoration: none;
    color: #333;
    margin: 0 5px;
}

    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <main>
            @yield('content')
    </main>
</body>
</html>
