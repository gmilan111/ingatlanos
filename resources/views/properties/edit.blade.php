<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <x-validation-errors class="mb-4"/>

        <form method="POST" action="/properties/{{$item->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mt-2">
                <div class="col">
                    <x-label for="settlement" value="{{ __('Település neve: ') }}"/>
                    <x-input id="settlement" class="block mt-1 w-full" type="text" name="settlement"
                             :value="old('settlement')" value="{{$item->settlement}}" required autofocus
                             autocomplete="settlement "/>
                </div>
                <div class="col">
                    <x-label for="state" value="{{ __('Vármegye: ') }}"/>
                    {{--<x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" value="{{$item->state}}" required autocomplete="state" />--}}
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="state" id="state" aria-label="Default select example">
                        <option value="Győr-Moson-Sopron" @if($item->state == "Győr-Moson-Sopron") selected @endif>
                            Győr-Moson-Sopron
                        </option>
                        <option value="Vas" @if($item->state == "Vas") selected @endif>Vas</option>
                        <option value="Zala" @if($item->state == "Zala") selected @endif>Zala</option>
                        <option value="Komárom-Esztergom" @if($item->state == "Komárom-Esztergom") selected @endif>
                            Komárom-Esztergom
                        </option>
                        <option value="Veszprém" @if($item->state == "Veszprém") selected @endif>Veszprém</option>
                        <option value="Somogy" @if($item->state == "Somogy") selected @endif>Somogy</option>
                        <option value="Fejér" @if($item->state == "Fejér") selected @endif>Fejér</option>
                        <option value="Tolna" @if($item->state == "Tolna") selected @endif>Tolna</option>
                        <option value="Baranya" @if($item->state == "Baranya") selected @endif>Baranya</option>
                        <option value="Pest" @if($item->state == "Pest") selected @endif>Pest</option>
                        <option value="Bács-Kiskun" @if($item->state == "Bács-Kiskun") selected @endif>Bács-Kiskun
                        </option>
                        <option value="Nógrád" @if($item->state == "Nógrád") selected @endif>Nógrád</option>
                        <option value="Heves" @if($item->state == "Heves") selected @endif>Heves</option>
                        <option value="Jász-Nagykun-Szolnok"
                                @if($item->state == "Jász-Nagykun-Szolnok") selected @endif>Jász-Nagykun-Szolnok
                        </option>
                        <option value="Csongrád-Csanád" @if($item->state == "Csongrád-Csanád") selected @endif>
                            Csongrád-Csanád
                        </option>
                        <option value="Borsod-Abaúj-Zemplén"
                                @if($item->state == "Borsod-Abaúj-Zemplén") selected @endif>Borsod-Abaúj-Zemplén
                        </option>
                        <option value="Szabolcs-Szatmár-Bereg"
                                @if($item->state == "Szabolcs-Szatmár-Bereg") selected @endif>Szabolcs-Szatmár-Bereg
                        </option>
                        <option value="Hajdú-Bihar" @if($item->state == "Hajdú-Bihar") selected @endif>Hajdú-Bihar
                        </option>
                        <option value="Békés" @if($item->state == "Békés") selected @endif>Békés</option>
                    </select>
                </div>
                <div class="col">
                    <x-label for="address" value="{{ __('Utca, házszám: ') }}"/>
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                             value="{{$item->address}}" required autocomplete="address"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="district" value="{{ __('Kerület/Irányítószám: (Opcionális)') }}"/>
                    <x-input id="district" class="block mt-1 w-full" type="text" name="district"
                             :value="old('district')" value="{{$item->district}}" autocomplete="district"/>
                </div>

                <div class="col">
                    <x-label for="size" value="{{ __('Méret: ') }}"/>
                    <x-input id="size" class="block mt-1 w-full" type="number" name="size" :value="old('size')"
                             value="{{$item->size}}" required autocomplete="size"/>
                </div>

                <div class="col">
                    <x-label for="rooms" value="{{ __('Szobaszám: ') }}"/>
                    <x-input id="rooms" class="block mt-1 w-full" type="number" name="rooms" :value="old('rooms')"
                             value="{{$item->rooms}}" required autocomplete="rooms"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="bathrooms" value="{{ __('Fürdőszobák száma: ') }}"/>
                    <x-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms"
                             :value="old('bathrooms')" value="{{$item->bathrooms}}" required autocomplete="bathrooms"/>
                </div>
                <div class="col">
                    <x-label for="price" value="{{ __('Ár: ') }}"/>
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')"
                             value="{{$item->price}}" required autocomplete="price"/>
                </div>
                <div class="col">
                    <x-label for="condition" value="{{ __('Ingatlan állapota: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="condition" id="condition" aria-label="Default select example">
                        <option value="Új építésű" @if($item->condition == "Új építésű") selected @endif>Új építésű
                        </option>
                        <option value="Újszerű" @if($item->condition == "Újszerű") selected @endif>Újszerű</option>
                        <option value="Felújított" @if($item->condition == "Felújított") selected @endif>Felújított
                        </option>
                        <option value="Jó állapotú" @if($item->condition == "Jó állapotú") selected @endif>Jó állapotú
                        </option>
                        <option value="Közepes állapotú" @if($item->condition == "Közepes állapotú") selected @endif>
                            Közepes állapotú
                        </option>
                        <option value="Felújítandó" @if($item->condition == "Felújítandó") selected @endif>Felújítandó
                        </option>
                        <option value="Befejezetlen" @if($item->condition == "Befejezetlen") selected @endif>
                            Befejezetlen
                        </option>
                    </select>

                    {{--<x-input id="condition" class="block mt-1 w-full" type="text" name="condition" :value="old('condition')" value="{{$item->condition}}" autocomplete="condition" />--}}
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="year_construction" value="{{ __('Építés éve: ') }}"/>
                    <x-input id="year_construction" class="block mt-1 w-full" type="text" name="year_construction"
                             :value="old('year_construction')" value="{{$item->year_construction}}"
                             autocomplete="year_construction"/>
                </div>

                <div class="col">
                    <x-label for="floor" value="{{ __('Emelet: ') }}"/>
                    <x-input id="floor" class="block mt-1 w-full" type="number" name="floor" :value="old('floor')"
                             value="{{$item->floor}}" autocomplete="floor"/>
                </div>

                <div class="col">
                    <x-label for="building_levels" value="{{ __('Épület szintjei: ') }}"/>
                    <x-input id="building_levels" class="block mt-1 w-full" type="number" name="building_levels"
                             :value="old('building_levels')" value="{{$item->building_levels}}"
                             autocomplete="building_levels"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="lift" value="{{ __('Lift: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="lift" id="lift" aria-label="Default select example">
                        <option value="Nincs kiválasztva" @if($item->lift == "Nincs kiválasztva") selected @endif>Nincs
                            kiválasztva
                        </option>
                        <option value="Van" @if($item->lift == "Van") selected @endif>Van</option>
                        <option value="Nincs" @if($item->lift == "Nincs") selected @endif>Nincs</option>
                    </select>
                </div>

                <div class="col">
                    <x-label for="inner_height" value="{{ __('Belmagasság: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="inner_height" id="inner_height" aria-label="Default select example">
                        <option value="3 méternél alacsonyabb"
                                @if($item->inner_height == "3 méternél alacsonyabb") selected @endif>3 méternél
                            alacsonyabb
                        </option>
                        <option value="3 méter vagy magasabb"
                                @if($item->inner_height == "3 méter vagy magasabb") selected @endif>3 méter vagy
                            magasabb
                        </option>
                    </select>
                    {{--<x-input id="inner_height" class="block mt-1 w-full" type="number" name="inner_height" :value="old('inner_height')" value="{{$item->inner_height}}" autocomplete="inner_height" />--}}
                </div>

                <div class="col">
                    <x-label for="air_conditioner" value="{{ __('Légkondícionáló: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="air_conditioner" id="air_conditioner" aria-label="Default select example">
                        <option value="Nincs kiválasztva"
                                @if($item->air_conditioner == "Nincs kiválasztva") selected @endif>Nincs kiválasztva
                        </option>
                        <option value="Van" @if($item->air_conditioner == "Van") selected @endif>Van</option>
                        <option value="Nincs" @if($item->air_conditioner == "Nincs") selected @endif>Nincs</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="accessible" value="{{ __('Akadálymentesített: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="accessible" id="accessible" aria-label="Default select example">
                        <option value="Nincs kiválasztva" @if($item->accessible == "Nincs kiválasztva") selected @endif>
                            Nincs kiválasztva
                        </option>
                        <option value="Igen" @if($item->accessible == "Igen") selected @endif>Igen</option>
                        <option value="Nem" @if($item->accessible == "Nem") selected @endif>Nem</option>
                    </select>
                </div>

                <div class="col">
                    <x-label for="attic" value="{{ __('Tetőtér: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="attic" id="attic" aria-label="Default select example">
                        <option value="Tetőréri" @if($item->attic == "Tetőtéri") selected @endif>Tetőréri</option>
                        <option value="Nem tetőtéri" @if($item->attic == "Nem tetőtéri") selected @endif>Nem tetőtéri
                        </option>
                        <option value="Legfelső emelet, nem tetőtéri"
                                @if($item->attic == "Legfelső emelet, nem tetőtéri") selected @endif>Legfelső emelet,
                            nem tetőtéri
                        </option>
                    </select>
                    {{--<x-input id="attic" class="block mt-1 w-full" type="text" name="attic" :value="old('attic')" value="{{$item->attic}}" autocomplete="attic" />--}}
                </div>

                <div class="col">
                    <x-label for="balcony" value="{{ __('Erkély mérete: ') }}"/>
                    <x-input id="balcony" class="block mt-1 w-full" type="number" name="balcony" :value="old('balcony')"
                             value="{{$item->balcony}}"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="parking" value="{{ __('Parkolás: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="parking" id="parking" aria-label="Default select example">
                        <option value="Udvari beálló" @if($item->parking == "Udvari beálló") selected @endif>Udvari
                            beálló
                        </option>
                        <option value="Garázs" @if($item->parking == "Garázs") selected @endif>Garázs</option>
                        <option value="Önálló garázs" @if($item->parking == "Önálló garázs") selected @endif>Önálló
                            garázs
                        </option>
                        <option value="Utca, közterület" @if($item->parking == "Utca, közterüle") selected @endif>Utca,
                            közterület
                        </option>
                    </select>
                    {{--<x-input id="parking" class="block mt-1 w-full" type="text" name="parking" :value="old('parking')" value="{{$item->parking}}"/>--}}
                </div>

                <div class="col">
                    <x-label for="parking_price" value="{{ __('Parkolóhely ára: ') }}"/>
                    <x-input id="parking_price" class="block mt-1 w-full" type="number" name="parking_price"
                             :value="old('parking_price')" value="{{$item->parking_price}}"
                             autocomplete="parking_price"/>
                </div>

                <div class="col">
                    <x-label for="avg_gas" value="{{ __('Átlag gázfogyasztás: ') }}"/>
                    <x-input id="avg_gas" class="block mt-1 w-full" type="number" name="avg_gas" :value="old('avg_gas')"
                             value="{{$item->avg_gas}}" autocomplete="avg_gas"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="avg_electricity" value="{{ __('Átlag áramfogyasztás: ') }}"/>
                    <x-input id="avg_electricity" class="block mt-1 w-full" type="number" name="avg_electricity"
                             :value="old('avg_electricity')" value="{{$item->avg_electricity}}"/>
                </div>

                <div class="col">
                    <x-label for="overhead_cost" value="{{ __('Rezsiköltség: ') }}"/>
                    <x-input id="overhead_cost" class="block mt-1 w-full" type="number" name="overhead_cost"
                             :value="old('overhead_cost')" value="{{$item->overhead_cost}}"
                             autocomplete="overhead_cost"/>
                </div>

                <div class="col">
                    <x-label for="common_cost" value="{{ __('Közös költség: ') }}"/>
                    <x-input id="common_cost" class="block mt-1 w-full" type="number" name="common_cost"
                             :value="old('common_cost')" value="{{$item->common_cost}}" autocomplete="common_cost"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="heating" value="{{ __('Fűtés: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="heating" id="heating" aria-label="Default select example">
                        <option value="Gáz (konvektor)" @if($item->heating == "Gáz (konvektor)") selected @endif>Gáz
                            (konvektor)
                        </option>
                        <option value="Házközponti" @if($item->heating == "Házközponti") selected @endif>Házközponti
                        </option>
                        <option value="Távfűtés" @if($item->heating == "Távfűtés") selected @endif>Távfűtés</option>
                        <option value="Elektromos konvektor"
                                @if($item->heating == "Elektromos konvektor") selected @endif>Elektromos konvektor
                        </option>
                        <option value="Elektromos fűtőpanel"
                                @if($item->heating == "Elektromos fűtőpanel") selected @endif>Elektromos fűtőpanel
                        </option>
                        <option value="Klíma" @if($item->heating == "Klíma") selected @endif>Klíma</option>
                        <option value="Kandalló" @if($item->heating == "Kandalló") selected @endif>Kandalló</option>
                        <option value="Kályha" @if($item->heating == "Kályha") selected @endif>Kályha</option>
                        <option value="Cserépkájha" @if($item->heating == "Cserépkájha") selected @endif>Cserépkájha
                        </option>
                        <option value="Padlófűtés" @if($item->heating == "Padlófűtés") selected @endif>Padlófűtés
                        </option>
                        <option value="Falfűtés" @if($item->heating == "Falfűtés") selected @endif>Falfűtés</option>
                    </select>
                    {{--<x-input id="heating" class="block mt-1 w-full" type="text" name="heating" :value="old('heating')" value="{{$item->heating}}"/>--}}
                </div>

                <div class="col">
                    <x-label for="insulation" value="{{ __('Szigetelés: ') }}"/>
                    <x-input id="insulation" class="block mt-1 w-full" type="text" name="insulation"
                             :value="old('insulation')" value="{{$item->insulation}}" autocomplete="insulation"/>
                </div>

                <div class="col">
                    <x-label for="type" value="{{ __('Típus: ') }}"/>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="type" id="type" aria-label="Default select example">
                        <option @if($item->type == "Nincs kiválasztva") selected @endif>Nincs kiválasztva</option>
                        <option value="Tégla lakás" @if($item->type == "Tégla lakás") selected @endif>Tégla lakás
                        </option>
                        <option value="Panel lakás" @if($item->type == "Panel lakás") selected @endif>Panel lakás
                        </option>
                    </select>
                </div>
            </div>

            @if($item->sale_rent == "rent")

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="furniture" value="{{ __('Bútorozott-e: ') }}"/>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="furniture" id="furniture" aria-label="Default select example">
                            <option @if($item->furniture == "Nincs kiválasztva") selected @endif>Nincs kiválasztva</option>
                            <option value="Igen" @if($item->furniture == "Igen") selected @endif>Igen</option>
                            <option value="Nem" @if($item->furniture == "Nem") selected @endif>Nem</option>
                        </select>
                        {{--<x-input id="heating" class="block mt-1 w-full" type="text" name="heating" :value="old('heating')" value="{{$item->heating}}"/>--}}
                    </div>

                    <div class="col">
                        <x-label for="smoking" value="{{ __('Dohányzás engelyézett-e: ') }}"/>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="smoking" id="smoking" aria-label="Default select example">
                            <option @if($item->smoking == "Nincs kiválasztva") selected @endif>Nincs kiválasztva</option>
                            <option value="Igen" @if($item->smoking == "Igen") selected @endif>Igen</option>
                            <option value="Nem" @if($item->smoking == "Nem") selected @endif>Nem</option>
                        </select>
                    </div>

                    <div class="col">
                        <x-label for="animal" value="{{ __('Kisállat hozható-e: ') }}"/>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="animal" id="animal" aria-label="Default select example">
                            <option @if($item->animal == "Nincs kiválasztva") selected @endif>Nincs kiválasztva</option>
                            <option value="Igen" @if($item->animal == "Igen") selected @endif>Igen</option>
                            <option value="Nem" @if($item->animal == "Nem") selected @endif>Nem</option>
                        </select>
                    </div>
                </div>
            @endif

            <div class="row mt-4">
                <div class="col">
                    <x-label for="descrpition" value="{{__('Leírás: ')}}"/>
                    <textarea class="block mt-1 w-full rounded border-gray-300" id="descrpition" name="description"
                              required>{{$item->description}}</textarea>
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
