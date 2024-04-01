<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Otthonvadász</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script type= "text/javascript" src="{{asset('js/app.js')}}"></script>
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
                        <a class="nav-link {{request()->is('properties') ? 'active a-fejlec' : (request()->is('properties/store') ? 'active a-fejlec' : (request()->is('properties/*') ? 'active a-fejlec' : (request()->is('search*') ? 'active a-fejlec' : '')))}} fejlec" href="{{route('properties.index')}}">Ingatlanok</a>
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

<footer class="py-3 mt-4 shadow-lg">
    @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Kezdőlap</a></li>
            <li class="nav-item"><a href="{{route('properties.index')}}" class="nav-link px-2 text-body-secondary">Ingatlanok</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Kollégáink</a></li>
        </ul>
    @elseif(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'i')
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Kezdőlap</a></li>
            <li class="nav-item"><a href="{{route('properties.index')}}" class="nav-link px-2 text-body-secondary">Ingatlanok</a></li>
            <li class="nav-item"><a href="{{route('properties.create')}}" class="nav-link px-2 text-body-secondary">Új Ingatlan Hozzáadása</a></li>
            <li class="nav-item"><a href="{{route('properties.own')}}" class="nav-link px-2 text-body-secondary">Saját Ingatlanok</a></li>
        </ul>
    @else
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-body-secondary">Kezdőlap</a></li>
            <li class="nav-item"><a href="{{route('properties.index')}}" class="nav-link px-2 text-body-secondary">Ingatlanok</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Kollégáink</a></li>
        </ul>
    @endif
    <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
</footer>
{{--<!-- MDB -->
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>--}}
</body>
</html>
