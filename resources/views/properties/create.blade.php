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
                    <x-label for="address" value="{{ __('Utca, házszám: ') }}" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
                </div>
                <div class="col">
                    <x-label for="district" value="{{ __('Kerület/Irányítószám: (Opcionális)') }}" />
                    <x-input id="district" class="block mt-1 w-full" type="text" name="district" :value="old('district')" autocomplete="district" />
                </div>

            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="size" value="{{ __('Méret: ') }}" />
                    <x-input id="size" class="block mt-1 w-full" type="number" name="size" :value="old('size')" required autocomplete="size" />
                </div>

                <div class="col">
                    <x-label for="rooms" value="{{ __('Szobaszám: ') }}" />
                    <x-input id="rooms" class="block mt-1 w-full" type="number" name="rooms" :value="old('rooms')" required autocomplete="rooms" />
                </div>

                <div class="col">
                    <x-label for="bathrooms" value="{{ __('Fürdőszobák száma: ') }}" />
                    <x-input id="bathrooms" class="block mt-1 w-full" type="number" name="bathrooms" :value="old('bathrooms')" required autocomplete="bathrooms" />
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <x-label for="price" value="{{ __('Ár: ') }}" />
                    <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price')" required autocomplete="price" />
                </div>


            </div>

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
