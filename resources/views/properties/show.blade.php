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
        @php
            $address = ($property->settlement).','.' '.($property->address).'.';
        @endphp
        <div class="container margin-top">
            <div class="row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card border-0 shadow-2xl">
                        <div class="card-body">
                            <h1 class="card-title">{{$address}}</h1>
                            <h1 class="card-title-price card-title">{{number_format(($property->price),0,'','.')}}
                                Ft</h1>
                            <div class="row mb-4">
                                <div class="col-md-3 width-33">
                                    <div>
                                        <i class="fa-solid fa-bed icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->rooms}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3 width-33">
                                    <div>
                                        <i class="fa-solid fa-shower icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->bathrooms}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3 width-33">
                                    <div>
                                        <i class="fa-solid fa-vector-square icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->size}} m<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text">{{$property->description}}</p>
                        </div>
                    </div>

                    <div class="card border-0 shadow-2xl mt-5">
                        <div class="card-body">
                            <iframe src="https://maps.google.it/maps?q=<?php echo $address?>&output=embed" width="600"
                                    height="450"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="card border-0 shadow-2xl">
                        <div class="card-body">
                            <h1 class="card-title">{{$agents->phone_number}}(IDE JÖN A TELEFONSZÁM AMIT CSAKIS BEJELENTKEZETT EMBEREK
                                LÁTJÁK)</h1>
                            <h1 class="card-title">IDE JÖN AZ INGATLANOS PROFILKÉPE</h1>
                            <h1 class="card-title">{{$agents->name}}</h1>
                            <h1 class="card-title">IDE JÖN HIRDETÉS MENTÉSE GOMB</h1>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endforeach
</x-layout>
