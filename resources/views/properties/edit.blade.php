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
                    <x-label for="settlement">@lang('messages.settlement')</x-label>
                    <x-input id="settlement" class="block mt-1 w-full" type="text" name="settlement"
                             :value="old('settlement')" value="{{$item->settlement}}" required autofocus
                             autocomplete="settlement "/>
                </div>
                <div class="col">
                    <x-label for="state">@lang('messages.county')</x-label>
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
                    <x-label for="address">@lang('messages.address')</x-label>
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                             value="{{$item->address}}" required autocomplete="address"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="district">@lang('messages.district')</x-label>
                    <x-input id="district" class="block mt-1 w-full" type="text" name="district"
                             :value="old('district')" value="{{$item->district}}" autocomplete="district"/>
                </div>

                <div class="col">
                    <x-label for="size">@lang('messages.size')</x-label>
                    <x-input id="size" class="block mt-1 w-full" type="number" name="size" :value="old('size')"
                             value="{{$item->size}}" required autocomplete="size"/>
                </div>

                <div class="col">
                    <x-label for="rooms">@lang('messages.rooms')</x-label>
                    <x-input id="rooms" class="block mt-1 w-full" type="number" name="rooms" :value="old('rooms')"
                             value="{{$item->rooms}}" required autocomplete="rooms"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="bathrooms">@lang('messages.bathrooms')</x-label>
                    <x-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms"
                             :value="old('bathrooms')" value="{{$item->bathrooms}}" required autocomplete="bathrooms"/>
                </div>
                <div class="col">
                    <x-label for="price">@lang('messages.price')</x-label>
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')"
                             value="{{$item->price}}" required autocomplete="price"/>
                </div>
                <div class="col">
                    <x-label for="condition">@lang('messages.condition')</x-label>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="condition" id="condition" aria-label="Default select example">
                        <option value="Új építésű" @if($item->condition == "Új építésű") selected @endif>@lang('messages.newly_built')
                        </option>
                        <option value="Újszerű" @if($item->condition == "Újszerű") selected @endif>@lang('messages.novel')</option>
                        <option value="Felújított" @if($item->condition == "Felújított") selected @endif>@lang('messages.renovated')
                        </option>
                        <option value="Jó állapotú" @if($item->condition == "Jó állapotú") selected @endif>@lang('messages.in_good_condition')
                        </option>
                        <option value="Közepes állapotú" @if($item->condition == "Közepes állapotú") selected @endif>
                            @lang('messages.in_medium_condition')
                        </option>
                        <option value="Felújítandó" @if($item->condition == "Felújítandó") selected @endif>@lang('messages.to_be_renovated')
                        </option>
                        <option value="Befejezetlen" @if($item->condition == "Befejezetlen") selected @endif>
                            @lang('messages.unfinished')
                        </option>
                    </select>

                    {{--<x-input id="condition" class="block mt-1 w-full" type="text" name="condition" :value="old('condition')" value="{{$item->condition}}" autocomplete="condition" />--}}
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="year_construction">@lang('messages.year_construction')</x-label>
                    <x-input id="year_construction" class="block mt-1 w-full" type="text" name="year_construction"
                             :value="old('year_construction')" value="{{$item->year_construction}}"
                             autocomplete="year_construction"/>
                </div>

                <div class="col">
                    <x-label for="floor">@lang('messages.floor')</x-label>
                    <x-input id="floor" class="block mt-1 w-full" type="number" name="floor" :value="old('floor')"
                             value="{{$item->floor}}" autocomplete="floor"/>
                </div>

                <div class="col">
                    <x-label for="building_levels">@lang('messages.building_levels')</x-label>
                    <x-input id="building_levels" class="block mt-1 w-full" type="number" name="building_levels"
                             :value="old('building_levels')" value="{{$item->building_levels}}"
                             autocomplete="building_levels"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="lift">@lang('messages.lift')</x-label>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="lift" id="lift" aria-label="Default select example">
                        <option value="Nincs kiválasztva" @if($item->lift == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                        <option value="Van" @if($item->lift == "Van") selected @endif>@lang('messages.there_is')</option>
                        <option value="Nincs" @if($item->lift == "Nincs") selected @endif>@lang('messages.there_is_not')</option>

                    </select>
                </div>

                <div class="col">
                    <x-label for="inner_height">@lang('messages.inner_height')</x-label>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="inner_height" id="inner_height" aria-label="Default select example">
                        <option value="3 méternél alacsonyabb"
                                @if($item->inner_height == "3 méternél alacsonyabb") selected @endif>@lang('messages.less_then_3')
                        </option>
                        <option value="3 méter vagy magasabb"
                                @if($item->inner_height == "3 méter vagy magasabb") selected @endif>@lang('messages.3_or_higher')
                        </option>
                    </select>
                    {{--<x-input id="inner_height" class="block mt-1 w-full" type="number" name="inner_height" :value="old('inner_height')" value="{{$item->inner_height}}" autocomplete="inner_height" />--}}
                </div>

                <div class="col">
                    <x-label for="air_conditioner">@lang('messages.air_conditioner')</x-label>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="air_conditioner" id="air_conditioner" aria-label="Default select example">
                        <option value="Nincs kiválasztva"
                                @if($item->air_conditioner == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')
                        </option>
                        <option value="Van" @if($item->lift == "Van") selected @endif>@lang('messages.there_is')</option>
                        <option value="Nincs" @if($item->lift == "Nincs") selected @endif>@lang('messages.there_is_not')</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="accessible">@lang('messages.accessible')</x-label>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="accessible" id="accessible" aria-label="Default select example">
                        <option value="Nincs kiválasztva" @if($item->accessible == "Nincs kiválasztva") selected @endif>
                            @lang('messages.not_selected')
                        </option>
                        <option value="Igen" @if($item->accessible == "Igen") selected @endif>@lang('messages.yes')</option>
                        <option value="Nem" @if($item->accessible == "Nem") selected @endif>@lang('messages.no')</option>
                    </select>
                </div>

                <div class="col">
                    <x-label for="attic">@lang('messages.attic')</x-label>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="attic" id="attic" aria-label="Default select example">
                        <option value="Tetőréri" @if($item->attic == "Tetőtéri") selected @endif>@lang('messages.atticish')</option>
                        <option value="Nem tetőtéri" @if($item->attic == "Nem tetőtéri") selected @endif>@lang('messages.not_a_loft')
                        </option>
                        <option value="Legfelső emelet, nem tetőtéri"
                                @if($item->attic == "Legfelső emelet, nem tetőtéri") selected @endif>@lang('messages.top-floor_not_attic')
                        </option>
                    </select>
                </div>

                <div class="col">
                    <x-label for="balcony">@lang('messages.balcony')</x-label>
                    <x-input id="balcony" class="block mt-1 w-full" type="number" name="balcony" :value="old('balcony')"
                             value="{{$item->balcony}}"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="parking">@lang('messages.parking')</x-label>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="parking" id="parking" aria-label="Default select example">
                        <option value="Udvari beálló" @if($item->parking == "Udvari beálló") selected @endif>@lang('messages.court_stand')
                        </option>
                        <option value="Garázs" @if($item->parking == "Garázs") selected @endif>@lang('messages.garage')</option>
                        <option value="Önálló garázs" @if($item->parking == "Önálló garázs") selected @endif>@lang('messages.detached_garage')
                        </option>
                        <option value="Utca, közterület" @if($item->parking == "Utca, közterüle") selected @endif>@lang('messages.street_public_space')
                        </option>
                    </select>
                    {{--<x-input id="parking" class="block mt-1 w-full" type="text" name="parking" :value="old('parking')" value="{{$item->parking}}"/>--}}
                </div>

                <div class="col">
                    <x-label for="parking_price">@lang('messages.parking_price')</x-label>
                    <x-input id="parking_price" class="block mt-1 w-full" type="number" name="parking_price"
                             :value="old('parking_price')" value="{{$item->parking_price}}"
                             autocomplete="parking_price"/>
                </div>

                <div class="col">
                    <x-label for="avg_gas">@lang('messages.avg_gas')</x-label>
                    <x-input id="avg_gas" class="block mt-1 w-full" type="number" name="avg_gas" :value="old('avg_gas')"
                             value="{{$item->avg_gas}}" autocomplete="avg_gas"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="avg_electricity">@lang('messages.avg_electricity')</x-label>
                    <x-input id="avg_electricity" class="block mt-1 w-full" type="number" name="avg_electricity"
                             :value="old('avg_electricity')" value="{{$item->avg_electricity}}"/>
                </div>

                <div class="col">
                    <x-label for="overhead_cost">@lang('messages.overhead_cost')</x-label>
                    <x-input id="overhead_cost" class="block mt-1 w-full" type="number" name="overhead_cost"
                             :value="old('overhead_cost')" value="{{$item->overhead_cost}}"
                             autocomplete="overhead_cost"/>
                </div>

                <div class="col">
                    <x-label for="common_cost">@lang('messages.common_cost')</x-label>
                    <x-input id="common_cost" class="block mt-1 w-full" type="number" name="common_cost"
                             :value="old('common_cost')" value="{{$item->common_cost}}" autocomplete="common_cost"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="heating">@lang('messages.heating')</x-label>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="heating" id="heating" aria-label="Default select example">
                        <option value="Gáz (konvektor)" @if($item->heating == "Gáz (konvektor)") selected @endif>@lang('messages.gas_convector')</option>
                        <option value="Házközponti" @if($item->heating == "Házközponti") selected @endif>@lang('messages.central_heating')
                        </option>
                        <option value="Távfűtés" @if($item->heating == "Távfűtés") selected @endif>@lang('messages.district_heating')</option>
                        <option value="Elektromos konvektor"
                                @if($item->heating == "Elektromos konvektor") selected @endif>@lang('messages.electric_convector')
                        </option>
                        <option value="Elektromos fűtőpanel"
                                @if($item->heating == "Elektromos fűtőpanel") selected @endif>@lang('messages.electric_heating_panel')
                        </option>
                        <option value="Légkondicionáló" @if($item->heating == "Légkondicionáló") selected @endif>@lang('messages.air_conditioner')</option>
                        <option value="Kandalló" @if($item->heating == "Kandalló") selected @endif>@lang('messages.fireplace')</option>
                        <option value="Kályha" @if($item->heating == "Kályha") selected @endif>@lang('messages.stove')</option>
                        <option value="Cserépkájha" @if($item->heating == "Cserépkájha") selected @endif>@lang('messages.tile_stove')
                        </option>
                        <option value="Padlófűtés" @if($item->heating == "Padlófűtés") selected @endif>@lang('messages.floor_heating')
                        </option>
                        <option value="Falfűtés" @if($item->heating == "Falfűtés") selected @endif>@lang('messages.wall_heating')</option>
                    </select>
                </div>

                <div class="col">
                    <x-label for="insulation">@lang('messages.insulation')</x-label>
                    <x-input id="insulation" class="block mt-1 w-full" type="text" name="insulation"
                             :value="old('insulation')" value="{{___($item->insulation)}}" autocomplete="insulation"/>
                </div>

                <div class="col">
                    <x-label for="type">@lang('messages.type')</x-label>
                    <select
                        class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="type" id="type" aria-label="Default select example">
                        <option @if($item->type == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                        <option value="Tégla lakás" @if($item->type == "Tégla lakás") selected @endif>@lang('messages.brick_built_apartment')
                        </option>
                        <option value="Panel lakás" @if($item->type == "Panel lakás") selected @endif>@lang('messages.panel_apartment')
                        </option>
                    </select>
                </div>
            </div>

            @if($item->sale_rent == "rent")

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="furniture">@lang('messages.is_it_furnished')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="furniture" id="furniture" aria-label="Default select example">
                            <option @if($item->furniture == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                            <option value="Igen" @if($item->furniture == "Igen") selected @endif>@lang('messages.yes')</option>
                            <option value="Nem" @if($item->furniture == "Nem") selected @endif>@lang('messages.no')</option>
                        </select>
                        {{--<x-input id="heating" class="block mt-1 w-full" type="text" name="heating" :value="old('heating')" value="{{$item->heating}}"/>--}}
                    </div>

                    <div class="col">
                        <x-label for="smoking">@lang('messages.smoking')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="smoking" id="smoking" aria-label="Default select example">
                            <option @if($item->smoking == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                            <option value="Igen" @if($item->smoking == "Igen") selected @endif>@lang('messages.yes')</option>
                            <option value="Nem" @if($item->smoking == "Nem") selected @endif>@lang('messages.no')</option>
                        </select>
                    </div>

                    <div class="col">
                        <x-label for="animal">@lang('messages.animal')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="animal" id="animal" aria-label="Default select example">
                            <option @if($item->animal == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                            <option value="Igen" @if($item->animal == "Igen") selected @endif>@lang('messages.yes')</option>
                            <option value="Nem" @if($item->animal == "Nem") selected @endif>@lang('messages.no')</option>
                        </select>
                    </div>
                </div>
            @endif

            <div class="row mt-4">
                <div class="col">
                    <x-label for="descrpition">@lang('messages.description')</x-label>
                    <textarea class="block mt-1 w-full rounded border-gray-300" id="descrpition" name="description"
                              required>{{___($item->description)}}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    @lang('messages.save')
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
