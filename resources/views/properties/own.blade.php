<x-layout>
    <div class="container">
        <form action="{{route('own.properties.search')}}" method="POST" class="mb-5">
            @csrf
            <div
                class="input-group margin-top p-4 rounded shadow-custom search-header mb-5">
                <div class="row w-100 align-items-center">
                    <div class="col-md-4 d-flex justify-content-end">
                        <div class="form-check">
                            @if(isset($sale_rent) && $sale_rent == 'sale')
                                <input checked id="sale" name="sale_rent" type="radio" value="sale"/>
                                <label for="sale" class="form-check-label text-white">@lang('messages.for_sale')</label>
                            @else
                                <input id="sale" name="sale_rent" type="radio" value="sale"/>
                                <label for="sale" class="form-check-label text-white">@lang('messages.for_sale')</label>
                            @endif
                        </div>
                        <div class="form-check ">
                            @if(isset($sale_rent) && $sale_rent == 'rent')
                                <input id="rent" name="sale_rent" checked type="radio" value="rent"/>
                                <label for="rent" class="form-check-label text-white">@lang('messages.for_rent')</label>
                            @else
                                <input id="rent" name="sale_rent" type="radio" value="rent"/>
                                <label for="rent" class="form-check-label text-white">@lang('messages.for_rent')</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-outline" data-mdb-input-init>
                            @if(isset($settlement_search))
                                <input type="search" class="form-control text-white"
                                       aria-label="Search"
                                       name="settlement_search"
                                       id="settlement"
                                       aria-describedby="search-addon" value="{{$settlement_search}}"/>
                                <label for="settlement" class="form-label">@lang('messages.settlement')</label>
                            @else
                                <input type="search" class="form-control text-white"
                                       aria-label="Search"
                                       name="settlement_search"
                                       id="settlement"
                                       aria-describedby="search-addon"/>
                                <label for="settlement" class="form-label">@lang('messages.settlement')</label>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn text-15 text-white btn-second-main-color" data-mdb-ripple-init><i
                                class="fa-solid fa-magnifying-glass"></i> @lang('messages.search')</button>
                    </div>
                </div>
            </div>
        </form>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-offer-tab" data-bs-toggle="tab" data-bs-target="#nav-offer"
                        type="button" role="tab" aria-controls="nav-offer"
                        aria-selected="true">@lang('messages.for_sale')
                </button>
                <button class="nav-link" id="nav-sold-tab" data-bs-toggle="tab" data-bs-target="#nav-sold"
                        type="button" role="tab" aria-controls="nav-sold"
                        aria-selected="false">@lang('messages.sold_properties')
                </button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active p-3" id="nav-offer" role="tabpanel" aria-labelledby="nav-offer-tab">
                <div class="row">
                    @foreach($properties as $property)
                        @if(!$property->sold && !$property->auction && $property->user_id == auth()->id())
                            @php
                                $address = ($property->settlement).','.' '.($property->address).'.';
                            @endphp
                            <div class="col-lg-3 width-33 mb-5">
                                <div class="card border-0 shadow-custom text-black" style="width: 25rem;">
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h1 class="card-title">{{number_format(($property->price),0,'','.')}} Ft</h1>
                                        <p class="card-text mb-5">{{$address}}</p>
                                        <div class="row mb-4 text-center">
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
                                        <div class="row">
                                            <div class="col-md-6 my-auto">
                                                <a href="properties/{{$property->id}}" class="btn btn-second-main-color text-white"><i
                                                        class="fa-solid fa-circle-info" data-mdb-ripple-init></i> @lang('messages.details')</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="properties/{{$property->id}}/edit" class="btn btn-main-color text-white px-3"><i
                                                        class="fa-solid fa-pen-to-square" data-mdb-ripple-init></i> @lang('messages.property_edit')</a>
                                            </div>
                                        </div>

                                        <a href="/image/{{$property->id}}/edit" class="btn btn-main-color text-white p-3 mt-3" data-mdb-ripple-init><i
                                                class="fa-solid fa-pen-to-square"></i> @lang('messages.property_img_edit')
                                        </a>
                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <form action="/properties/{{$property->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger rounded-custom" data-mdb-ripple-init><i
                                                            class="fa-solid fa-trash"></i> @lang('messages.delete')
                                                    </button>
                                                </form>
                                            </div>

                                            <div class="col-md-6">
                                                <form action="sold/{{$property->id}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-warning rounded-custom" data-mdb-ripple-init><i class="fa-solid fa-sack-dollar"></i>
                                                        @lang('messages.sold')
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
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
                        @if($property->sold && !$property->auction && $property->user_id == auth()->id())
                            @php
                                $address = ($property->settlement).','.' '.($property->address).'.';
                            @endphp
                            {{--<iframe src="https://maps.google.it/maps?q=<?php echo $address?>&output=embed" width="600" height="450"
                                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
                            <div class="col-lg-3 width-33 mb-5">
                                <div class="card border-0 shadow-custom text-black" style="width: 25rem;">
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h1 class="card-title">{{number_format(($property->price),0,'','.')}} Ft</h1>
                                        <p class="card-text mb-5">{{$address}}</p>
                                        <div class="row mb-4 text-center">
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="properties/{{$property->id}}" class="btn btn-second-main-color text-white"><i
                                                        class="fa-solid fa-circle-info" data-mdb-ripple-init></i> @lang('messages.details')</a>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="/properties/{{$property->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger rounded-custom"><i
                                                            class="fa-solid fa-trash" data-mdb-ripple-init></i>@lang('messages.delete')
                                                    </button>
                                                </form>
                                            </div>
                                        </div>


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
