{{--<x-layout>--}}
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>

        <x-validation-errors class="mb-4"/>

        <style>
            /* unfocused borders and label*/

            .form-outline .form-control ~ .form-notch .form-notch-trailing {
                border-top: .125rem solid var(--main-color);
                border-right: .125rem solid var(--main-color);
                border-bottom: .125rem solid var(--main-color);
            }

            .form-outline .form-control ~ .form-notch .form-notch-middle {
                border-bottom: .125rem solid var(--main-color);
                border-top: .125rem solid var(--main-color);
            }

            .form-outline .form-control ~ .form-notch .form-notch-leading {
                border-top: .125rem solid var(--main-color);
                border-bottom: .125rem solid var(--main-color);
                border-left: .125rem solid var(--main-color);
            }

            .form-outline .form-control ~ .form-label {
                color: var(--main-color);
            }


            /* focused borders and label*/
            .form-outline .form-control:focus ~ .form-notch .form-notch-leading {
                border-top: .125rem solid var(--main-color);
                border-bottom: .125rem solid var(--main-color);
                border-left: .125rem solid var(--main-color);
            }

            .form-outline .form-control:focus ~ .form-notch .form-notch-trailing {
                border-top: .125rem solid var(--main-color);
                border-right: .125rem solid var(--main-color);
                border-bottom: .125rem solid var(--main-color);
            }

            .form-outline .form-control:focus ~ .form-notch .form-notch-middle {
                border-top: 0;
                border-bottom: .125rem solid var(--main-color);
            }

            .form-outline .form-control:focus ~ .form-label {
                color: var(--main-color);
            }
        </style>

        <h2 class="text-center mb-5">@lang('messages.add_new_property')</h2>

        <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mt-2">
                <div class="col">
                    <div class="form-check px-0">
                        <input id="sale" name="sale_rent" onclick="salerent()" checked type="radio" value="sale"
                               required autocomplete="sale"/>
                        <label for="sale" class="form-check-label text-black">@lang('messages.for_sale')</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-check px-0">
                        <input id="rent" name="sale_rent" onclick="salerent()" type="radio" value="rent"
                               required autocomplete="rent"/>
                        <label for="rent" class="form-check-label text-black">@lang('messages.for_rent')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col my-auto ">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="settlement" class="form-control login" type="text" name="settlement"
                               required autofocus autocomplete="settlement "/>
                        <label for="settlement" class="form-label">@lang('messages.settlement')</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <select class="form-control select-custom"
                                name="state" id="state" aria-label="Default select example">
                            <option value="Győr-Moson-Sopron">Győr-Moson-Sopron</option>
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
                        <label for="state" class="form-label mb-0 label-custom">@lang('messages.county')</label>
                    </div>

                </div>

                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="address" class="form-control login" type="text" name="address" required
                               autocomplete="address"/>
                        <label for="address" class="form-label">@lang('messages.address')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="district" class="form-control login" type="text" name="district"
                               autocomplete="district"/>
                        <label for="district" class="form-label">@lang('messages.district')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="size" class="form-control login" type="number" name="size"
                               required autocomplete="size"/>
                        <label for="size" class="form-label">@lang('messages.size')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="rooms" class="form-control login" type="number" name="rooms"
                               required autocomplete="rooms"/>
                        <label for="rooms" class="form-label">@lang('messages.rooms')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="bathrooms" class="form-control login" type="number" name="bathrooms"
                               required autocomplete="bathrooms"/>
                        <label for="bathrooms" class="form-label">@lang('messages.bathrooms')</label>
                    </div>

                </div>

                <div class="col my-auto" id="price">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="price" class="form-control login" type="number" name="price"
                               required autocomplete="price"/>
                        <label for="price" class="form-label">@lang('messages.price')</label>
                    </div>


                </div>

                {{--<div class="col" style="display: none" id="starting_price">
                    <x-label for="starting_price">Kezdőár</x-label>
                    <x-input id="starting_price" class="block mt-1 w-full" type="number" name="starting_price" :value="old('price')"
                             />
                </div>--}}

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
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
                        <label for="condition" class="form-label mb-0 label-custom">@lang('messages.condition')</label>
                    </div>
                </div>

            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="year_construction" class="form-control login" type="text" name="year_construction"
                               autocomplete="year_construction"/>
                        <label for="year_construction" class="form-label">@lang('messages.year_construction')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="floor" class="form-control login" type="number" name="floor"
                               autocomplete="floor"/>
                        <label for="floor" class="form-label">@lang('messages.floor')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="building_levels" class="form-control login" type="number" name="building_levels"
                               autocomplete="building_levels"/>
                        <label for="building_levels" class="form-label">@lang('messages.building_levels')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="lift" id="lift" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Van">@lang('messages.there_is')</option>
                            <option value="Nincs">@lang('messages.there_is_not')</option>
                        </select>
                        <label for="lift" class="form-label mb-0 label-custom">@lang('messages.lift')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="inner_height" id="inner_height" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="3 méternél alacsonyabb">@lang('messages.less_then_3')</option>
                            <option value="3 méter vagy magasabb">@lang('messages.3_or_higher')</option>
                        </select>
                        <label for="inner_height" class="form-label mb-0 label-custom">@lang('messages.inner_height')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="air_conditioner" id="air_conditioner" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Van">@lang('messages.there_is')</option>
                            <option value="Nincs">@lang('messages.there_is_not')</option>
                        </select>
                        <label for="air_conditioner" class="form-label mb-0 label-custom">@lang('messages.air_conditioner')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="accessible" id="accessible" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Igen">@lang('messages.yes')</option>
                            <option value="Nem">@lang('messages.no')</option>
                        </select>
                        <label for="accessible" class="form-label mb-0 label-custom">@lang('messages.accessible')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="attic" id="attic" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Tetőréri">@lang('messages.atticish')</option>
                            <option value="Nem tetőtéri">@lang('messages.not_a_loft')</option>
                            <option value="Legfelső emelet, nem tetőtéri">@lang('messages.top_floor_not_attic')</option>
                        </select>
                        <label for="attic" class="form-label mb-0 label-custom">@lang('messages.attic')</label>
                    </div>
                </div>

                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="balcony" class="form-control login" type="number" name="balcony"/>
                        <label for="balcony" class="form-label">@lang('messages.balcony')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="parking" id="parking" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Udvari beálló">@lang('messages.court_stand')</option>
                            <option value="Garázs">@lang('messages.garage')</option>
                            <option value="Önálló garázs">@lang('messages.detached_garage')</option>
                            <option value="Utca, közterület">@lang('messages.street_public_space')</option>
                        </select>
                        <label for="parking" class="form-label mb-0 label-custom">@lang('messages.parking')</label>
                    </div>
                </div>

                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="parking_price" class="form-control login" type="number" name="parking_price"
                               autocomplete="parking_price"/>
                        <label for="parking_price" class="form-label">@lang('messages.parking_price')</label>
                    </div>
                </div>

                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="avg_gas" class="form-control login" type="number" name="avg_gas"
                               autocomplete="avg_gas"/>
                        <label for="avg_gas" class="form-label">@lang('messages.avg_gas')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="avg_electricity" class="form-control login" type="number" name="avg_electricity"/>
                        <label for="avg_electricity" class="form-label">@lang('messages.avg_electricity')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="overhead_cost" class="form-control login" type="number" name="overhead_cost"
                               autocomplete="overhead_cost"/>
                        <label for="overhead_cost" class="form-label">@lang('messages.overhead_cost')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="common_cost" class="form-control login" type="number" name="common_cost"
                               autocomplete="common_cost"/>
                        <label for="common_cost" class="form-label">@lang('messages.common_cost')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
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
                        <label for="heating" class="form-label mb-0 label-custom">@lang('messages.heating')</label>
                    </div>
                </div>

                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="insulation" class="form-control login" type="text" name="insulation"
                               autocomplete="insulation"/>
                        <label for="insulation" class="form-label">@lang('messages.insulation')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="type" id="type" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Tégla lakás">@lang('messages.brick_built_apartment')</option>
                            <option value="Panel lakás">@lang('messages.panel_apartment')</option>
                        </select>
                        <label for="type" class="form-label mb-0 label-custom">@lang('messages.type')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4" id="rent_part" style="display: none;">
                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="furniture" id="furniture" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Igen">@lang('messages.yes')</option>
                            <option value="Nem">@lang('messages.no')</option>
                        </select>
                        <label for="furniture" class="form-label mb-0 label-custom">@lang('messages.is_it_furnished')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="smoking" id="smoking" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Igen">@lang('messages.yes')</option>
                            <option value="Nem">@lang('messages.no')</option>
                        </select>
                        <label for="smoking" class="form-label mb-0 label-custom">@lang('messages.smoking')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="animal" id="animal" aria-label="Default select example">
                            <option selected>@lang('messages.not_selected')</option>
                            <option value="Igen">@lang('messages.yes')</option>
                            <option value="Nem">@lang('messages.no')</option>
                        </select>
                        <label for="animal" class="form-label mb-0 label-custom">@lang('messages.animal')</label>
                    </div>
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
                    <label for="formFiles" class="form-label text-black">@lang('messages.main_img')</label>
                    <input class="form-control file_upload" type="file" id="main_img" name="main_img" required/>
                </div>

                <div class="col">
                    <label for="formFiles" class="form-label text-black">@lang('messages.images')</label>
                    <input class="form-control file_upload" type="file" id="formFile" name="images[]"
                           multiple required/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <textarea class="form-control login" id="descrpition" name="description" required></textarea>
                        <label for="descrpition" class="form-label">@lang('messages.description')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4" style="display: none" id="auctions_info">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="deposit" class="form-control login" type="number" name="deposit"
                                 autocomplete="deposit"/>
                        <label for="deposit" class="form-label">Letét (%-ban)</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="immediate_purchase" class="form-control login" type="number" name="immediate_purchase"
                                 autocomplete="immediate_purchase"/>
                        <label for="immediate_purchase" class="form-label">Azonnali vételár</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="deadline" class="form-control login" type="date" name="deadline"
                                 autocomplete="deadline"/>
                        <label for="deadline" class="form-label">Határidő</label>
                    </div>
                </div>
            </div>

            <div class=" mt-4 w-25 form-check" id="auction_div">
                    <input id="auction" class="form-check-input" name="auction" type="checkbox" onclick="auctions()" value="{{true}}"/>
                    <label class="form-check-label" for="auction">Árverésre bocsátás</label>
            </div>

            <div class="flex items-center justify-end mt-4 w-25 mx-auto">
                <button class="w-100 btn btn-danger text-15 px-3 btn-second-main-color"
                        data-mdb-ripple-init>@lang('messages.save')</button>
                {{--<x-button class="ms-4">
                    @lang('messages.save')
                </x-button>--}}
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>
{{--</x-layout>--}}
