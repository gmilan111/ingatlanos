<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="/properties/{{$item->id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mt-2">
                <div class="col">
                    <x-label for="settlement" value="{{ __('Település neve: ') }}" />
                    <x-input id="settlement" class="block mt-1 w-full" type="text" name="settlement" :value="old('settlement')" value="{{$item->settlement}}" required autofocus autocomplete="settlement " />
                </div>
                <div class="col">
                    <x-label for="state" value="{{ __('Vármegye: ') }}" />
                    <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" value="{{$item->state}}" required autocomplete="state" />
                </div>
                <div class="col">
                    <x-label for="address" value="{{ __('Utca, házszám: ') }}" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" value="{{$item->address}}" required autocomplete="address" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="district" value="{{ __('Kerület/Irányítószám: (Opcionális)') }}" />
                    <x-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')" value="{{$item->district}}" autocomplete="district" />
                </div>

                <div class="col">
                    <x-label for="size" value="{{ __('Méret: ') }}" />
                    <x-input id="size" class="block mt-1 w-full" type="number" name="size" :value="old('size')" value="{{$item->size}}" required autocomplete="size" />
                </div>

                <div class="col">
                    <x-label for="rooms" value="{{ __('Szobaszám: ') }}" />
                    <x-input id="rooms" class="block mt-1 w-full" type="number" name="rooms" :value="old('rooms')" value="{{$item->rooms}}" required autocomplete="rooms" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="bathrooms" value="{{ __('Fürdőszobák száma: ') }}" />
                    <x-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms" :value="old('bathrooms')" value="{{$item->bathrooms}}" required autocomplete="bathrooms" />
                </div>
                <div class="col">
                    <x-label for="price" value="{{ __('Ár: ') }}" />
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" value="{{$item->price}}" required autocomplete="price" />
                </div>
                <div class="col">
                    <x-label for="condition" value="{{ __('Ingatlan állapota: ') }}" />
                    <x-input id="condition" class="block mt-1 w-full" type="text" name="condition" :value="old('condition')" value="{{$item->condition}}" autocomplete="condition" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="year_construction" value="{{ __('Építés éve: ') }}" />
                    <x-input id="year_construction" class="block mt-1 w-full" type="text" name="year_construction" :value="old('year_construction')" value="{{$item->year_construction}}" autocomplete="year_construction" />
                </div>

                <div class="col">
                    <x-label for="floor" value="{{ __('Emelet: ') }}" />
                    <x-input id="floor" class="block mt-1 w-full" type="number" name="floor" :value="old('floor')" value="{{$item->floor}}" autocomplete="floor" />
                </div>

                <div class="col">
                    <x-label for="building_levels" value="{{ __('Épület szintjei: ') }}" />
                    <x-input id="building_levels" class="block mt-1 w-full" type="number" name="building_levels" :value="old('building_levels')" value="{{$item->building_levels}}" autocomplete="building_levels" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="lift" value="{{ __('Lift: ') }}" />
                    <select class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="lift" id="lift" aria-label="Default select example">
                        <option value="0" @if($item->lift == 0) selected @endif>Nincs kiválasztva</option>
                        <option value="1" @if($item->lift == 1) selected @endif>Van</option>
                        <option value="2" @if($item->lift == 2) selected @endif>Nincs</option>
                    </select>
                </div>

                <div class="col">
                    <x-label for="inner_height" value="{{ __('Belmagasság: ') }}" />
                    <x-input id="inner_height" class="block mt-1 w-full" type="number" name="inner_height" :value="old('inner_height')" value="{{$item->inner_height}}" autocomplete="inner_height" />
                </div>

                <div class="col">
                    <x-label for="air_conditioner" value="{{ __('Légkondícionáló: ') }}" />
                    <select class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="air_conditioner" id="air_conditioner" aria-label="Default select example">
                        <option value="0" @if($item->air_conditioner == 0) selected @endif>Nincs kiválasztva</option>
                        <option value="1" @if($item->air_conditioner == 1) selected @endif>Van</option>
                        <option value="2" @if($item->air_conditioner == 2) selected @endif>Nincs</option>
                    </select>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="accessible" value="{{ __('Akadálymentesített: ') }}" />
                    <select class="form-select block mt-1 w-full h-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="accessible" id="accessible" aria-label="Default select example">
                        <option value="0" @if($item->accessible == 0) selected @endif>Nincs kiválasztva</option>
                        <option value="1" @if($item->accessible == 1) selected @endif>Igen</option>
                        <option value="2" @if($item->accessible == 2) selected @endif>Nem</option>
                    </select>
                </div>

                <div class="col">
                    <x-label for="attic" value="{{ __('Tetőtér: ') }}" />
                    <x-input id="attic" class="block mt-1 w-full" type="text" name="attic" :value="old('attic')" value="{{$item->attic}}" autocomplete="attic" />
                </div>

                <div class="col">
                    <x-label for="balcony" value="{{ __('Erkély mérete: ') }}" />
                    <x-input id="balcony" class="block mt-1 w-full" type="number" name="balcony" :value="old('balcony')" value="{{$item->balcony}}"/>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="parking" value="{{ __('Parkolás: ') }}" />
                    <x-input id="parking" class="block mt-1 w-full" type="text" name="parking" :value="old('parking')" value="{{$item->parking}}"/>
                </div>

                <div class="col">
                    <x-label for="parking_price" value="{{ __('Parkolóhely ára: ') }}" />
                    <x-input id="parking_price" class="block mt-1 w-full" type="number" name="parking_price" :value="old('parking_price')" value="{{$item->parking_price}}" autocomplete="parking_price" />
                </div>

                <div class="col">
                    <x-label for="avg_gas" value="{{ __('Átlag gázfogyasztás: ') }}" />
                    <x-input id="avg_gas" class="block mt-1 w-full" type="number" name="avg_gas" :value="old('avg_gas')" value="{{$item->avg_gas}}" autocomplete="avg_gas" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="avg_electricity" value="{{ __('Átlag áramfogyasztás: ') }}" />
                    <x-input id="avg_electricity" class="block mt-1 w-full" type="number" name="avg_electricity" :value="old('avg_electricity')" value="{{$item->avg_electricity}}"/>
                </div>

                <div class="col">
                    <x-label for="overhead_cost" value="{{ __('Rezsiköltség: ') }}" />
                    <x-input id="overhead_cost" class="block mt-1 w-full" type="number" name="overhead_cost" :value="old('overhead_cost')" value="{{$item->overhead_cost}}" autocomplete="overhead_cost" />
                </div>

                <div class="col">
                    <x-label for="common_cost" value="{{ __('Közös költség: ') }}" />
                    <x-input id="common_cost" class="block mt-1 w-full" type="number" name="common_cost" :value="old('common_cost')" value="{{$item->common_cost}}" autocomplete="common_cost" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="heating" value="{{ __('Fűtés: ') }}" />
                    <x-input id="heating" class="block mt-1 w-full" type="text" name="heating" :value="old('heating')" value="{{$item->heating}}"/>
                </div>

                <div class="col">
                    <x-label for="insulation" value="{{ __('Szigetelés: ') }}" />
                    <x-input id="insulation" class="block mt-1 w-full" type="text" name="insulation" :value="old('insulation')" value="{{$item->insulation}}" autocomplete="insulation" />
                </div>

                <div class="col">
                    <x-label for="energy" value="{{ __('Energetikai tanúsítvány: ') }}" />
                    <x-input id="energy" class="block mt-1 w-full" type="number" name="energy" :value="old('energy')" value="{{$item->energy}}" autocomplete="energy" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="descrpition" value="{{__('Leírás: ')}}"/>
                    <textarea class="block mt-1 w-full rounded border-gray-300" id="descrpition" name="description" required >{{$item->description}}</textarea>
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
