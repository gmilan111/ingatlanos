<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Otthonvadász</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('css\style.css')}}" type="text/css">
</head>
<body>
<nav data-mdb-navbar-init class="navbar shadow-lg fixed-top navbar-expand-lg navbar-light bg-body-tertiary">
    <!-- Container wrapper -->
    <div class="container ">
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="navbar-brand me-2" href="/">
                        <img src="{{asset('img\icon.png')}}" alt="Logo" width="50px" height="50px"/>
                    </a>
                </li>
            </ul>
        </div>

        <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
            <!-- Left links -->
            @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('/')?'active a-fejlec':''}} fejlec" aria-current="page" href="/">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('properties')?'active a-fejlec':''}} fejlec" href="{{route('properties.index')}}">Ingatlanok</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fejlec" href="#">Kollégáink</a>
                    </li>
                </ul>
            @elseif(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'i')
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('/')?'active a-fejlec':''}} fejlec" aria-current="page" href="/">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('properties') ? 'active a-fejlec' : (request()->is('properties/store') ? 'active a-fejlec' : (request()->is('properties/*') ? 'active a-fejlec' : ''))}} fejlec" href="{{route('properties.index')}}">Ingatlanok</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fejlec" href="{{route('properties.create')}}">Új Ingatlan Hozzáadása</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('properties_own')?'active a-fejlec':''}} fejlec" href="{{route('properties.own')}}">Saját Ingatlanok</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active a-fejlec fejlec" aria-current="page" href="/">Kezdőlap</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fejlec" href="{{route('properties.index')}}">Ingatlanok</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fejlec" href="#">Kollégáink</a>
                    </li>
                </ul>
            @endif
            <!-- Left links -->
        </div>

        <div class="collapse navbar-collapse" id="navbarRightAlignExample">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    @livewire('navigation-menu')
                @else
                <li class="nav-item">
                    <a class="nav-link fejlec" href="{{ route('register') }}">Regisztráció</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fejlec" href="{{ route('login') }}">Bejelentkezés</a>
                </li>
                @endauth
            </ul>
        </div>
        <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
</nav>

<main>
    {{$slot}}
</main>
</body>
</html>
