{{--@foreach($images as $image)
    <img src="{{asset($image->images)}}" alt="">
@endforeach--}}
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo/>
        </x-slot>
        <x-validation-errors class="mb-4"/>

        <form method="POST" action="/images/{{$propertyID}}" enctype="multipart/form-data">
            @csrf
            @if(count($main_img) === 1)
                <h1 style="font-size: 55px">Fő kép</h1>
            @else
                <h1 style="font-size: 55px">Fő kép</h1>
                <div class="mb-5" id="plus">
                    <button class="btn btn-primary plusbtn" type="button" onclick="hidebtn(this)"><i
                                class="fa-solid fa-plus"></i></button>
                </div>
            @endif

            <div class="row">
                @foreach($main_img as $img)
                    <div class="col-lg-3 width-33 mb-5">
                        <div class="card border-0 shadow-2xl igen" style="width: 25rem;">
                            <img src="{{asset($img->main_img)}}" class="card-img-top" alt="...">
                            <button class="close" type="button"
                                    onclick="window.location.href='/main_image/{{$img->id}}'"><i
                                        class="fa-solid fa-circle-xmark fa-2xl"
                                        style="color: #e00000;"></i></button>
                        </div>
                    </div>
                @endforeach
            </div>
            <h1 style="font-size: 55px">Képek</h1>
            <div class="mb-5" id="plus2">
                <button class="btn btn-primary plusbtn2" type="button" onclick="hidebtn(this)"><i
                            class="fa-solid fa-plus"></i></button>
            </div>
            <div class="row">
                @foreach($images as $image)
                    <div class="col-lg-3 width-33 mb-5">
                        <div class="card border-0 shadow-2xl igen" style="width: 25rem;">
                            <img src="{{asset($image->images)}}" class="card-img-top" alt="...">
                            <button class="close" type="button"
                                    onclick="window.location.href='/images/{{$image->id}}'"><i
                                        class="fa-solid fa-circle-xmark fa-2xl"
                                        style="color: #e00000;"></i></button>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ms-4">
                    {{ __('Közzététel') }}
                </x-button>
            </div>
        </form>

    </x-authentication-card>
</x-guest-layout>

