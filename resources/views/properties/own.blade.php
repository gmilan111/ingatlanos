<x-layout>
    <div class="container margin-top">
        <form action="{{route('own.properties.search')}}" method="POST" class="mb-5">
            @csrf
            <div class="input-group margin-top row">
                <div class="col">
                    <label for="sale" class="flex items-center">
                        @if(isset($sale_rent) && $sale_rent == 'sale')
                            <x-input checked id="sale" name="sale_rent" onclick="salerent()" type="radio" value="sale"/>
                            <span class="ms-2 text-sm text-gray-600">Eladó</span>
                        @else
                            <x-input id="sale" name="sale_rent" onclick="salerent()" type="radio" value="sale"/>
                            <span class="ms-2 text-sm text-gray-600">Eladó</span>
                        @endif
                    </label>
                    <label for="rent" class="flex items-center">
                        @if(isset($sale_rent) && $sale_rent == 'rent')
                            <x-input id="rent" name="sale_rent" onclick="salerent()" checked type="radio" value="rent"/>
                            <span class="ms-2 text-sm text-gray-600">Kiadó</span>
                        @else
                            <x-input id="rent" name="sale_rent" onclick="salerent()" type="radio" value="rent"/>
                            <span class="ms-2 text-sm text-gray-600">Kiadó</span>
                        @endif
                    </label>
                </div>
                <div class="col">
                    @if(isset($settlement_search))
                        <input type="search" class="form-control rounded" placeholder="Település" aria-label="Search"
                               name="settlement_search"
                               aria-describedby="search-addon" value="{{$settlement_search}}"/>
                    @else
                        <input type="search" class="form-control rounded" placeholder="Település" aria-label="Search"
                               name="settlement_search"
                               aria-describedby="search-addon"/>
                    @endif
                </div>
                <div class="col">
                    <button class="btn btn-outline-primary">search</button>
                </div>
            </div>
        </form>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-offer-tab" data-bs-toggle="tab" data-bs-target="#nav-offer"
                        type="button" role="tab" aria-controls="nav-offer" aria-selected="true">Eladó
                </button>
                <button class="nav-link" id="nav-sold-tab" data-bs-toggle="tab" data-bs-target="#nav-sold"
                        type="button" role="tab" aria-controls="nav-sold" aria-selected="false">Eladott
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active p-3" id="nav-offer" role="tabpanel" aria-labelledby="nav-offer-tab">
                <div class="row">
                    @foreach($properties as $property)
                        @if(!$property->sold)
                            @php
                                $address = ($property->settlement).','.' '.($property->address).'.';
                            @endphp
                            {{--<iframe src="https://maps.google.it/maps?q=<?php echo $address?>&output=embed" width="600" height="450"
                                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
                            <div class="col-lg-3 width-33 mb-5">
                                <div class="card border-0 shadow-2xl" style="width: 25rem;">
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h1 class="card-title">{{number_format(($property->price),0,'','.')}} Ft</h1>
                                        <p class="card-text mb-5">{{$address}}</p>
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
                                        <a href="properties/{{$property->id}}" class="btn btn-primary"><i
                                                class="fa-solid fa-circle-info"></i> Részletek</a>
                                        <a href="properties/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i> Ingatlan módosítás</a>
                                        <a href="/image/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i> Ingatlanhoz tartozó képek
                                            módosítás</a>
                                        <form action="/properties/{{$property->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Törlés
                                            </button>
                                        </form>
                                        <form action="sold/{{$property->id}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-warning"><i class="fa-solid fa-sack-dollar"></i>
                                                Eladva
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>


            <div class="tab-pane fade p-3" id="nav-sold" role="tabpanel" aria-labelledby="nav-sold-tab">
                <div class="row">
                    @foreach($properties as $property)
                        @if($property->sold)
                            @php
                                $address = ($property->settlement).','.' '.($property->address).'.';
                            @endphp
                            {{--<iframe src="https://maps.google.it/maps?q=<?php echo $address?>&output=embed" width="600" height="450"
                                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
                            <div class="col-lg-3 width-33 mb-5">
                                <div class="card border-0 shadow-2xl" style="width: 25rem;">
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h1 class="card-title">{{number_format(($property->price),0,'','.')}} Ft</h1>
                                        <p class="card-text mb-5">{{$address}}</p>
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
                                        <a href="properties/{{$property->id}}" class="btn btn-primary"><i
                                                class="fa-solid fa-circle-info"></i> Részletek</a>
                                        <a href="properties/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i> Ingatlan módosítás</a>
                                        <a href="/image/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i> Ingatlanhoz tartozó képek
                                            módosítás</a>
                                        <form action="/properties/{{$property->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Törlés
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layout>
