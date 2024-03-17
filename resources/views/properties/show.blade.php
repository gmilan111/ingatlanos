<x-layout>

    {{--@foreach($properties as $property)
        <h1>{{$property->settlement}}</h1>


    @endforeach
    @php

        @endphp
    @foreach($images as $image)

        <img src="{{asset($image->images)}}" alt="">
    @endforeach
    @foreach($main_img as $img)

        <img src="{{asset($img->main_img)}}" alt="">
    @endforeach--}}

    @foreach($properties as $property)
        <div class="container margin-top">
            <div class="card border-0 shadow-2xl">
                <div class="card-body">

                </div>
            </div>
        </div>
    @endforeach
</x-layout>
