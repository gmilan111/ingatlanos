<!doctype html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Otthonvadász</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @vite(['resources/css/app.css'])

    <!-- import Material Icons from Google Fonts -->
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{asset('css\mdb.min.css')}}" type="text/css">

    {{--<link rel="stylesheet" href="{{asset('css\owl.carousel.min.css')}}" type="text/css">--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="{{asset('css\style.css')}}" type="text/css">

</head>
<body>
<nav class="navbar shadow-lg fixed-top navbar-expand-lg z-99">
    <!-- Container wrapper -->
    <div class="container header">
        <!-- Navbar brand -->
        <a class="navbar-brand me-2" href="/">
            <img src="{{asset('img\icon.png')}}" alt="Logo" width="60" height="60"/>
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarButtonsExample">
            <!-- Left links -->
            @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light {{request()->is('/')?'active a-fejlec':''}} fejlec font-light"
                           aria-current="page"
                           href="/">@lang('messages.homepage')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light {{request()->is('properties')?'active a-fejlec':(request()->is('properties/*') ? 'active a-fejlec' : (request()->is('search') ? 'active a-fejlec' : ''))}} fejlec"
                           href="{{route('properties.index')}}">@lang('messages.real_estates')</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('auctions.index')}}"
                           class="nav-link {{request()->is('auctions') ? 'active a-fejlec' : (request()->is('auctions/*') ? 'active a-fejlec' : (request()->is('auction_search') ? 'active a-fejlec' : ''))}} fejlec text-light">Aukciók</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('agents') ? 'active a-fejlec' : (request()->is('agents/*') ? 'active a-fejlec' : '')}} text-light fejlec"
                           href="{{route('agents.index')}}">@lang('messages.agents')</a>
                    </li>
                </ul>
            @elseif(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'i')
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light {{request()->is('/')?'active a-fejlec':''}} fejlec"
                           aria-current="page"
                           href="/">@lang('messages.homepage')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light {{request()->is('properties') ? 'active a-fejlec' : (request()->is('properties/store') ? 'active a-fejlec' : (request()->is('properties/*') ? 'active a-fejlec' : (request()->is('search*') ? 'active a-fejlec' : '')))}} fejlec"
                           href="{{route('properties.index')}}">@lang('messages.real_estates')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fejlec text-light"
                           href="{{route('properties.create')}}">@lang('messages.add_new_property')</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('auctions.index')}}" class="nav-link {{request()->is('auctions') ? 'active a-fejlec' : (request()->is('auctions/*') ? 'active a-fejlec' : (request()->is('auction_search') ? 'active a-fejlec' : ''))}} fejlec text-light">Aukciók</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('/')?'active a-fejlec':''}} fejlec text-light"
                           aria-current="page"
                           href="/">@lang('messages.homepage')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fejlec {{request()->is('properties')?'active a-fejlec':(request()->is('properties/*')?'active a-fejlec':'')}} text-light"
                           href="{{route('properties.index')}}">@lang('messages.real_estates')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{request()->is('agents') ? 'active a-fejlec' : (request()->is('agents/*') ? 'active a-fejlec' : '')}} fejlec text-light"
                           href="{{route('agents.index')}}">@lang('messages.agents')</a>
                    </li>
                </ul>
            @endif
            <!-- Left links -->

            <div class="d-flex align-items-center">
                @auth()
                    @livewire('navigation-menu')
                @else
                    <a class="nav-link fejlec text-light p-2" href="{{ route('login') }}">@lang('messages.login')</a>
                    <a class="nav-link text-light btn-primary register-btn px-4 py-2" data-mdb-ripple-init
                       href="{{ route('register') }}">@lang('messages.registration')</a>
                @endauth
                <select class="changeLang">
                    <option value="hu" {{session()->get('locale') == 'hu' ? 'selected' : ''}}><a
                            href="locale/hu" class="text-decoration-none">Magyar</a></option>
                    <option value="en" {{session()->get('locale') == 'en' ? 'selected' : ''}}><a
                            href="locale/en" class="text-decoration-none">English</a></option>
                </select>
            </div>
        </div>
        @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m")
            @php
                $user_info = \Illuminate\Support\Facades\DB::table('users')->select('*')->where('id', '=', auth()->id())->first();
                $help =json_decode($user_info->notification_state);
                $states_helper = explode(',', $help);
                $states = array();
                foreach ($states_helper as $item){
                    $item = str_replace('"', "", $item);
                    $item = str_replace('[', "", $item);
                    $item = str_replace(']', "", $item);
                    array_push($states, $item);
                }
            @endphp
        @endif
    </div>
    <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<main>
    {{$slot}}
