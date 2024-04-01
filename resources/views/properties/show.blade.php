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
        <div class="container mt-6">
            <div id="carouselExampleIndicators" class="carousel slide mb-5">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active bg-dark" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            class="bg-dark" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            class="bg-dark" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @foreach($main_img as $img)
                        <div class="carousel-item active">
                            <img src="{{asset($img->main_img)}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                    @foreach($images as $image)
                        <div class="carousel-item">
                            <img src="{{asset($image->images)}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="color: black"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="row">
                <div class="col-sm-8 mb-3 mb-sm-0">
                    <div class="card border-0 shadow-2xl">
                        <div class="card-body">
                            <h1 class="card-title mt-2">{{$address}}</h1>
                            <h1 class="card-title-price card-title">{{number_format(($property->price),0,'','.')}}
                                Ft</h1>
                            <div class="row mb-2 d-flex justify-content-between">
                                <div class="col-md-3">
                                    <div>
                                        <i class="fa-solid fa-bed icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->rooms}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <i class="fa-solid fa-shower icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->bathrooms}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <i class="fa-solid fa-vector-square icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->size}} m<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card border-0 shadow-2xl mt-5">
                        <div class="card-body">
                            <h1 class="card-title mt-2">Leírás</h1>
                            <p class="card-text mb-2">{{$property->description}}</p>
                        </div>
                    </div>

                    <div class="card border-0 shadow-2xl mt-5">
                        <div class="card-body row">
                            <h1 class="card-title mt-2">Általános információk</h1>
                            <div class="col-sm-5">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Ingatlan állapota:</th>
                                        <td>{{$property->condition}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Ingatlan típusa:</th>
                                        <td>{{$property->type}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Építés éve:</th>
                                        <td>{{$property->year_construction}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Emelet:</th>
                                        <td>{{$property->floor}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Épület szintjei:</th>
                                        <td>{{$property->building_levels}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Lift:</th>
                                        <td>{{$property->lift}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Belmagasság:</th>
                                        <td>{{$property->inner_height}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-7">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Légkondícionáló:</th>
                                        <td>{{$property->air_conditioner}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Akadálymentesített:</th>
                                        <td>{{$property->accessible}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tetőtér:</th>
                                        <td>{{$property->attic}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Erkély:</th>
                                        <td>{{$property->balcony}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Parkolási lehetőségek:</th>
                                        <td>{{$property->parking}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Parkolási költségek:</th>
                                        <td>{{$property->parking_price}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-2xl mt-5">
                        <div class="card-body">
                            <h1 class="card-title mt-2">Hasznos információk</h1>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row">Átlagos gázköltségek:</th>
                                    <td>{{number_format(($property->avg_gas),0,'','.')}} Ft</td>
                                </tr>
                                <tr>
                                    <th scope="row">Átlagos áramköltségek:</th>
                                    <td>{{number_format(($property->avg_electricity),0,'','.')}} Ft</td>
                                </tr>
                                <tr>
                                    <th scope="row">Rezsi költség (Átlagosan):</th>
                                    <td>{{number_format(($property->overhead_cost),0,'','.')}} Ft</td>
                                </tr>
                                <tr>
                                    <th scope="row">Közös költség:</th>
                                    <td>{{number_format(($property->common_cost),0,'','.')}} Ft</td>
                                </tr>
                                <tr>
                                    <th scope="row">Fűtés:</th>
                                    <td>{{$property->heating}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Szigetelés:</th>
                                    <td>{{$property->insulation}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card border-0 shadow-2xl mt-5">
                        <div class="card-body d-flex justify-content-center">
                            <iframe src="https://maps.google.it/maps?q=<?php echo $address?>&output=embed" width="800"
                                    height="650"
                                    style="border: 2px solid black;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="card border-0 shadow-2xl text-center">
                        <div class="card-body">
                            <h1 class="card-title">Lépj kapcsolatba a hirdetővel!</h1>
                            <hr class="mb-4">
                            @if(isset(auth()->user()->is_ingatlanos))
                                <h2 style="font-size: 20px">(IDE JÖHET EGY ICON){{$agents->phone_number}}</h2>
                            @else
                                <h1 class="card-title"><a href="{{route('login')}}" class="btn btn-primary">Telefonszám
                                        felfedése</a></h1>
                            @endif

                            <img src="{{asset($agents->profile_photo_path)}}" alt="">
                            <h1 class="card-title">{{$agents->name}}</h1>
                            <a href="" class="btn btn-primary"><i class="fa-regular fa-star fa-xl"
                                                                  style="color: #f8c920;"></i>Hirdetés mentése</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    @endforeach
</x-layout>
