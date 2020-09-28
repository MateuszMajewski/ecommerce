<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Shop Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ url('/css/custom_styles.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/product_styles.css') }}" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  <script src="{{ url('/js/cart.js') }}"></script>
</head>

<body class="antialiased">
    @push('styles')
    <link href="{{ asset('css/custom_styles.css') }}" rel="stylesheet">
    @endpush
    <div class="header">
        <a href="/" class="logo menu-font">LOGO</a>
        <div class="dropdown">
                @yield('categories')
        </div>
        <ul class="menu-links">

            <li class="menu-font"><a href="/cart">KOSZYK</a></li>
        </ul>
    </div>
    <div class="nav"></div>

    <div class="content">
        @yield('content')
    </div>

    <section id="footer-section">
        <h4>Dziekujemy za zakupy w naszym sklepie</h4>
    </section>
</body>

</html>