</main>


<!--Agent Modal -->

@if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "i")
    @php
        $agent = \Illuminate\Support\Facades\DB::table('agents')->select('*')->where('user_id', '=', auth()->id())->first();
        $appear = false;
        if(isset($agent)){
            $appear = true;
            $support =json_decode($agent->help);
            $help_helper = explode(',', $support);
            $help = array();
            foreach ($help_helper as $item){
                $item = str_replace('"', "", $item);
                $item = str_replace('[', "", $item);
                $item = str_replace(']', "", $item);
                array_push($help, $item);
            }
        }
    @endphp
    @if($appear)
        <div class="modal fade" id="agentSettings" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-main-color">
                    <div class="modal-header model-header-custom">
                        <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Ingatlanos információk
                            módosítása</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/agent_info/{{auth()->id()}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row mb-5 mt-3">
                                <div class="col-md-6">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="text" class="form-control text-white" id="commission"
                                               value="{{$agent->salary}}" name="commission">
                                        <label for="commission"
                                               class="form-label login text-white">@lang('messages.commission')
                                            (%)</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="number" class="form-control text-white"
                                               value="{{$agent->experience}}"
                                               id="experience" name="experience">
                                        <label for="experience"
                                               class="form-label login text-white">@lang('messages.experience')</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <div class="form-outline" data-mdb-input-init>
                                        <input type="text" class="form-control text-white" id="language"
                                               value="{{$agent->language}}" name="language">
                                        <label for="language"
                                               class="form-label login text-white">@lang('messages.language')</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-outline" data-mdb-input-init>
                                    <textarea class="form-control text-white" id="description"
                                              name="description">{{$agent->description}}</textarea>
                                        <label for="description"
                                               class="form-label login text-white">@lang('messages.description')</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="form-label text-white">@lang('messages.help_reg')</label>
                                <div class="card card-body bg-main-color">
                                    @if(isset($help))
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="belsőépítész"
                                                   name="help[]" id="belsőépítész"
                                                   @if(in_array("belsőépítész", $help))checked @endif>
                                            <label class="form-check-label text-white" for="belsőépítész">
                                                @lang('messages.int_designer')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="energetikai tanúsító"
                                                   name="help[]" id="energetikai_tanúsító"
                                                   @if(in_array("energetikai tanúsító", $help))checked @endif>
                                            <label class="form-check-label text-white" for="energetikai_tanúsító">
                                                @lang('messages.energy_certificate')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="építész"
                                                   name="help[]" id="epitesz"
                                                   @if(in_array("építész", $help))checked @endif>
                                            <label class="form-check-label text-white" for="epitesz">
                                                @lang('messages.architect')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="földhivatali ügyintézés"
                                                   name="help[]" id="foldhivatali_ugyintezes"
                                                   @if(in_array("földhivatali ügyintézés", $help))checked @endif>
                                            <label class="form-check-label text-white" for="foldhivatali_ugyintezes">
                                                @lang('messages.land_reg_administration')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="hitelügyintézés"
                                                   name="help[]" id="hitel"
                                                   @if(in_array("hitelügyintézés", $help))checked @endif>
                                            <label class="form-check-label text-white" for="hitel">
                                                @lang('messages.credit_management')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="közjegyző"
                                                   name="help[]" id="kozjegyzo"
                                                   @if(in_array("közjegyző", $help))checked @endif>
                                            <label class="form-check-label text-white" for="kozjegyzo">
                                                @lang('messages.notary_public')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="lakberendező"
                                                   name="help[]" id="lakberendezo"
                                                   @if(in_array("lakberendező", $help))checked @endif>
                                            <label class="form-check-label text-white" for="lakberendezo">
                                                @lang('messages.decorator')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="ügyvéd"
                                                   name="help[]" id="ugyved"
                                                   @if(in_array("ügyvéd", $help))checked @endif>
                                            <label class="form-check-label text-white" for="ugyved">
                                                @lang('messages.lawyer')
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="belsőépítész"
                                                   name="help[]" id="belsőépítész">
                                            <label class="form-check-label text-white" for="belsőépítész">
                                                @lang('messages.int_designer')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="energetikai tanúsító"
                                                   name="help[]" id="energetikai_tanúsító">
                                            <label class="form-check-label text-white" for="energetikai_tanúsító">
                                                @lang('messages.energy_certificate')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="építész"
                                                   name="help[]" id="epitesz">
                                            <label class="form-check-label text-white" for="epitesz">
                                                @lang('messages.architect')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="földhivatali ügyintézés"
                                                   name="help[]" id="foldhivatali_ugyintezes">
                                            <label class="form-check-label text-white" for="foldhivatali_ugyintezes">
                                                @lang('messages.land_reg_administration')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="hitelügyintézés"
                                                   name="help[]" id="hitel">
                                            <label class="form-check-label text-white" for="hitel">
                                                @lang('messages.credit_management')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="közjegyző"
                                                   name="help[]" id="kozjegyzo">
                                            <label class="form-check-label text-white" for="kozjegyzo">
                                                @lang('messages.notary_public')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="lakberendező"
                                                   name="help[]" id="lakberendezo">
                                            <label class="form-check-label text-white" for="lakberendezo">
                                                @lang('messages.decorator')
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="ügyvéd"
                                                   name="help[]" id="ugyved">
                                            <label class="form-check-label text-white" for="ugyved">
                                                @lang('messages.lawyer')
                                            </label>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer model-footer-custom">
                                {{--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>--}}
                                <button class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endif

<!--Notification Modal -->
<div class="modal fade" id="notificationSetting" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-main-color">
            <div class="modal-header model-header-custom">
                <h1 class="modal-title fs-5 text-white"
                    id="staticBackdropLabel">@lang('messages.newsletter_settings')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mt-4">
                    <form action="/notification/{{auth()->id()}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card card-body bg-main-color text-white">
                            @if(isset($states))
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   name="state[]" id="gyor_moson" value="Győr-Moson-Sopron"
                                                   @if(in_array("Győr-Moson-Sopron",$states)) checked @endif>
                                            <label class="form-check-label" for="gyor_moson">
                                                Győr-Moson-Sopron
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Vas"
                                                   name="state[]" id="vas"
                                                   @if(in_array("Vas", $states)) checked @endif>
                                            <label class="form-check-label" for="vas">
                                                Vas
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Zala"
                                                   name="state[]" id="zala"
                                                   @if(in_array("Zala", $states)) checked @endif>
                                            <label class="form-check-label" for="zala">
                                                Zala
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Komárom-Esztergom"
                                                   name="state[]" id="komarom"
                                                   @if(in_array("Komárom-Esztergom", $states)) checked @endif>
                                            <label class="form-check-label" for="komarom">
                                                Komárom-Esztergom
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Veszprém"
                                                   name="state[]" id="veszprem"
                                                   @if(in_array("Veszprém", $states)) checked @endif>
                                            <label class="form-check-label" for="veszprem">
                                                Veszprém
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Somogy"
                                                   name="state[]" id="somogy"
                                                   @if(in_array("Somogy", $states)) checked @endif>
                                            <label class="form-check-label" for="somogy">
                                                Somogy
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Fejér"
                                                   name="state[]" id="fejer"
                                                   @if(in_array("Fejér", $states)) checked @endif>
                                            <label class="form-check-label" for="fejer">
                                                Fejér
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Tolna"
                                                   name="state[]" id="tolna"
                                                   @if(in_array("Tolna", $states)) checked @endif>
                                            <label class="form-check-label" for="tolna">
                                                Tolna
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Baranya"
                                                   name="state[]" id="baranya"
                                                   @if(in_array("Baranya", $states)) checked @endif>
                                            <label class="form-check-label" for="baranya">
                                                Baranya
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Pest"
                                                   name="state[]" id="pest"
                                                   @if(in_array("Pest", $states)) checked @endif>
                                            <label class="form-check-label" for="pest">
                                                Pest
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Bács-Kiskun"
                                                   name="state[]" id="bacs_kiskun"
                                                   @if(in_array("Bács-Kiskun", $states)) checked @endif>
                                            <label class="form-check-label" for="bacs_kiskun">
                                                Bács-Kiskun
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Nógrád"
                                                   name="state[]" id="nograd"
                                                   @if(in_array("Nógrád", $states)) checked @endif>
                                            <label class="form-check-label" for="nograd">
                                                Nógrád
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Heves"
                                                   name="state[]" id="heves"
                                                   @if(in_array("Heves", $states)) checked @endif>
                                            <label class="form-check-label" for="heves">
                                                Heves
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Jász-Nagykun-Szolnok"
                                                   name="state[]" id="jasz"
                                                   @if(in_array("Jász-Nagykun-Szolnok", $states)) checked @endif>
                                            <label class="form-check-label" for="jasz">
                                                Jász-Nagykun-Szolnok
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Csongrád-Csanád"
                                                   name="state[]" id="csongrad"
                                                   @if(in_array("Csongrád-Csanád", $states)) checked @endif>
                                            <label class="form-check-label" for="csongrad">
                                                Csongrád-Csanád
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Borsod-Abaúj-Zemplén"
                                                   name="state[]" id="borsod"
                                                   @if(in_array("Borsod-Abaúj-Zemplén", $states)) checked @endif>
                                            <label class="form-check-label" for="borsod">
                                                Borsod-Abaúj-Zemplén
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Szabolcs-Szatmár-Bereg"
                                                   name="state[]" id="szabolcs"
                                                   @if(in_array("Szabolcs-Szatmár-Bereg", $states)) checked @endif>
                                            <label class="form-check-label" for="szabolcs">
                                                Szabolcs-Szatmár-Bereg
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Hajdú-Bihar"
                                                   name="state[]" id="hajdu"
                                                   @if(in_array("Hajdú-Bihar", $states)) checked @endif>
                                            <label class="form-check-label" for="hajdu">
                                                Hajdú-Bihar
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Békés"
                                                   name="state[]" id="bekes"
                                                   @if(in_array("Békés", $states)) checked @endif>
                                            <label class="form-check-label" for="bekes">
                                                Békés
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            @else
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Győr-Moson-Sopron"
                                                   name="state[]" id="gyor_moson">
                                            <label class="form-check-label" for="gyor_moson">
                                                Győr-Moson-Sopron
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Vas"
                                                   name="state[]" id="vas">
                                            <label class="form-check-label" for="vas">
                                                Vas
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Zala"
                                                   name="state[]" id="zala">
                                            <label class="form-check-label" for="zala">
                                                Zala
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Komárom-Esztergom"
                                                   name="state[]" id="komarom">
                                            <label class="form-check-label" for="komarom">
                                                Komárom-Esztergom
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Veszprém"
                                                   name="state[]" id="veszprem">
                                            <label class="form-check-label" for="veszprem">
                                                Veszprém
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Somogy"
                                                   name="state[]" id="somogy">
                                            <label class="form-check-label" for="somogy">
                                                Somogy
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Fejér"
                                                   name="state[]" id="fejer">
                                            <label class="form-check-label" for="fejer">
                                                Fejér
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Tolna"
                                                   name="state[]" id="tolna">
                                            <label class="form-check-label" for="tolna">
                                                Tolna
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Baranya"
                                                   name="state[]" id="baranya">
                                            <label class="form-check-label" for="baranya">
                                                Baranya
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="Pest"
                                                   name="state[]" id="pest">
                                            <label class="form-check-label" for="pest">
                                                Pest
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Bács-Kiskun"
                                                   name="state[]" id="bacs_kiskun">
                                            <label class="form-check-label" for="bacs_kiskun">
                                                Bács-Kiskun
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Nógrád"
                                                   name="state[]" id="nograd">
                                            <label class="form-check-label" for="nograd">
                                                Nógrád
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Heves"
                                                   name="state[]" id="heves">
                                            <label class="form-check-label" for="heves">
                                                Heves
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Jász-Nagykun-Szolnok"
                                                   name="state[]" id="jasz">
                                            <label class="form-check-label" for="jasz">
                                                Jász-Nagykun-Szolnok
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Csongrád-Csanád"
                                                   name="state[]" id="csongrad">
                                            <label class="form-check-label" for="csongrad">
                                                Csongrád-Csanád
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Borsod-Abaúj-Zemplén"
                                                   name="state[]" id="borsod">
                                            <label class="form-check-label" for="borsod">
                                                Borsod-Abaúj-Zemplén
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Szabolcs-Szatmár-Bereg"
                                                   name="state[]" id="szabolcs">
                                            <label class="form-check-label" for="szabolcs">
                                                Szabolcs-Szatmár-Bereg
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Hajdú-Bihar"
                                                   name="state[]" id="hajdu">
                                            <label class="form-check-label" for="hajdu">
                                                Hajdú-Bihar
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox"
                                                   value="Békés"
                                                   name="state[]" id="bekes">
                                            <label class="form-check-label" for="bekes">
                                                Békés
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="mt-4 modal-footer model-footer-custom">
                            <button type="button" class="btn btn-secondary rounded-custom"
                                    data-bs-dismiss="modal">@lang('messages.back')</button>
                            <button class="btn btn-second-main-color text-white">@lang('messages.save')</button>
                        </div>
                    </form>
                </div>


            </div>


        </div>

    </div>
</div>


<footer class="py-3 shadow-lg footer-bg mt-5">
    @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-light">@lang('messages.homepage')</a>
            </li>
            <li class="nav-item"><a href="{{route('properties.index')}}"
                                    class="nav-link px-2 text-light">@lang('messages.real_estates')</a></li>
            <li class="nav-item"><a href="{{route('auctions.index')}}"
                                    class="nav-link px-2 text-light">Aukciók</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">@lang('messages.agents')</a></li>
        </ul>
    @elseif(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'i')
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-light">@lang('messages.homepage')</a>
            </li>
            <li class="nav-item"><a href="{{route('properties.index')}}"
                                    class="nav-link px-2 text-light">@lang('messages.real_estates')</a>
            </li>
            <li class="nav-item"><a href="{{route('properties.create')}}"
                                    class="nav-link px-2 text-light">@lang('messages.add_new_property')</a>
            </li>
            <li class="nav-item"><a href="{{route('properties.own')}}"
                                    class="nav-link px-2 text-light">@lang('messages.own_properties')</a></li>
        </ul>
    @else
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="/" class="nav-link px-2 text-light">@lang('messages.homepage')</a>
            </li>
            <li class="nav-item"><a href="{{route('properties.index')}}"
                                    class="nav-link px-2 text-light">@lang('messages.real_estates')</a>
            </li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-light">@lang('messages.agents')</a></li>
        </ul>
    @endif
    <p class="text-center text-light">© 2024 Company, Inc</p>
</footer>
<!-- MDB -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"
></script>


<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<script type="text/javascript" src="{{asset('js/mdb.umd.min.js')}}"></script>

{{--<script src="{{asset('js/owl.carousel.min.js')}}"></script>--}}

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var url = "{{ route('changeLang') }}";

    $(".changeLang").change(function () {
        window.location.href = url + "?lang=" + $(this).val();
    })
</script>
</body>
</html>
