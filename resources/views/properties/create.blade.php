<x-layout>
    <x-guest-layout>
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo/>
            </x-slot>

            <x-validation-errors class="mb-4"/>

            <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mt-2">
                    <div class="col">
                        <label for="sale" class="flex items-center">
                            <x-input id="sale" name="sale_rent" onclick="salerent()" checked type="radio" value="sale"
                                     required autocomplete="sale"/>
                            <span class="ms-2 text-sm text-gray-600">@lang('messages.for_sale')</span>
                        </label>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <label for="rent" class="flex items-center">
                            <x-input id="rent" name="sale_rent" onclick="salerent()" type="radio" value="rent"
                                     required autocomplete="rent"/>
                            <span class="ms-2 text-sm text-gray-600">@lang('messages.for_rent')</span>
                        </label>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <x-label for="settlement">@lang('messages.settlement')</x-label>
                        <x-input id="settlement" class="block mt-1 w-full" type="text" name="settlement"
                                 :value="old('settlement')" required autofocus autocomplete="settlement "/>
                    </div>
                    <div class="col">
                        <x-label for="state">@lang('messages.county')</x-label>

                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="state" id="state" aria-label="Default select example">
                            <option selected value="Győr-Moson-Sopron">Győr-Moson-Sopron</option>
                            <option value="Vas">Vas</option>
                            <option value="Zala">Zala</option>
                            <option value="Komárom-Esztergom">Komárom-Esztergom</option>
                            <option value="Veszprém">Veszprém</option>
                            <option value="Somogy">Somogy</option>
                            <option value="Fejér">Fejér</option>
                            <option value="Tolna">Tolna</option>
                            <option value="Baranya">Baranya</option>
                            <option value="Pest">Pest</option>
                            <option value="Bács-Kiskun">Bács-Kiskun</option>
                            <option value="Nógrád">Nógrád</option>
                            <option value="Heves">Heves</option>
                            <option value="Jász-Nagykun-Szolnok">Jász-Nagykun-Szolnok</option>
                            <option value="Csongrád-Csanád">Csongrád-Csanád</option>
                            <option value="Borsod-Abaúj-Zemplén">Borsod-Abaúj-Zemplén</option>
                            <option value="Szabolcs-Szatmár-Bereg">Szabolcs-Szatmár-Bereg</option>
                            <option value="Hajdú-Bihar">Hajdú-Bihar</option>
                            <option value="Békés">Békés</option>
                        </select>
                    </div>
                    <div class="col">
                        <x-label for="address">@lang('messages.address')</x-label>
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address"
                                 :value="old('address')" required autocomplete="address"/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="district">@lang('messages.district')</x-label>
                        <x-input id="district" class="block mt-1 w-full" type="text" name="district"
                                 :value="old('district')" autocomplete="district"/>
                    </div>

                    <div class="col">
                        <x-label for="size">@lang('messages.size')</x-label>
                        <x-input id="size" class="block mt-1 w-full" type="number" name="size" :value="old('size')"
                                 required autocomplete="size"/>
                    </div>

                    <div class="col">
                        <x-label for="rooms">@lang('messages.rooms')</x-label>
                        <x-input id="rooms" class="block mt-1 w-full" type="number" name="rooms" :value="old('rooms')"
                                 required autocomplete="rooms"/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="bathrooms">@lang('messages.bathrooms')</x-label>
                        <x-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms"
                                 :value="old('bathrooms')" required autocomplete="bathrooms"/>
                    </div>

                    <div class="col" id="price">
                        <x-label for="price">@lang('messages.price')</x-label>
                        <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')"
                                 required autocomplete="price"/>
                    </div>

                    <div class="col" style="display: none" id="starting_price">
                        <x-label for="price">Kezdőár</x-label>
                        <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')"
                                 required autocomplete="price"/>
                    </div>

                    <div class="col">
                        <x-label for="condition">@lang('messages.condition')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="condition" id="condition" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Új építésű">@lang('messages.newly_built')</option>
                            <option value="Újszerű">@lang('messages.novel')</option>
                            <option value="Felújított">@lang('messages.renovated')</option>
                            <option value="Jó állapotú">@lang('messages.in_good_condition')</option>
                            <option value="Közepes állapotú">@lang('messages.in_medium_condition')</option>
                            <option value="Felújítandó">@lang('messages.to_be_renovated')</option>
                            <option value="Befejezetlen">@lang('messages.unfinished')</option>
                        </select>
                        {{--<x-input id="condition" class="block mt-1 w-full" type="text" name="condition" :value="old('condition')" autocomplete="condition" />--}}
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="year_construction">@lang('messages.year_construction')</x-label>
                        <x-input id="year_construction" class="block mt-1 w-full" type="text" name="year_construction"
                                 :value="old('year_construction')" autocomplete="year_construction"/>
                    </div>

                    <div class="col">
                        <x-label for="floor">@lang('messages.floor')</x-label>
                        <x-input id="floor" class="block mt-1 w-full" type="number" name="floor" :value="old('floor')"
                                 autocomplete="floor"/>
                    </div>

                    <div class="col">
                        <x-label for="building_levels">@lang('messages.building_levels')</x-label>
                        <x-input id="building_levels" class="block mt-1 w-full" type="number" name="building_levels"
                                 :value="old('building_levels')" autocomplete="building_levels"/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="lift">@lang('messages.lift')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="lift" id="lift" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Van">@lang('messages.there_is')</option>
                            <option value="Nincs">@lang('messages.there_is_not')</option>
                        </select>
                    </div>

                    <div class="col">
                        <x-label for="inner_height">@lang('messages.inner_height')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="inner_height" id="inner_height" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="3 méternél alacsonyabb">@lang('messages.less_then_3')</option>
                            <option value="3 méter vagy magasabb">@lang('messages.3_or_higher')</option>
                        </select>
                        {{--<x-input id="inner_height" class="block mt-1 w-full" type="number" name="inner_height" :value="old('inner_height')" autocomplete="inner_height" />--}}
                    </div>

                    <div class="col">
                        <x-label for="air_conditioner">@lang('messages.air_conditioner')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="air_conditioner" id="air_conditioner" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Van">@lang('messages.there_is')</option>
                            <option value="Nincs">@lang('messages.there_is_not')</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="accessible">@lang('messages.accessible')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="accessible" id="accessible" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Igen">@lang('messages.yes')</option>
                            <option value="Nem">@lang('messages.no')</option>
                        </select>
                    </div>

                    <div class="col">
                        <x-label for="attic">@lang('messages.attic')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="attic" id="attic" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Tetőréri">@lang('messages.atticish')</option>
                            <option value="Nem tetőtéri">@lang('messages.not_a_loft')</option>
                            <option value="Legfelső emelet, nem tetőtéri">@lang('messages.top_floor_not_attic')</option>
                        </select>
                        {{--<x-input id="attic" class="block mt-1 w-full" type="text" name="attic" :value="old('attic')" autocomplete="attic" />--}}
                    </div>

                    <div class="col">
                        <x-label for="balcony">@lang('messages.balcony')</x-label>
                        <x-input id="balcony" class="block mt-1 w-full" type="number" name="balcony"
                                 :value="old('balcony')"/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="parking">@lang('messages.parking')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="parking" id="parking" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Udvari beálló">@lang('messages.court_stand')</option>
                            <option value="Garázs">@lang('messages.garage')</option>
                            <option value="Önálló garázs">@lang('messages.detached_garage')</option>
                            <option value="Utca, közterület">@lang('messages.street_public_space')</option>
                        </select>
                        {{--<x-input id="parking" class="block mt-1 w-full" type="text" name="parking" :value="old('parking')"/>--}}
                    </div>

                    <div class="col">
                        <x-label for="parking_price">@lang('messages.parking_price')</x-label>
                        <x-input id="parking_price" class="block mt-1 w-full" type="number" name="parking_price"
                                 :value="old('parking_price')" autocomplete="parking_price"/>
                    </div>

                    <div class="col">
                        <x-label for="avg_gas">@lang('messages.avg_gas')</x-label>
                        <x-input id="avg_gas" class="block mt-1 w-full" type="number" name="avg_gas"
                                 :value="old('avg_gas')" autocomplete="avg_gas"/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="avg_electricity">@lang('messages.avg_electricity')</x-label>
                        <x-input id="avg_electricity" class="block mt-1 w-full" type="number" name="avg_electricity"
                                 :value="old('avg_electricity')"/>
                    </div>

                    <div class="col">
                        <x-label for="overhead_cost">@lang('messages.overhead_cost')</x-label>
                        <x-input id="overhead_cost" class="block mt-1 w-full" type="number" name="overhead_cost"
                                 :value="old('overhead_cost')" autocomplete="overhead_cost"/>
                    </div>

                    <div class="col">
                        <x-label for="common_cost">@lang('messages.common_cost')</x-label>
                        <x-input id="common_cost" class="block mt-1 w-full" type="number" name="common_cost"
                                 :value="old('common_cost')" autocomplete="common_cost"/>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="heating">@lang('messages.heating')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="heating" id="heating" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Gáz (konvektor)">@lang('messages.gas_convector')</option>
                            <option value="Házközponti">@lang('messages.central_heating')</option>
                            <option value="Távfűtés">@lang('messages.district_heating')</option>
                            <option value="Elektromos konvektor">@lang('messages.electric_convector')</option>
                            <option value="Elektromos fűtőpanel">@lang('messages.electric_heating_panel')</option>
                            <option value="Légkondicionáló">@lang('messages.air_conditioner')</option>
                            <option value="Kandalló">@lang('messages.fireplace')</option>
                            <option value="Kályha">@lang('messages.stove')</option>
                            <option value="Cserépkájha">@lang('messages.tile_stove')</option>
                            <option value="Padlófűtés">@lang('messages.floor_heating')</option>
                            <option value="Falfűtés">@lang('messages.wall_heating')</option>
                        </select>
                    </div>

                    <div class="col">
                        <x-label for="insulation">@lang('messages.insulation')</x-label>
                        <x-input id="insulation" class="block mt-1 w-full" type="text" name="insulation"
                                 :value="old('insulation')" autocomplete="insulation"/>
                    </div>

                    <div class="col">
                        <x-label for="type">@lang('messages.type')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="type" id="type" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Tégla lakás">@lang('messages.brick_built_apartment')</option>
                            <option value="Panel lakás">@lang('messages.panel_apartment')</option>
                        </select>
                    </div>
                </div>

                <div class="row mt-4" id="rent_part" style="display: none;">
                    <div class="col">
                        <x-label for="furniture">@lang('messages.is_it_furnished')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="furniture" id="furniture" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Igen">@lang('messages.yes')</option>
                            <option value="Nem">@lang('messages.no')</option>
                        </select>
                    </div>

                    <div class="col">
                        <x-label for="smoking">@lang('messages.smoking')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="smoking" id="smoking" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Igen">@lang('messages.yes')</option>
                            <option value="Nem">@lang('messages.no')</option>
                        </select>
                    </div>

                    <div class="col">
                        <x-label for="animal">@lang('messages.animal')</x-label>
                        <select
                            class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            name="animal" id="animal" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Igen">@lang('messages.yes')</option>
                            <option value="Nem">@lang('messages.no')</option>
                        </select>
                    </div>
                </div>

                {{--<div class="row mt-4">
                    <div class="col">
                        <label for="auction" class="flex items-center">
                            <x-input id="auction" name="auction" type="radio" value="{{true}}" required
                                     autocomplete="{{true}}"/>
                            <span class="ms-2 text-sm text-gray-600">Árverésre bocsátás</span>
                        </label>
                    </div>
                </div>--}}

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="formFiles">@lang('messages.main_img')</x-label>
                        <x-input class="form-control block mt-2 w-full" type="file" id="main_img" name="main_img" required/>
                    </div>

                    <div class="col">
                        <x-label for="formFiles">@lang('messages.images')</x-label>
                        <x-input class="form-control block mt-2 w-full" type="file" id="formFile" name="images[]"
                                 multiple required/>
                    </div>

                </div>

                <div class="row mt-4">
                    <div class="col">
                        <x-label for="descrpition">@lang('messages.description')</x-label>
                        <textarea class="block mt-1 w-full rounded border-gray-300" id="descrpition" name="description"
                                  required></textarea>
                    </div>
                </div>

                <div class="row mt-4" style="display: none" id="auctions_info">
                    <div class="col-sm-4">
                        <x-label for="deposit">Letét (%-ban)</x-label>
                        <x-input id="deposit" class="block mt-1 w-full" type="number" name="deposit" :value="old('deposit')"
                                 autocomplete="deposit"/>
                    </div>

                    <div class="col-sm-4">
                        <x-label for="immediate_purchase">Azonnali vételár</x-label>
                        <x-input id="immediate_purchase" class="block mt-1 w-full" type="number" name="immediate_purchase" :value="old('immediate_purchase')"
                                 autocomplete="immediate_purchase"/>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <label class="btn btn-block btn-success active">
                        <x-input id="auction" name="auction" type="checkbox" onclick="auctions()" value="{{true}}"/>
                        <span class="ms-2 text-sm text-gray-600">Árverésre bocsátás</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ms-4">
                        @lang('messages.save')
                    </x-button>
                </div>
            </form>
        </x-authentication-card>
    </x-guest-layout>
</x-layout>
