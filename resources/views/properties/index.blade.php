<x-layout>
    <div class="container px-0">
        <div class="input-group margin-top py-3 rounded row bg-dark mb-5">
            <form action="{{route('properties.search')}}" method="POST" class="row mb-2">
                @csrf
                <div class="col">
                    <label for="sale" class="flex items-center">
                        @if(isset($sale_rent) && $sale_rent == 'sale')
                            <x-input checked id="sale" name="sale_rent" onclick="salerent()" type="radio" value="sale"/>
                            <span class="ms-2 text-sm text-gray-600">@lang('messages.for_sale')</span>
                        @else
                            <x-input id="sale" name="sale_rent" onclick="salerent()" type="radio" value="sale"/>
                            <span class="ms-2 text-sm text-gray-600">@lang('messages.for_sale')</span>
                        @endif
                    </label>
                    <label for="rent" class="flex items-center">
                        @if(isset($sale_rent) && $sale_rent == 'rent')
                            <x-input id="rent" name="sale_rent" onclick="salerent()" checked type="radio" value="rent"/>
                            <span class="ms-2 text-sm text-gray-600">@lang('messages.for_rent')</span>
                        @else
                            <x-input id="rent" name="sale_rent" onclick="salerent()" type="radio" value="rent"/>
                            <span class="ms-2 text-sm text-gray-600">@lang('messages.for_rent')</span>
                        @endif
                    </label>
                </div>
                <div class="col">
                    @if(isset($settlement_search))
                        <input type="search" class="form-control rounded" placeholder="@lang('messages.settlement')" aria-label="Search"
                               name="settlement_search"
                               aria-describedby="search-addon" value="{{$settlement_search}}"/>
                    @else
                        <input type="search" class="form-control rounded" placeholder="@lang('messages.settlement')" aria-label="Search"
                               name="settlement_search"
                               aria-describedby="search-addon"/>
                    @endif
                </div>
                <div class="col">
                    @if(isset($price_min_search))
                        <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                               name="price_min_search"
                               aria-describedby="search-addon" value="{{$price_min_search}}"/>
                    @else
                        <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                               name="price_min_search"
                               aria-describedby="search-addon"/>
                    @endif
                </div>
                <div class="col">
                    @if(isset($price_max_search))
                        <input type="search" class="form-control rounded" placeholder="MAX" aria-label="Search"
                               name="price_max_search"
                               aria-describedby="search-addon" value="{{$price_max_search}}"/>
                    @else
                        <input type="search" class="form-control rounded" placeholder="MAX" aria-label="Search"
                               name="price_max_search"
                               aria-describedby="search-addon"/>
                    @endif
                </div>
                <div class="col">
                    @if(isset($rooms_min_search))
                        <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                               name="rooms_min_search"
                               aria-describedby="search-addon" value="{{$rooms_min_search}}"/>
                    @else
                        <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                               name="rooms_min_search"
                               aria-describedby="search-addon"/>
                    @endif

                </div>
                <div class="col">
                    @if(isset($rooms_max_search))
                        <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search"
                               name="rooms_max_search"
                               aria-describedby="search-addon" value="{{$rooms_max_search}}"/>
                    @else
                        <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search"
                               name="rooms_max_search"
                               aria-describedby="search-addon"/>
                    @endif

                </div>
                <div class="col">
                    <button class="btn btn-outline-primary">@lang('messages.search')</button>
                </div>
                <div class="col">
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        @lang('messages.filter')
                    </button>
                    <div class="collapse" id="collapseExample" style="max-width: 1320px !important;">
                        <div class="card card-body" style="width: 1300px">
                            <div class="row">
                                <div class="col">
                                    <x-label for="size">@lang('messages.size')</x-label>
                                    <div class="row">
                                        <div class="col">
                                            @if(isset($size_min))
                                                <x-input id="size_min" class="block mt-1 w-full" type="number"
                                                         name="size_min"
                                                         value="{{$size_min}}" placeholder="MIN"
                                                         autocomplete="size_min"/>
                                            @else
                                                <x-input id="size_min" class="block mt-1 w-full" type="number"
                                                         name="size_min"
                                                         :value="old('size_min')" placeholder="MIN"
                                                         autocomplete="size_min"/>
                                            @endif

                                        </div>
                                        <div class="col">
                                            @if(isset($size_max))
                                                <x-input id="size_max" class="block mt-1 w-full" type="number"
                                                         name="size_max"
                                                         value="{{$size_max}}" placeholder="MAX"
                                                         autocomplete="size_max"/>
                                            @else
                                                <x-input id="size_max" class="block mt-1 w-full" type="number"
                                                         name="size_max"
                                                         :value="old('size_max')" placeholder="MAX"
                                                         autocomplete="size_max"/>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <x-label for="bathrooms">@lang('messages.bathrooms')</x-label>
                                    <div class="row">
                                        <div class="col">
                                            @if(isset($bathrooms_min))
                                                <x-input id="bathrooms_min" class="block mt-1 w-full" type="number"
                                                         name="bathrooms_min"
                                                         value="{{$bathrooms_min}}" placeholder="MIN"
                                                         autocomplete="bathrooms_min"/>
                                            @else
                                                <x-input id="bathrooms_min" class="block mt-1 w-full" type="number"
                                                         name="bathrooms_min"
                                                         :value="old('bathrooms_min')" placeholder="MIN"
                                                         autocomplete="bathrooms_min"/>
                                            @endif

                                        </div>
                                        <div class="col">
                                            @if(isset($bathrooms_max))
                                                <x-input id="bathrooms_max" class="block mt-1 w-full" type="number"
                                                         name="bathrooms_max"
                                                         value="{{$bathrooms_max}}" placeholder="MAX"
                                                         autocomplete="bathrooms_max"/>
                                            @else
                                                <x-input id="bathrooms_max" class="block mt-1 w-full" type="number"
                                                         name="bathrooms_max"
                                                         :value="old('bathrooms_max')" placeholder="MAX"
                                                         autocomplete="bathrooms_max"/>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="col mt-4">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#state" aria-expanded="false"
                                            aria-controls="collapseExample">
                                        @lang('messages.county')
                                    </button>
                                    <div class="collapse" id="state" style="max-width: 650px">
                                        <div class="card card-body" style="width: 650px">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Mindegy"
                                                               name="mindegy" id="mindegy" onchange="States()">
                                                        <label class="form-check-label" for="mindegy">
                                                            @lang('messages.any')
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            @if(isset($states))
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   name="state[]" id="gyor_moson"
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
                                                </div>
                                                <div class="row">
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
                                                </div>

                                                <div class="row">
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
                                                </div>

                                                <div class="row">
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

                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Zala"
                                                                   name="state[]" id="zala">
                                                            <label class="form-check-label" for="zala">
                                                                Zala
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
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
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="Pest"
                                                                   name="state[]" id="pest">
                                                            <label class="form-check-label" for="pest">
                                                                Pest
                                                            </label>
                                                        </div>
                                                    </div>

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
                                                </div>

                                                <div class="row">
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

                                            <script>
                                                function States() {
                                                    var a = document.getElementsByName("state[]");
                                                    var b = document.getElementById("mindegy");
                                                    if (b.checked === true) {
                                                        for (var i = 0; i < a.length; i++) {
                                                            a[i].disabled = true;
                                                        }
                                                    }
                                                    if (b.checked === false) {
                                                        for (var i = 0; i < a.length; i++) {
                                                            a[i].disabled = false;
                                                        }
                                                    }
                                                }
                                            </script>

                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col mt-4">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#condition" aria-expanded="false"
                                                aria-controls="collapseExample">
                                            @lang('messages.condition')
                                        </button>
                                        <div class="collapse" id="condition">
                                            <div class="card card-body">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   value="Mindegy"
                                                                   name="mindegy_cond" id="mindegy_cond"
                                                                   onchange="Conditions()">
                                                            <label class="form-check-label" for="mindegy_cond">
                                                                @lang('messages.any')
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(isset($condition))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Új építésű"
                                                               name="condition[]" id="uj_epitesu"
                                                               @if(in_array("Új építésű",$condition)) checked @endif>
                                                        <label class="form-check-label" for="uj_epitesu">
                                                            @lang('messages.newly_built')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Újszerű"
                                                               name="condition[]" id="ujszeru"
                                                               @if(in_array("Újszerű",$condition)) checked @endif>
                                                        <label class="form-check-label" for="ujszeru">
                                                            @lang('messages.novel')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Felújított"
                                                               name="condition[]" id="felujitott"
                                                               @if(in_array("Felújított",$condition)) checked @endif>
                                                        <label class="form-check-label" for="felujitott">
                                                            @lang('messages.renovated')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Jó állapotú"
                                                               name="condition[]" id="jo_allapotu"
                                                               @if(in_array("Jó állapotú",$condition)) checked @endif>
                                                        <label class="form-check-label" for="jo_allapotu">
                                                            @lang('messages.in_good_condition')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Közepes állapotú"
                                                               name="condition[]" id="kozepes_allapotu"
                                                               @if(in_array("Közepes állapotú",$condition)) checked @endif>
                                                        <label class="form-check-label" for="kozepes_allapotu">
                                                            @lang('messages.in_medium_condition')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Felújítandó"
                                                               name="condition[]" id="felujitando"
                                                               @if(in_array("Felújítandó",$condition)) checked @endif>
                                                        <label class="form-check-label" for="felujitando">
                                                            @lang('messages.to_be_renovated')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Befejezetlen"
                                                               name="condition[]" id="befejezetlen"
                                                               @if(in_array("Befejezetlen",$condition)) checked @endif>
                                                        <label class="form-check-label" for="befejezetlen">
                                                            @lang('messages.unfinished')
                                                        </label>
                                                    </div>

                                                @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Új építésű"
                                                               name="condition[]" id="uj_epitesu">
                                                        <label class="form-check-label" for="uj_epitesu">
                                                            @lang('messages.newly_built')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Újszerű"
                                                               name="condition[]" id="ujszeru">
                                                        <label class="form-check-label" for="ujszeru">
                                                            @lang('messages.novel')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Felújított"
                                                               name="condition[]" id="felujitott">
                                                        <label class="form-check-label" for="felujitott">
                                                            @lang('messages.renovated')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Jó állapotú"
                                                               name="condition[]" id="jo_allapotu">
                                                        <label class="form-check-label" for="jo_allapotu">
                                                            @lang('messages.in_good_condition')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Közepes állapotú"
                                                               name="condition[]" id="kozepes_allapotu">
                                                        <label class="form-check-label" for="kozepes_allapotu">
                                                            @lang('messages.in_medium_condition')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Felújítandó"
                                                               name="condition[]" id="felujitando">
                                                        <label class="form-check-label" for="felujitando">
                                                            @lang('messages.to_be_renovated')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Befejezetlen"
                                                               name="condition[]" id="befejezetlen">
                                                        <label class="form-check-label" for="befejezetlen">
                                                            @lang('messages.unfinished')
                                                        </label>
                                                    </div>
                                                @endif

                                                <script>
                                                    function Conditions() {
                                                        var a = document.getElementsByName("condition[]");
                                                        var b = document.getElementById("mindegy_cond");
                                                        if (b.checked === true) {
                                                            for (var j = 0; j < a.length; j++) {
                                                                a[j].disabled = true;
                                                            }
                                                        }
                                                        if (b.checked === false) {
                                                            for (var j = 0; j < a.length; j++) {
                                                                a[j].disabled = false;
                                                            }
                                                        }
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <x-label for="floor">@lang('messages.floor')</x-label>
                                        <div class="row">
                                            <div class="col">
                                                @if(isset($floor_min))
                                                    <select
                                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                        name="floor_min" id="floor_min"
                                                        aria-label="Default select example">
                                                        <option @if($floor_min == "Mindegy") selected @endif>@lang('messages.any')
                                                        </option>
                                                        <option value="0" @if($floor_min == 0) selected @endif>
                                                            @lang('messages.ground_floor')
                                                        </option>
                                                        <option value="1" @if($floor_min == 1) selected @endif>1.
                                                        </option>
                                                        <option value="2" @if($floor_min == 2) selected @endif>2.
                                                        </option>
                                                        <option value="3" @if($floor_min == 3) selected @endif>3.
                                                        </option>
                                                        <option value="4" @if($floor_min == 4) selected @endif>4.
                                                        </option>
                                                        <option value="5" @if($floor_min == 5) selected @endif>5.
                                                        </option>
                                                        <option value="6" @if($floor_min == 6) selected @endif>6.
                                                        </option>
                                                        <option value="7" @if($floor_min == 7) selected @endif>7.
                                                        </option>
                                                        <option value="8" @if($floor_min == 8) selected @endif>8.
                                                        </option>
                                                        <option value="9" @if($floor_min == 9) selected @endif>9.
                                                        </option>
                                                        <option value="10" @if($floor_min == 10) selected @endif>10.
                                                        </option>
                                                    </select>
                                                @else
                                                    <select
                                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                        name="floor_min" id="floor_min"
                                                        aria-label="Default select example">
                                                        <option selected>@lang('messages.any')</option>
                                                        <option value="0">@lang('messages.ground_floor')</option>
                                                        <option value="1">1.</option>
                                                        <option value="2">2.</option>
                                                        <option value="3">3.</option>
                                                        <option value="4">4.</option>
                                                        <option value="5">5.</option>
                                                        <option value="6">6.</option>
                                                        <option value="7">7.</option>
                                                        <option value="8">8.</option>
                                                        <option value="9">9.</option>
                                                        <option value="10">10.</option>
                                                    </select>
                                                @endif

                                            </div>
                                            <div class="col">
                                                @if(isset($floor_max))
                                                    <select
                                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                        name="floor_max" id="floor_max"
                                                        aria-label="Default select example">
                                                        <option @if($floor_max == "Mindegy") selected @endif>@lang('messages.any')
                                                        </option>
                                                        <option value="0" @if($floor_max == 0) selected @endif>
                                                            @lang('messages.ground_floor')
                                                        </option>
                                                        <option value="1" @if($floor_max == 1) selected @endif>1.
                                                        </option>
                                                        <option value="2" @if($floor_max == 2) selected @endif>2.
                                                        </option>
                                                        <option value="3" @if($floor_max == 3) selected @endif>3.
                                                        </option>
                                                        <option value="4" @if($floor_max == 4) selected @endif>4.
                                                        </option>
                                                        <option value="5" @if($floor_max == 5) selected @endif>5.
                                                        </option>
                                                        <option value="6" @if($floor_max == 6) selected @endif>6.
                                                        </option>
                                                        <option value="7" @if($floor_max == 7) selected @endif>7.
                                                        </option>
                                                        <option value="8" @if($floor_max == 8) selected @endif>8.
                                                        </option>
                                                        <option value="9" @if($floor_max == 9) selected @endif>9.
                                                        </option>
                                                        <option value="10" @if($floor_max == 10) selected @endif>10.
                                                        </option>
                                                    </select>
                                                @else
                                                    <select
                                                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                        name="floor_max" id="floor_max"
                                                        aria-label="Default select example">
                                                        <option selected>@lang('messages.any')</option>
                                                        <option value="0">@lang('messages.ground_floor')</option>
                                                        <option value="1">1.</option>
                                                        <option value="2">2.</option>
                                                        <option value="3">3.</option>
                                                        <option value="4">4.</option>
                                                        <option value="5">5.</option>
                                                        <option value="6">6.</option>
                                                        <option value="7">7.</option>
                                                        <option value="8">8.</option>
                                                        <option value="9">9.</option>
                                                        <option value="10">10.</option>
                                                    </select>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <x-label for="type">@lang('messages.type')</x-label>
                                        @if(isset($type))
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="type" id="type" aria-label="Default select example">
                                                <option @if($type == "Mindegy") selected @endif>@lang('messages.any')</option>
                                                <option value="Tégla lakás" @if($type == "Tégla lakás") selected @endif>
                                                    @lang('messages.brick_built_apartment')
                                                </option>
                                                <option value="Panel lakás" @if($type == "Panel lakás") selected @endif>
                                                    @lang('messages.panel_apartment')
                                                </option>
                                            </select>
                                        @else
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="type" id="type" aria-label="Default select example">
                                                <option selected>@lang('messages.any')</option>
                                                <option value="Tégla lakás">@lang('messages.brick_built_apartment')</option>
                                                <option value="Panel lakás">@lang('messages.panel_apartment')</option>
                                            </select>
                                        @endif

                                    </div>

                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <x-label for="lift">@lang('messages.lift')</x-label>
                                        @if(isset($lift))
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="lift" id="lift" aria-label="Default select example">
                                                <option @if($lift == "Mindegy") selected @endif>@lang('messages.any')</option>
                                                <option value="Van" @if($lift == "Van") selected @endif>@lang('messages.there_is')</option>
                                            </select>
                                        @else
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="lift" id="lift" aria-label="Default select example">
                                                <option selected>@lang('messages.any')</option>
                                                <option value="Van">@lang('messages.there_is')</option>
                                            </select>
                                        @endif

                                    </div>

                                    <div class="col">
                                        <x-label for="inner_height">@lang('messages.inner_height')</x-label>
                                        @if(isset($inner_height))
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="inner_height" id="inner_height"
                                                aria-label="Default select example">
                                                <option @if($inner_height == "Mindegy") selected @endif>@lang('messages.any')</option>
                                                <option value="3 méternél alacsonyabb"
                                                        @if($inner_height == "3 méternél alacsonyabb") selected @endif>@lang('messages.less_then_3')
                                                </option>
                                                <option value="3 méter vagy magasabb"
                                                        @if($inner_height == "3 méter vagy magasabb") selected @endif>@lang('messages.3_or_higher')
                                                </option>
                                            </select>
                                        @else
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="inner_height" id="inner_height"
                                                aria-label="Default select example">
                                                <option selected>@lang('messages.any')</option>
                                                <option value="3 méternél alacsonyabb">@lang('messages.less_then_3')</option>
                                                <option value="3 méter vagy magasabb">@lang('messages.3_or_higher')</option>
                                            </select>
                                        @endif

                                    </div>

                                    <div class="col">
                                        <x-label for="air_conditioner">@lang('messages.air_conditioner')</x-label>
                                        @if(isset($air_conditioner))
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="air_conditioner" id="air_conditioner"
                                                aria-label="Default select example">
                                                <option @if($air_conditioner == "Mindegy") selected @endif>@lang('messages.any')
                                                </option>
                                                <option value="Van" @if($air_conditioner == "Vam") selected @endif>@lang('messages.there_is')
                                                </option>
                                            </select>
                                        @else
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="air_conditioner" id="air_conditioner"
                                                aria-label="Default select example">
                                                <option selected>@lang('messages.any')</option>
                                                <option value="Van">@lang('messages.there_is')</option>
                                            </select>
                                        @endif

                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                        <x-label for="accessible">@lang('messages.accessible')</x-label>
                                        @if(isset($accessible))
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="accessible" id="accessible" aria-label="Default select example">
                                                <option @if($accessible == "Mindegy") selected @endif>@lang('messages.any')</option>
                                                <option value="Igen" @if($accessible == "Igen") selected @endif>@lang('messages.there_is')
                                                </option>
                                            </select>
                                        @else
                                            <select
                                                class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                name="accessible" id="accessible" aria-label="Default select example">
                                                <option selected>@lang('messages.any')</option>
                                                <option value="Igen">@lang('messages.there_is')</option>
                                            </select>
                                        @endif

                                    </div>

                                    <div class="col mt-4">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#parking" aria-expanded="false"
                                                aria-controls="collapseExample">
                                            @lang('messages.parking')
                                        </button>
                                        <div class="collapse" id="parking">
                                            <div class="card card-body">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   value="Mindegy"
                                                                   name="mindegy_parking" id="mindegy_parking"
                                                                   onchange="Parking()">
                                                            <label class="form-check-label" for="mindegy_parking">
                                                                @lang('messages.any')
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if(isset($parking))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Udvari beálló"
                                                               name="parking[]" id="udvari_beálló"
                                                               @if(in_array("Udvari beálló", $parking)) checked @endif>
                                                        <label class="form-check-label" for="udvari_beálló">
                                                            @lang('messages.court_stand')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Garázs"
                                                               name="parking[]" id="garazs"
                                                               @if(in_array("Garázs", $parking)) checked @endif>
                                                        <label class="form-check-label" for="garazs">
                                                            @lang('messages.garage')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Önálló garázs"
                                                               name="parking[]" id="onallo_garazs"
                                                               @if(in_array("Önálló garázs", $parking)) checked @endif>
                                                        <label class="form-check-label" for="onallo_garazs">
                                                            @lang('messages.detached_garage')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Utca, közterület"
                                                               name="parking[]" id="utca"
                                                               @if(in_array("Utca, közterület", $parking)) checked @endif>
                                                        <label class="form-check-label" for="utca">
                                                            @lang('messages.street_public_space')
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Udvari beálló"
                                                               name="parking[]" id="udvari_beálló">
                                                        <label class="form-check-label" for="udvari_beálló">
                                                            @lang('messages.court_stand')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Garázs"
                                                               name="parking[]" id="garazs">
                                                        <label class="form-check-label" for="garazs">
                                                            @lang('messages.garage')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Önálló garázs"
                                                               name="parking[]" id="onallo_garazs">
                                                        <label class="form-check-label" for="onallo_garazs">
                                                            @lang('messages.detached_garage')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Utca, közterület"
                                                               name="parking[]" id="utca">
                                                        <label class="form-check-label" for="utca">
                                                            @lang('messages.street_public_space')
                                                        </label>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <script>
                                            function Parking() {
                                                var a = document.getElementsByName("parking[]");
                                                var b = document.getElementById("mindegy_parking");
                                                if (b.checked === true) {
                                                    for (var j = 0; j < a.length; j++) {
                                                        a[j].disabled = true;
                                                    }
                                                }
                                                if (b.checked === false) {
                                                    for (var j = 0; j < a.length; j++) {
                                                        a[j].disabled = false;
                                                    }
                                                }
                                            }
                                        </script>
                                    </div>

                                    <div class="col mt-4">
                                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#heating" aria-expanded="false"
                                                aria-controls="collapseExample">
                                            @lang('messages.heating')
                                        </button>
                                        <div class="collapse" id="heating">
                                            <div class="card card-body">
                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                   value="Mindegy"
                                                                   name="mindegy_heating" id="mindegy_heating"
                                                                   onchange="Heating()">
                                                            <label class="form-check-label" for="mindegy_heating">
                                                                @lang('messages.any')
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                @if(isset($heating))
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Gáz (konvektor)"
                                                               name="heating[]" id="gaz"
                                                               @if(in_array("Gáz (konvektor)", $heating)) checked @endif>
                                                        <label class="form-check-label" for="gaz">
                                                            @lang('messages.gas_convector')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Házközponti"
                                                               name="heating[]" id="hazkozponti"
                                                               @if(in_array("Házközponti", $heating)) checked @endif>
                                                        <label class="form-check-label" for="hazkozponti">
                                                            @lang('messages.central_heating')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Távfűtés"
                                                               name="heating[]" id="tavfutes"
                                                               @if(in_array("Távfűtés", $heating)) checked @endif>
                                                        <label class="form-check-label" for="tavfutes">
                                                            @lang('messages.district_heating')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Elektromos konvektor"
                                                               name="heating[]" id="elektromos_konvektor"
                                                               @if(in_array("Elektromos konvektor", $heating)) checked @endif>
                                                        <label class="form-check-label" for="elektromos_konvektor">
                                                            @lang('messages.electric_convector')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Elektromos fűtőpanel"
                                                               name="heating[]" id="elektromos_futopanel"
                                                               @if(in_array("Elektromos fűtőpanel", $heating)) checked @endif>
                                                        <label class="form-check-label" for="elektromos_futopanel">
                                                            @lang('messages.electric_heating_panel')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Légkondicionáló"
                                                               name="heating[]" id="klima"
                                                               @if(in_array("Légkondicionáló", $heating)) checked @endif>
                                                        <label class="form-check-label" for="klima">
                                                            @lang('messages.air_conditioner')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Kandalló"
                                                               name="heating[]" id="kandallo"
                                                               @if(in_array("Kandalló", $heating)) checked @endif>
                                                        <label class="form-check-label" for="kandallo">
                                                            @lang('messages.fireplace')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Kályha"
                                                               name="heating[]" id="kalyha"
                                                               @if(in_array("Kályha", $heating)) checked @endif>
                                                        <label class="form-check-label" for="kalyha">
                                                            @lang('messages.stove')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Cserépkájha"
                                                               name="heating[]" id="cserepkalyha"
                                                               @if(in_array("Cserépkájha", $heating)) checked @endif>
                                                        <label class="form-check-label" for="cserepkalyha">
                                                            @lang('messages.tile_stove')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Padlófűtés"
                                                               name="heating[]" id="padlofutes"
                                                               @if(in_array("Padlófűtés", $heating)) checked @endif>
                                                        <label class="form-check-label" for="padlofutes">
                                                            @lang('messages.floor_heating')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Falfűtés"
                                                               name="heating[]" id="falfutes"
                                                               @if(in_array("Falfűtés", $heating)) checked @endif>
                                                        <label class="form-check-label" for="falfutes">
                                                            @lang('messages.wall_heating')
                                                        </label>
                                                    </div>
                                                @else
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Gáz (konvektor)"
                                                               name="heating[]" id="gaz">
                                                        <label class="form-check-label" for="gaz">
                                                            @lang('messages.gas_convector')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Házközponti"
                                                               name="heating[]" id="hazkozponti">
                                                        <label class="form-check-label" for="hazkozponti">
                                                            @lang('messages.central_heating')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Távfűtés"
                                                               name="heating[]" id="tavfutes">
                                                        <label class="form-check-label" for="tavfutes">
                                                            @lang('messages.district_heating')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Elektromos konvektor"
                                                               name="heating[]" id="elektromos_konvektor">
                                                        <label class="form-check-label" for="elektromos_konvektor">
                                                            @lang('messages.electric_convector')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Elektromos fűtőpanel"
                                                               name="heating[]" id="elektromos_futopanel">
                                                        <label class="form-check-label" for="elektromos_futopanel">
                                                            @lang('messages.electric_heating_panel')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Légkondicionáló"
                                                               name="heating[]" id="klima">
                                                        <label class="form-check-label" for="klima">
                                                            @lang('messages.air_conditioner')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Kandalló"
                                                               name="heating[]" id="kandallo">
                                                        <label class="form-check-label" for="kandallo">
                                                            @lang('messages.fireplace')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Kályha"
                                                               name="heating[]" id="kalyha">
                                                        <label class="form-check-label" for="kalyha">
                                                            @lang('messages.stove')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Cserépkájha"
                                                               name="heating[]" id="cserepkalyha">
                                                        <label class="form-check-label" for="cserepkalyha">
                                                            @lang('messages.tile_stove')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               value="Padlófűtés"
                                                               name="heating[]" id="padlofutes">
                                                        <label class="form-check-label" for="padlofutes">
                                                            @lang('messages.floor_heating')
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="Falfűtés"
                                                               name="heating[]" id="falfutes">
                                                        <label class="form-check-label" for="falfutes">
                                                            @lang('messages.wall_heating')
                                                        </label>
                                                    </div>
                                                @endif
                                                <script>
                                                    function Heating() {
                                                        var a = document.getElementsByName("heating[]");
                                                        var b = document.getElementById("mindegy_heating");
                                                        if (b.checked === true) {
                                                            for (var j = 0; j < a.length; j++) {
                                                                a[j].disabled = true;
                                                            }
                                                        }
                                                        if (b.checked === false) {
                                                            for (var j = 0; j < a.length; j++) {
                                                                a[j].disabled = false;
                                                            }
                                                        }
                                                    }
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4 d-flex justify-content-center">
                                    <button class="btn btn-outline-primary width-33">@lang('messages.search')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            @if(count($properties)<1)
                <p>NINCS TALÁLAT</p>
            @endif

            @foreach($properties as $property)
                @if(!$property->sold && !$property->auction)
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
                                        <button class="star"><i class="fa-solid fa-star fa-xl"
                                                                style="color: #f8c920;"></i>
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
                                <a href="properties/{{$property->id}}" class="btn btn-primary">@lang('messages.details')</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-layout>
