<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mt-2">
                <div class="col">
                    <x-label for="settlement" value="{{ __('Település neve: ') }}" />
                    <x-input id="settlement" class="block mt-1 w-full" type="text" name="settlement" :value="old('settlement')" required autofocus autocomplete="settlement " />
                </div>
                <div class="col">
                    <x-label for="state" value="{{ __('Vármegye: ') }}" />
                    {{--<x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required autocomplete="state" />--}}
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="condition" id="condition" aria-label="Default select example">
                        <option selected value="1">Győr-Moson-Sopron</option>
                        <option value="2">Vas</option>
                        <option value="3">Zala</option>
                        <option value="4">Komárom-Esztergom</option>
                        <option value="5">Veszprém</option>
                        <option value="6">Somogy</option>
                        <option value="7">Fejér</option>
                        <option value="8">Tolna</option>
                        <option value="9">Baranya</option>
                        <option value="10">Pest</option>
                        <option value="11">Bács-Kiskun</option>
                        <option value="12">Nógrád</option>
                        <option value="13">Heves</option>
                        <option value="14">Jász-Nagykun-Szolnok</option>
                        <option value="15">Csongrád-Csanád</option>
                        <option value="16">Borsod-Abaúj-Zemplén</option>
                        <option value="17">Szabolcs-Szatmár-Bereg</option>
                        <option value="18">Hajdú-Bihar</option>
                        <option value="19">Békés</option>
                    </select>
                </div>
                <div class="col">
                    <x-label for="address" value="{{ __('Utca, házszám: ') }}" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="district" value="{{ __('Kerület/Irányítószám: (Opcionális)') }}" />
                    <x-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')" autocomplete="district" />
                </div>

                <div class="col">
                    <x-label for="size" value="{{ __('Méret: ') }}" />
                    <x-input id="size" class="block mt-1 w-full" type="number" name="size" :value="old('size')" required autocomplete="size" />
                </div>

                <div class="col">
                    <x-label for="rooms" value="{{ __('Szobaszám: ') }}" />
                    <x-input id="rooms" class="block mt-1 w-full" type="number" name="rooms" :value="old('rooms')" required autocomplete="rooms" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="bathrooms" value="{{ __('Fürdőszobák száma: ') }}" />
                    <x-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms" :value="old('bathrooms')" required autocomplete="bathrooms" />
                </div>

                <div class="col">
                    <x-label for="price" value="{{ __('Ár: ') }}" />
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autocomplete="price" />
                </div>

                <div class="col">
                    <x-label for="condition" value="{{ __('Ingatlan állapota: ') }}" />
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="condition" id="condition" aria-label="Default select example">
                        <option selected>Nincs kiválasztva</option>
                        <option value="1">Új építésű</option>
                        <option value="2">Újszerű</option>
                        <option value="3">Felújított</option>
                        <option value="4">Jó állapotú</option>
                        <option value="5">Közepes állapotú</option>
                        <option value="6">Felújítandó</option>
                        <option value="7">Befejezetlen</option>
                    </select>
                    {{--<x-input id="condition" class="block mt-1 w-full" type="text" name="condition" :value="old('condition')" autocomplete="condition" />--}}
                </div>

            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="year_construction" value="{{ __('Építés éve: ') }}" />
                    <x-input id="year_construction" class="block mt-1 w-full" type="text" name="year_construction" :value="old('year_construction')" autocomplete="year_construction" />
                </div>

                <div class="col">
                    <x-label for="floor" value="{{ __('Emelet: ') }}" />
                    <x-input id="floor" class="block mt-1 w-full" type="number" name="floor" :value="old('floor')" autocomplete="floor" />
                </div>

                <div class="col">
                    <x-label for="building_levels" value="{{ __('Épület szintjei: ') }}" />
                    <x-input id="building_levels" class="block mt-1 w-full" type="number" name="building_levels" :value="old('building_levels')" autocomplete="building_levels" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="lift" value="{{ __('Lift: ') }}" />
                    <select class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="lift" id="lift" aria-label="Default select example">
                        <option selected value="0">Nincs kiválasztva</option>
                        <option value="1">Van</option>
                        <option value="2">Nincs</option>
                    </select>
                </div>

                <div class="col">
                    <x-label for="inner_height" value="{{ __('Belmagasság: ') }}" />
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="inner_height" id="inner_height" aria-label="Default select example">
                        <option selected>Nincs kiválasztva</option>
                        <option value="1">3 méternél alacsonyabb</option>
                        <option value="2">3 méter vagy magasabb</option>
                    </select>
                    {{--<x-input id="inner_height" class="block mt-1 w-full" type="number" name="inner_height" :value="old('inner_height')" autocomplete="inner_height" />--}}
                </div>

                <div class="col">
                    <x-label for="air_conditioner" value="{{ __('Légkondícionáló: ') }}" />
                    <select class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="air_conditioner" id="air_conditioner" aria-label="Default select example">
                        <option selected value="0">Nincs kiválasztva</option>
                        <option value="1">Van</option>
                        <option value="2">Nincs</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="accessible" value="{{ __('Akadálymentesített: ') }}" />
                    <select class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="accessible" id="accessible" aria-label="Default select example">
                        <option selected value="0">Nincs kiválasztva</option>
                        <option value="1">Igen</option>
                        <option value="2">Nem</option>
                    </select>
                </div>

                <div class="col">
                    <x-label for="attic" value="{{ __('Tetőtér: ') }}" />
                    <select class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="attic" id="attic" aria-label="Default select example">
                        <option selected>Nincs kiválasztva</option>
                        <option value="1">Tetőréri</option>
                        <option value="2">Nem tetőtéri</option>
                        <option value="3">Legfelső emelet, nem tetőtéri</option>
                    </select>
                    {{--<x-input id="attic" class="block mt-1 w-full" type="text" name="attic" :value="old('attic')" autocomplete="attic" />--}}
                </div>

                <div class="col">
                    <x-label for="balcony" value="{{ __('Erkély mérete: ') }}" />
                    <x-input id="balcony" class="block mt-1 w-full" type="number" name="balcony" :value="old('balcony')"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="parking" value="{{ __('Parkolás: ') }}" />
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="parking" id="parking" aria-label="Default select example">
                        <option selected>Nincs kiválasztva</option>
                        <option value="1">Udvari beálló</option>
                        <option value="2">Garázs</option>
                        <option value="3">Önálló garázs</option>
                        <option value="4">Utca, közterület</option>
                    </select>
                    {{--<x-input id="parking" class="block mt-1 w-full" type="text" name="parking" :value="old('parking')"/>--}}
                </div>

                <div class="col">
                    <x-label for="parking_price" value="{{ __('Parkolóhely ára: ') }}" />
                    <x-input id="parking_price" class="block mt-1 w-full" type="number" name="parking_price" :value="old('parking_price')" autocomplete="parking_price" />
                </div>

                <div class="col">
                    <x-label for="avg_gas" value="{{ __('Átlag gázfogyasztás: ') }}" />
                    <x-input id="avg_gas" class="block mt-1 w-full" type="number" name="avg_gas" :value="old('avg_gas')" autocomplete="avg_gas" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="avg_electricity" value="{{ __('Átlag áramfogyasztás: ') }}" />
                    <x-input id="avg_electricity" class="block mt-1 w-full" type="number" name="avg_electricity" :value="old('avg_electricity')"/>
                </div>

                <div class="col">
                    <x-label for="overhead_cost" value="{{ __('Rezsiköltség: ') }}" />
                    <x-input id="overhead_cost" class="block mt-1 w-full" type="number" name="overhead_cost" :value="old('overhead_cost')" autocomplete="overhead_cost" />
                </div>

                <div class="col">
                    <x-label for="common_cost" value="{{ __('Közös költség: ') }}" />
                    <x-input id="common_cost" class="block mt-1 w-full" type="number" name="common_cost" :value="old('common_cost')" autocomplete="common_cost" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="heating" value="{{ __('Fűtés: ') }}" />
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="heating" id="heating" aria-label="Default select example">
                        <option selected>Nincs kiválasztva</option>
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
                    </select>
                    {{--<x-input id="heating" class="block mt-1 w-full" type="text" name="heating" :value="old('heating')"/>--}}
                </div>

                <div class="col">
                    <x-label for="insulation" value="{{ __('Szigetelés: ') }}" />
                    <x-input id="insulation" class="block mt-1 w-full" type="text" name="insulation" :value="old('insulation')" autocomplete="insulation" />
                </div>

                <div class="col">
                    <x-label for="type" value="{{ __('Típus: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="type" id="type" aria-label="Default select example">
                        <option selected>Nincs kiválasztva</option>
                        <option value="1">Tégla lakás</option>
                        <option value="2">Panel lakás</option>
                    </select>
                </div>
            </div>

            {{--<div class="row mt-4">


                <div class="col">
                    <x-label for="price" value="{{ __('Ár: ') }}" />
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autocomplete="price" />
                </div>


            </div>--}}

            <div class="row mt-4">
                {{--<div class="col">
                    <x-label for="price" value="{{ __('Ár: ') }}" />
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autocomplete="price" />
                </div>--}}

                <div class="col">
                    <x-label for="formFiles" value="{{__('Fő kép')}}" />
                    <x-input class="form-control block mt-2 w-full" type="file" id="main_img" name="main_img"/>
                </div>

                <div class="col">
                    <x-label for="formFiles" value="{{__('Képek')}}" />
                    <x-input class="form-control block mt-2 w-full" type="file" id="formFile" name="images[]" multiple/>
                </div>

            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="descrpition" value="{{__('Leírás: ')}}"/>
                    <textarea class="block mt-1 w-full rounded border-gray-300" id="descrpition" name="description" required ></textarea>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Közzététel') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
