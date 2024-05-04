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

        <h2 class="text-center mb-5">Ingatlan módosítása</h2>

        <form method="POST" action="/properties/{{$item->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mt-2">
                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="settlement" class="form-control login" type="text" name="settlement"
                                 value="{{$item->settlement}}" required autofocus
                                 autocomplete="settlement "/>
                        <label for="settlement" class="form-label">@lang('messages.settlement')</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
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
                        <label for="state" class="form-label mb-0 label-custom">@lang('messages.county')</label>
                    </div>
                </div>
                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="address" class="form-control login" type="text" name="address"
                                 value="{{$item->address}}" required autocomplete="address"/>
                        <label for="address" class="form-label">@lang('messages.address')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="district" class="form-control login" type="text" name="district"
                                 value="{{$item->district}}" autocomplete="district"/>
                        <label for="district" class="form-label">@lang('messages.district')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="size" class="form-control login" type="number" name="size"
                                 value="{{$item->size}}" required autocomplete="size"/>
                        <label for="size" class="form-label">@lang('messages.size')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="rooms" class="form-control login" type="number" name="rooms"
                                 value="{{$item->rooms}}" required autocomplete="rooms"/>
                        <label for="rooms" class="form-label">@lang('messages.rooms')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="bathrooms" class="form-control login" type="number" name="bathrooms" value="{{$item->bathrooms}}" required autocomplete="bathrooms"/>
                        <label for="bathrooms" class="form-label">@lang('messages.bathrooms')</label>
                    </div>
                </div>
                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="price" class="form-control login" type="number" name="price"
                                 value="{{$item->price}}" required autocomplete="price"/>
                        <label for="price" class="form-label">@lang('messages.price')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
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
                        <x-label for="condition" class="form-label mb-0 label-custom">@lang('messages.condition')</x-label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="year_construction" class="form-control login" type="text" name="year_construction"
                                 value="{{$item->year_construction}}"
                                 autocomplete="year_construction"/>
                        <label for="year_construction" class="form-label">@lang('messages.year_construction')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="floor" class="form-control login" type="number" name="floor"
                                 value="{{$item->floor}}" autocomplete="floor"/>
                        <label for="floor" class="form-label">@lang('messages.floor')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="building_levels" class="form-control login" type="number" name="building_levels"
                                 value="{{$item->building_levels}}"
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
                            <option value="Nincs kiválasztva" @if($item->lift == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                            <option value="Van" @if($item->lift == "Van") selected @endif>@lang('messages.there_is')</option>
                            <option value="Nincs" @if($item->lift == "Nincs") selected @endif>@lang('messages.there_is_not')</option>
                        </select>
                        <label for="lift" class="form-label mb-0 label-custom">@lang('messages.lift')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="inner_height" id="inner_height" aria-label="Default select example">
                            <option value="3 méternél alacsonyabb"
                                    @if($item->inner_height == "3 méternél alacsonyabb") selected @endif>@lang('messages.less_then_3')
                            </option>
                            <option value="3 méter vagy magasabb"
                                    @if($item->inner_height == "3 méter vagy magasabb") selected @endif>@lang('messages.3_or_higher')
                            </option>
                        </select>
                        <label for="inner_height" class="form-label mb-0 label-custom">@lang('messages.inner_height')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="air_conditioner" id="air_conditioner" aria-label="Default select example">
                            <option value="Nincs kiválasztva"
                                    @if($item->air_conditioner == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')
                            </option>
                            <option value="Van" @if($item->air_conditioner == "Van") selected @endif>@lang('messages.there_is')</option>
                            <option value="Nincs" @if($item->air_conditioner == "Nincs") selected @endif>@lang('messages.there_is_not')</option>
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
                            <option value="Nincs kiválasztva" @if($item->accessible == "Nincs kiválasztva") selected @endif>
                                @lang('messages.not_selected')
                            </option>
                            <option value="Igen" @if($item->accessible == "Igen") selected @endif>@lang('messages.yes')</option>
                            <option value="Nem" @if($item->accessible == "Nem") selected @endif>@lang('messages.no')</option>
                        </select>
                        <label for="accessible" class="form-label mb-0 label-custom">@lang('messages.accessible')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="attic" id="attic" aria-label="Default select example">
                            <option value="Tetőréri" @if($item->attic == "Tetőtéri") selected @endif>@lang('messages.atticish')</option>
                            <option value="Nem tetőtéri" @if($item->attic == "Nem tetőtéri") selected @endif>@lang('messages.not_a_loft')
                            </option>
                            <option value="Legfelső emelet, nem tetőtéri"
                                    @if($item->attic == "Legfelső emelet, nem tetőtéri") selected @endif>@lang('messages.top-floor_not_attic')
                            </option>
                        </select>
                        <label for="attic" class="form-label mb-0 label-custom">@lang('messages.attic')</label>
                    </div>
                </div>

                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="balcony" class="form-control login" type="number" name="balcony"
                                 value="{{$item->balcony}}"/>
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
                            <option value="Udvari beálló" @if($item->parking == "Udvari beálló") selected @endif>@lang('messages.court_stand')
                            </option>
                            <option value="Garázs" @if($item->parking == "Garázs") selected @endif>@lang('messages.garage')</option>
                            <option value="Önálló garázs" @if($item->parking == "Önálló garázs") selected @endif>@lang('messages.detached_garage')
                            </option>
                            <option value="Utca, közterület" @if($item->parking == "Utca, közterüle") selected @endif>@lang('messages.street_public_space')
                            </option>
                        </select>
                        <label for="parking" class="form-label mb-0 label-custom">@lang('messages.parking')</label>
                    </div>
                </div>

                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="parking_price" class="form-control login" type="number" name="parking_price"
                                 value="{{$item->parking_price}}"
                                 autocomplete="parking_price"/>
                        <label for="parking_price" class="form-label">@lang('messages.parking_price')</label>
                    </div>
                </div>

                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="avg_gas" class="form-control login" type="number" name="avg_gas"
                                 value="{{$item->avg_gas}}" autocomplete="avg_gas"/>
                        <label for="avg_gas" class="form-label">@lang('messages.avg_gas')</label>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="avg_electricity" class="form-control login" type="number" name="avg_electricity"
                                 value="{{$item->avg_electricity}}"/>
                        <label for="avg_electricity" class="form-label">@lang('messages.avg_electricity')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="overhead_cost" class="form-control login" type="number" name="overhead_cost"
                                 value="{{$item->overhead_cost}}"
                                 autocomplete="overhead_cost"/>
                        <label for="overhead_cost" class="form-label">@lang('messages.overhead_cost')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="common_cost" class="form-control login" type="number" name="common_cost"
                                 value="{{$item->common_cost}}" autocomplete="common_cost"/>
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
                        <label for="heating" class="form-label mb-0 label-custom">@lang('messages.heating')</label>
                    </div>
                </div>

                <div class="col my-auto">
                    <div class="form-outline" data-mdb-input-init>
                        <input id="insulation" class="form-control login" type="text" name="insulation"
                                 value="{{___($item->insulation)}}" autocomplete="insulation"/>
                        <label for="insulation" class="form-label">@lang('messages.insulation')</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select
                            class="form-control select-custom"
                            name="type" id="type" aria-label="Default select example">
                            <option @if($item->type == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                            <option value="Tégla lakás" @if($item->type == "Tégla lakás") selected @endif>@lang('messages.brick_built_apartment')
                            </option>
                            <option value="Panel lakás" @if($item->type == "Panel lakás") selected @endif>@lang('messages.panel_apartment')
                            </option>
                        </select>
                        <label for="type" class="form-label mb-0 label-custom">@lang('messages.type')</label>
                    </div>
                </div>
            </div>

            @if($item->sale_rent == "rent")

                <div class="row mt-4">
                    <div class="col">
                        <div class="form-floating">
                            <select
                                class="form-control select-custom"
                                name="furniture" id="furniture" aria-label="Default select example">
                                <option @if($item->furniture == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                                <option value="Igen" @if($item->furniture == "Igen") selected @endif>@lang('messages.yes')</option>
                                <option value="Nem" @if($item->furniture == "Nem") selected @endif>@lang('messages.no')</option>
                            </select>
                            <label for="furniture" class="form-label mb-0 label-custom">@lang('messages.is_it_furnished')</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating">
                            <select
                                class="form-control select-custom"
                                name="smoking" id="smoking" aria-label="Default select example">
                                <option @if($item->smoking == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                                <option value="Igen" @if($item->smoking == "Igen") selected @endif>@lang('messages.yes')</option>
                                <option value="Nem" @if($item->smoking == "Nem") selected @endif>@lang('messages.no')</option>
                            </select>
                            <label for="smoking" class="form-label mb-0 label-custom">@lang('messages.smoking')</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-floating">
                            <select
                                class="form-control select-custom"
                                name="animal" id="animal" aria-label="Default select example">
                                <option @if($item->animal == "Nincs kiválasztva") selected @endif>@lang('messages.not_selected')</option>
                                <option value="Igen" @if($item->animal == "Igen") selected @endif>@lang('messages.yes')</option>
                                <option value="Nem" @if($item->animal == "Nem") selected @endif>@lang('messages.no')</option>
                            </select>
                            <label for="animal" class="form-label mb-0 label-custom">@lang('messages.animal')</label>
                        </div>
                    </div>
                </div>
            @endif

            @if($item->auction)
                <div class="row mt-4">
                    <div class="col">
                        <div class="form-outline" data-mdb-input-init>
                            <input id="deposit" class="form-control login" type="number" name="deposit" value="{{$item->deposit}}"
                                     autocomplete="deposit"/>
                            <label for="deposit" class="form-label">Letét (%-ban)</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-outline" data-mdb-input-init>
                            <input id="immediate_purchase" class="form-control login" type="number" name="immediate_purchase" value="{{$item->immediate_purchase}}"
                                     autocomplete="immediate_purchase"/>
                            <label for="immediate_purchase" class="form-label">Azonnali vételár</label>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-outline" data-mdb-input-init>
                            <input id="deadline" class="form-control login" type="date" name="deadline" value="{{$item->deadline}}"
                                     autocomplete="deadline"/>
                            <label for="deadline" class="form-label">Határidő</label>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row mt-4">
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        <textarea class="form-control login" id="descrpition" name="description"
                                  required>{{___($item->description)}}</textarea>
                        <label for="descrpition" class="form-label">@lang('messages.description')</label>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <div class="flex items-center justify-end mt-4 w-25 mx-auto">
                    <button class="w-100 btn btn-danger text-15 px-3 btn-second-main-color"
                            data-mdb-ripple-init>@lang('messages.save')</button>
                </div>
                {{--<x-button class="ms-4">
                    @lang('messages.save')
                </x-button>--}}
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
