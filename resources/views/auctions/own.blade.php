<x-layout>
    <div class="container margin-top">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-offer-tab" data-bs-toggle="tab" data-bs-target="#nav-offer"
                        type="button" role="tab" aria-controls="nav-offer" aria-selected="true">@lang('messages.for_sale')
                </button>
                <button class="nav-link" id="nav-sold-tab" data-bs-toggle="tab" data-bs-target="#nav-sold"
                        type="button" role="tab" aria-controls="nav-sold" aria-selected="false">@lang('messages.sold_properties')
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
                                                class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>
                                        <a href="properties/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i> @lang('messages.property_edit')</a>
                                        <a href="/image/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i> @lang('messages.property_img_edit')</a>
                                        <form action="/properties/{{$property->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> @lang('messages.delete')
                                            </button>
                                        </form>
                                        <form action="sold/{{$property->id}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button class="btn btn-warning"><i class="fa-solid fa-sack-dollar"></i>
                                                @lang('messages.sold')
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
                                                class="fa-solid fa-circle-info"></i>@lang('messages.details')</a>
                                        <a href="properties/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i>@lang('messages.property_edit')</a>
                                        <a href="/image/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i>@lang('messages.property_img_edit')</a>
                                        <form action="/properties/{{$property->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i>@lang('messages.delete')
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
