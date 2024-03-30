<x-layout>
    <div class="container px-0">


        <div class="input-group margin-top py-3 rounded row bg-dark mb-5">
            <form action="{{route('properties.search')}}" method="GET" class="row mb-2">
                @csrf
                <div class="col">
                    <input type="search" class="form-control rounded" placeholder="Település" aria-label="Search"
                           name="settlement_search"
                           aria-describedby="search-addon"/>
                </div>
                <div class="col">
                    <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                           name="price_min_search"
                           aria-describedby="search-addon"/>
                </div>
                <div class="col">
                    <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search"
                           name="price_max_search"
                           aria-describedby="search-addon"/>
                </div>
                <div class="col">
                    <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                           name="rooms_min_search"
                           aria-describedby="search-addon"/>
                </div>
                <div class="col">
                    <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search"
                           name="rooms_max_search"
                           aria-describedby="search-addon"/>
                </div>
                <div class="col">
                    <button class="btn btn-outline-primary">search</button>
                </div>
            </form>
            <div class="col">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Szűrés
                </button>
                <div class="collapse" id="collapseExample" style="max-width: 1320px !important;">
                    <div class="card card-body" style="width: 1300px">
                        <div class="row">
                            {{--<div class="col">
                                <x-label for="state" value="{{ __('Vármegye: ') }}"/>
                                <x-input id="state" class="block mt-1 w-full" type="text" name="state"
                                         :value="old('state')" required autocomplete="state"/>
                            </div>--}}
                            {{--<div class="col">
                                <x-label for="address" value="{{ __('Utca, házszám: ') }}"/>
                                <x-input id="address" class="block mt-1 w-full" type="text" name="address"
                                         :value="old('address')" required autocomplete="address"/>
                            </div>
                            <div class="col">
                                <x-label for="district" value="{{ __('Kerület/Irányítószám: ') }}"/>
                                <x-input id="district" class="block mt-1 w-full" type="text" name="district"
                                         :value="old('district')" autocomplete="district"/>
                            </div>--}}
                            <div class="col">
                                <x-label for="size" value="{{ __('Méret: ') }}"/>
                                <div class="row">
                                    <div class="col">
                                        <x-input id="size_min" class="block mt-1 w-full" type="number" name="size_min"
                                                 :value="old('size_min')" placeholder="MIN"
                                                 autocomplete="size_min"/>
                                    </div>
                                    <div class="col">
                                        <x-input id="size_max" class="block mt-1 w-full" type="number" name="size_max"
                                                 :value="old('size_max')" placeholder="MAX"
                                                 autocomplete="size_max"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <x-label for="bathrooms" value="{{ __('Fürdőszobák száma: ') }}"/>
                                <x-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms"
                                         :value="old('bathrooms')" autocomplete="bathrooms"/>
                            </div>

                            <div class="col mt-4">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#state" aria-expanded="false"
                                        aria-controls="collapseExample">
                                    Vármegyék:
                                </button>
                                <div class="collapse" id="state" style="max-width: 650px">
                                    <div class="card card-body" style="width: 650px">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="0"
                                                           name="mindegy" id="mindegy">
                                                    <label class="form-check-label" for="mindegy">
                                                        Mindegy
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="1"
                                                           name="gyor_moson" id="gyor_moson">
                                                    <label class="form-check-label" for="gyor_moson">
                                                        Győr-Moson-Sopron
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="2"
                                                           name="vas" id="vas">
                                                    <label class="form-check-label" for="vas">
                                                        Vas
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="3"
                                                           name="zala" id="zala">
                                                    <label class="form-check-label" for="zala">
                                                        Zala
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="4"
                                                           name="komarom" id="komarom">
                                                    <label class="form-check-label" for="komarom">
                                                        Komárom-Esztergom
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="5"
                                                           name="veszprem" id="veszprem">
                                                    <label class="form-check-label" for="veszprem">
                                                        Veszprém
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="6"
                                                           name="somogy" id="somogy">
                                                    <label class="form-check-label" for="somogy">
                                                        Somogy
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="7"
                                                           name="fejer" id="fejer">
                                                    <label class="form-check-label" for="fejer">
                                                        Fejér
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="8"
                                                           name="tolna" id="tolna">
                                                    <label class="form-check-label" for="tolna">
                                                        Tolna
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="9"
                                                           name="baranya" id="baranya">
                                                    <label class="form-check-label" for="baranya">
                                                        Baranya
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="10"
                                                           name="pest" id="pest">
                                                    <label class="form-check-label" for="pest">
                                                        Pest
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="11"
                                                           name="bacs_kiskun" id="bacs_kiskun">
                                                    <label class="form-check-label" for="bacs_kiskun">
                                                        Bács-Kiskun
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="12"
                                                           name="nograd" id="nograd">
                                                    <label class="form-check-label" for="nograd">
                                                        Nógrád
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="13"
                                                           name="heves" id="heves">
                                                    <label class="form-check-label" for="heves">
                                                        Heves
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="14"
                                                           name="jasz" id="jasz">
                                                    <label class="form-check-label" for="jasz">
                                                        Jász-Nagykun-Szolnok
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="15"
                                                           name="csongrad" id="csongrad">
                                                    <label class="form-check-label" for="csongrad">
                                                        Csongrád-Csanád
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="16"
                                                           name="borsod" id="borsod">
                                                    <label class="form-check-label" for="borsod">
                                                        Borsod-Abaúj-Zemplén
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="17"
                                                           name="szabolcs" id="szabolcs">
                                                    <label class="form-check-label" for="szabolcs">
                                                        Szabolcs-Szatmár-Bereg
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="18"
                                                           name="hajdu" id="hajdu">
                                                    <label class="form-check-label" for="hajdu">
                                                        Hajdú-Bihar
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="19"
                                                           name="bekes" id="bekes">
                                                    <label class="form-check-label" for="bekes">
                                                        Békés
                                                    </label>
                                                </div>
                                            </div>
                                        </div>




                                        {{--<div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="2"
                                                   name="ujszeru" id="ujszeru">
                                            <label class="form-check-label" for="ujszeru">
                                                Újszerű
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="3"
                                                   name="felujitott" id="felujitott">
                                            <label class="form-check-label" for="felujitott">
                                                Felújított
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="4"
                                                   name="jo_allapotu" id="jo_allapotu">
                                            <label class="form-check-label" for="jo_allapotu">
                                                Jó állapotú
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="5"
                                                   name="kozepes_allapotu" id="kozepes_allapotu">
                                            <label class="form-check-label" for="kozepes_allapotu">
                                                Közepes állapotú
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="6"
                                                   name="felujitando" id="felujitando">
                                            <label class="form-check-label" for="felujitando">
                                                Felújítandó
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="7"
                                                   name="befejezetlen" id="befejezetlen">
                                            <label class="form-check-label" for="befejezetlen">
                                                Befejezetlen
                                            </label>
                                        </div>--}}

                                    </div>
                                </div>
                            </div>

                            {{--<x-label for="condition" value="{{ __('Ingatlan állapota: ') }}"/>
                            <select
                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                name="condition" id="condition" aria-label="Default select example">
                                <option selected value="0">Mindegy</option>
                                <option value="1">Új építésű</option>
                                <option value="2">Újszerű</option>
                                <option value="3">Felújított</option>
                                <option value="4">Jó állapotú</option>
                                <option value="5">Közepes állapotú</option>
                                <option value="6">Felújítandó</option>
                                <option value="7">Befejezetlen</option>
                            </select>--}}
                            {{--</div>
                        </div>--}}

                            {{--<div class="row mt-4">
                                <div class="col">
                                    <x-label for="rooms" value="{{ __('Szobaszám: ') }}" />
                                    <x-input id="rooms" class="block mt-1 w-full" type="number" name="rooms" :value="old('rooms')" required autocomplete="rooms" />
                                </div>


                            </div>
        --}}
                            <div class="row mt-4">
                                <div class="col mt-4">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#condition" aria-expanded="false"
                                            aria-controls="collapseExample">
                                        Ingatlan állapota:
                                    </button>
                                    <div class="collapse" id="condition">
                                        <div class="card card-body">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="0"
                                                       name="mindegy" id="mindegy">
                                                <label class="form-check-label" for="mindegy">
                                                    Mindegy
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       name="uj_epitesu" id="uj_epitesu">
                                                <label class="form-check-label" for="uj_epitesu">
                                                    Új építésű
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="2"
                                                       name="ujszeru" id="ujszeru">
                                                <label class="form-check-label" for="ujszeru">
                                                    Újszerű
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="3"
                                                       name="felujitott" id="felujitott">
                                                <label class="form-check-label" for="felujitott">
                                                    Felújított
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="4"
                                                       name="jo_allapotu" id="jo_allapotu">
                                                <label class="form-check-label" for="jo_allapotu">
                                                    Jó állapotú
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="5"
                                                       name="kozepes_allapotu" id="kozepes_allapotu">
                                                <label class="form-check-label" for="kozepes_allapotu">
                                                    Közepes állapotú
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="6"
                                                       name="felujitando" id="felujitando">
                                                <label class="form-check-label" for="felujitando">
                                                    Felújítandó
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="7"
                                                       name="befejezetlen" id="befejezetlen">
                                                <label class="form-check-label" for="befejezetlen">
                                                    Befejezetlen
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <x-label for="floor" value="{{ __('Emelet: ') }}"/>
                                    <div class="row">
                                        <div class="col">
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="floor_min" id="floor_min" aria-label="Default select example">
                                                <option selected value="0">Mindegy</option>
                                                <option value="1">Földszint</option>
                                                <option value="2">1. emelet</option>
                                                <option value="3">2. emelet</option>
                                                <option value="4">3. emelet</option>
                                                <option value="5">4. emelet</option>
                                                <option value="6">5. emelet</option>
                                                <option value="7">6. emelet</option>
                                                <option value="8">7. emelet</option>
                                                <option value="9">8. emelet</option>
                                                <option value="10">9. emelet</option>
                                                <option value="11">10. emelet</option>
                                                <option value="12">10 felett</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="floor_max" id="floor_max" aria-label="Default select example">
                                                <option selected value="0">Mindegy</option>
                                                <option value="1">Földszint</option>
                                                <option value="2">1. emelet</option>
                                                <option value="3">2. emelet</option>
                                                <option value="4">3. emelet</option>
                                                <option value="5">4. emelet</option>
                                                <option value="6">5. emelet</option>
                                                <option value="7">6. emelet</option>
                                                <option value="8">7. emelet</option>
                                                <option value="9">8. emelet</option>
                                                <option value="10">9. emelet</option>
                                                <option value="11">10. emelet</option>
                                                <option value="12">10 felett</option>
                                            </select>
                                        </div>


                                    </div>

                                </div>

                                <div class="col">
                                    <x-label for="type" value="{{ __('Típus: ') }}"/>
                                    <select
                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        name="type" id="type" aria-label="Default select example">
                                        <option selected value="0">Mindegy</option>
                                        <option value="1">Tégla lakás</option>
                                        <option value="2">Panel lakás</option>
                                    </select>
                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <x-label for="lift" value="{{ __('Lift: ') }}"/>
                                    <select
                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        name="lift" id="lift" aria-label="Default select example">
                                        <option selected value="0">Mindegy</option>
                                        <option value="1">Van</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <x-label for="inner_height" value="{{ __('Belmagasság: ') }}"/>
                                    <select
                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        name="inner_height" id="inner_height" aria-label="Default select example">
                                        <option selected value="0">Mindegy</option>
                                        <option value="1">3 méternél alacsonyabb</option>
                                        <option value="2">3 méter vagy magasabb</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <x-label for="air_conditioner" value="{{ __('Légkondícionáló: ') }}"/>
                                    <select
                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        name="air_conditioner" id="air_conditioner" aria-label="Default select example">
                                        <option selected value="0">Mindegy</option>
                                        <option value="1">Van</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <x-label for="accessible" value="{{ __('Akadálymentesített: ') }}"/>
                                    <select
                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        name="accessible" id="accessible" aria-label="Default select example">
                                        <option selected value="0">Mindegy</option>
                                        <option value="1">Igen</option>
                                    </select>
                                </div>

                                <div class="col">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#parking" aria-expanded="false"
                                            aria-controls="collapseExample">
                                        Parkolás:
                                    </button>
                                    <div class="collapse" id="parking">
                                        <div class="card card-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="0"
                                                       name="mindegy" id="mindegy">
                                                <label class="form-check-label" for="mindegy">
                                                    Mindegy
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       name="udvari_beálló" id="udvari_beálló">
                                                <label class="form-check-label" for="udvari_beálló">
                                                    Udvari beálló
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="2"
                                                       name="garazs" id="garazs">
                                                <label class="form-check-label" for="garazs">
                                                    Garázs
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="3"
                                                       name="onallo_garazs" id="onallo_garazs">
                                                <label class="form-check-label" for="onallo_garazs">
                                                    Önálló garázs
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="4"
                                                       name="utca" id="utca">
                                                <label class="form-check-label" for="utca">
                                                    Utca, közterület
                                                </label>
                                            </div>

                                        </div>
                                    </div>


                                    {{--<x-label for="parking" value="{{ __('Parkolás: ') }}"/>
                                    <select
                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        name="parking" id="parking" aria-label="Default select example">
                                        <option selected value="0">Mindegy</option>
                                        <option value="1">Udvari beálló</option>
                                        <option value="2">Garázs</option>
                                        <option value="3">Önálló garázs</option>
                                        <option value="4">Utca, közterület</option>
                                    </select>--}}
                                </div>

                                <div class="col">

                                </div>

                                <div class="col">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#heating" aria-expanded="false"
                                            aria-controls="collapseExample">
                                        Fűtés:
                                    </button>
                                    <div class="collapse" id="heating">
                                        <div class="card card-body">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="0"
                                                       name="mindegy" id="mindegy">
                                                <label class="form-check-label" for="mindegy">
                                                    Mindegy
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1"
                                                       name="gaz" id="gaz">
                                                <label class="form-check-label" for="gaz">
                                                    Gáz (konvektor)
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="2"
                                                       name="hazkozponti" id="hazkozponti">
                                                <label class="form-check-label" for="hazkozponti">
                                                    Házközponti
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="3"
                                                       name="tavfutes" id="tavfutes">
                                                <label class="form-check-label" for="tavfutes">
                                                    Távfűtés
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="4"
                                                       name="elektromos_konvektor" id="elektromos_konvektor">
                                                <label class="form-check-label" for="elektromos_konvektor">
                                                    Elektromos konvektor
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="5"
                                                       name="elektromos_futopanel" id="elektromos_futopanel">
                                                <label class="form-check-label" for="elektromos_futopanel">
                                                    Elektromos fűtőpanel
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="6"
                                                       name="klima" id="klima">
                                                <label class="form-check-label" for="klima">
                                                    Klíma
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="7"
                                                       name="kandallo" id="kandallo">
                                                <label class="form-check-label" for="kandallo">
                                                    Kandalló
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="8"
                                                       name="kalyha" id="kalyha">
                                                <label class="form-check-label" for="kalyha">
                                                    Kályha
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="9"
                                                       name="cserepkalyha" id="cserepkalyha">
                                                <label class="form-check-label" for="cserepkalyha">
                                                    Cserépkájha
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="10"
                                                       name="padlofutes" id="padlofutes">
                                                <label class="form-check-label" for="padlofutes">
                                                    Padlófűtés
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="11"
                                                       name="falfutes" id="falfutes">
                                                <label class="form-check-label" for="falfutes">
                                                    Falfűtés
                                                </label>
                                            </div>

                                        </div>
                                    </div>




                                    {{--<x-label for="heating" value="{{ __('Fűtés: ') }}"/>
                                    <select
                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                        name="heating" id="heating" aria-label="Default select example">
                                        <option selected value="0">Mindegy</option>
                                        <option value="1">Gáz (konvektor)</option>
                                        <option value="2">Házközponti</option>
                                        <option value="3">Távfűtés</option>
                                        <option value="4">Elektromos konvektor</option>
                                        <option value="5">Elektromos fűtőpanel</option>
                                        <option value="6">Klíma</option>
                                        <option value="7">Kandalló</option>
                                        <option value="8">Kályha</option>
                                        <option value="9">Cserépkájha</option>
                                        <option value="10">Padlófűtés</option>
                                        <option value="11">Falfűtés</option>
                                    </select>--}}
                                </div>
                            </div>


                            <div class="row mt-4 d-flex justify-content-center">
                                <button class="btn btn-outline-primary width-33">Keresés</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @if(count($properties)<1)
                <p>NINCS TALÁLAT</p>
            @endif
            @foreach($properties as $property)
                @php
                    $address = ($property->settlement).','.' '.($property->address).'.';
                @endphp
                {{--<iframe src="https://maps.google.it/maps?q=<?php echo $address?>&output=embed" width="600" height="450"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}

                <div class="col-lg-3 width-33 mb-5">
                    <div class="card border-0 shadow-2xl" style="width: 25rem;">
                        @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
                            <img
                                src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                class="card-img-top image" alt="...">
                            @if(\App\Models\LikedProperties::where([['user_id', '=', auth()->id()], ['properties_id', '=', $property->id]])->count()>0)
                                <form action="/like/delete/{{$property->id}}" method="GET">
                                    @csrf
                                    @method('DELETE')
                                    <button class="star"><i class="fa-solid fa-star fa-xl" style="color: #f8c920;"></i>
                                    </button>
                                </form>
                            @else
                                <form action="/like/{{$property->id}}" method="POST">
                                    @csrf
                                    <button class="star"><i class="fa-regular fa-star fa-xl"
                                                            style="color: #f8c920;"></i></button>
                                </form>

                            @endif

                        @else
                            <img
                                src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h1 class="card-title">{{number_format(($property->price),0,'','.')}} Ft</h1>
                            <p class="card-text mb-5">{{$address}}</p>
                            <div class="row mb-4">
                                <div class="col-md-3 width-33">
                                    <div>
                                        <i class="fa-solid fa-bed icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->rooms}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3 width-33">
                                    <div>
                                        <i class="fa-solid fa-shower icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->bathrooms}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3 width-33">
                                    <div>
                                        <i class="fa-solid fa-vector-square icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->size}} m<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>
                            <a href="properties/{{$property->id}}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
