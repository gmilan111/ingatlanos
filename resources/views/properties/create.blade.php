<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data">
            @csrf

            <div>
                <x-label for="settlement" value="{{ __('Település neve: ') }}" />
                <x-input id="settlement" class="block mt-1 w-full" type="text" name="settlement" :value="old('settlement')" required autofocus autocomplete="settlement " />
            </div>

            <div class="mt-4">
                <x-label for="address" value="{{ __('Utca, házszám: ') }}" />
                <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
            </div>

            <div class="mt-4">
                <x-label for="district" value="{{ __('Kerület/Irányítószám: (Opcionális)') }}" />
                <x-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')" autocomplete="district" />
            </div>

            <div class="mt-4">
                <x-label for="size" value="{{ __('Méret: ') }}" />
                <x-input id="size" class="block mt-1 w-full" type="number" name="size" :value="old('size')" required autocomplete="size" />
            </div>

            <div class="mt-4">
                <x-label for="rooms" value="{{ __('Szobaszám: ') }}" />
                <x-input id="rooms" class="block mt-1 w-full" type="number" name="rooms" :value="old('rooms')" required autocomplete="rooms" />
            </div>

            <div class="mt-4">
                <x-label for="bathrooms" value="{{ __('Fürdőszobák száma: ') }}" />
                <x-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms" :value="old('bathrooms')" required autocomplete="bathrooms" />
            </div>

            <div class="mt-4">
                <x-label for="price" value="{{ __('Ár: ') }}" />
                <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autocomplete="price" />
            </div>

            <div class="mt-4">
                <x-label for="descrpition" value="{{__('Leírás: ')}}"/>
                <textarea class="block mt-1 w-full rounded border-gray-300" id="descrpition" name="description" required ></textarea>
                {{--<x-input id="descrpition" class="block mt-1 w-full" type="tel" name="phone_number" placeholder="06 70 632 3578" pattern="[0-9]{2} [0-9]{2} [0-9]{3} [0-9]{4}" requied autocomplete="phone"/>--}}
            </div>

            <div class="mt-4">
                <x-label for="formFiles" value="{{__('Képek')}}" />
                {{--<x-input class="block mt-1 w-full rounded border-gray-300" type="file" accept="image/*" name="images[]" id="formFiles" multiple=""/>--}}
                <input class="form-control" type="file" id="formFile" name="images[]" multiple>

            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Közzététel') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
