<x-layout>
    <div class="container">
        <form action="{{route('own.auctions.search')}}" method="GET" class="mb-5">
            @csrf
            <div class="input-group search p-4 rounded shadow-custom search-header mb-5">
                <div class="row w-75 mx-auto">
                    <div class="col d-flex align-items-center justify-content-center">
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
                            <div class="d-flex justify-items-end mx-3">
                                <button class="btn text-15 text-white btn-second-main-color" data-mdb-ripple-init>@lang('messages.search')<i
                                        class="fa-solid fa-magnifying-glass mt-1"></i></button>
                            </div>
                    </div>

                </div>
            </div>
        </form>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-offer-tab" data-bs-toggle="tab" data-bs-target="#nav-offer"
                        type="button" role="tab" aria-controls="nav-offer" aria-selected="true">@lang('messages.auctions')
                </button>
                <button class="nav-link" id="nav-deadline-tab" data-bs-toggle="tab" data-bs-target="#nav-deadline"
                        type="button" role="tab" aria-controls="nav-sold" aria-selected="false">@lang('messages.expired_auction')
                </button>
                <button class="nav-link" id="nav-sold-tab" data-bs-toggle="tab" data-bs-target="#nav-sold"
                        type="button" role="tab" aria-controls="nav-sold" aria-selected="false">@lang('messages.closed_auctions')
                </button>

            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active p-3" id="nav-offer" role="tabpanel" aria-labelledby="nav-offer-tab">
                <div class="row">
                    @foreach($auctions as $auction)
                        @php
                            $property = \Illuminate\Support\Facades\DB::table('properties')->select('*')->where('id', '=', $auction->properties_id)->first();
                            $address = ($property->settlement).','.' '.($property->address).'.';
                            $currentDate = date('Y-m-d');
                        @endphp
                        @if(!$auction->closed && $auction->user_id == auth()->id() && $auction->deadline >= $currentDate)
                            <div class="col-lg-auto d-flex justify-content-evenly mb-5">
                                <div class="card border-0 shadow-custom text-black" style="width: 25rem;">
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h1 class="card-title">{{number_format(($property->auction_price),0,'','.')}}
                                            Ft</h1>
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
                                        <div class="row mb-3">
                                            <div>
                                                <a href="/properties/{{$property->id}}" class="btn btn-second-main-color text-15 text-white"><i
                                                        class="fa-solid fa-circle-info" data-mdb-ripple-init></i> @lang('messages.details')</a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div>
                                                <a class="btn btn-main-color text-15 text-white" href="/auctions/{{$property->id}}" data-mdb-ripple-init><i class="fa-solid fa-eye"></i> @lang('messages.view_auction')</a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div>
                                                <a href="/properties/{{$property->id}}/edit" class="btn btn-main-color text-15 text-white p-3 mt-3" data-mdb-ripple-init><i
                                                        class="fa-solid fa-pen-to-square"></i> @lang('messages.property_edit')
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div>
                                                <a href="/image/{{$property->id}}/edit" class="btn btn-main-color text-15 text-white p-3 mt-3" data-mdb-ripple-init><i
                                                        class="fa-solid fa-pen-to-square"></i> @lang('messages.property_img_edit')
                                                </a>
                                            </div>
                                        </div>
                                        {{--<form action="/properties/{{$property->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> @lang('messages.delete')
                                            </button>
                                        </form>--}}
                                        <div class="row">
                                            <div>
                                                <form action="/own_closed/{{$property->id}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-warning text-15 rounded-custom mt-3" data-mdb-ripple-init><i class="fa-solid fa-sack-dollar"></i>
                                                        @lang('messages.close_auction')
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class=" m-5">
                        {{ $auctions->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

            <div class="tab-pane fade show p-3" id="nav-deadline" role="tabpanel" aria-labelledby="nav-deadline-tab">
                <div class="row">
                    @foreach($auctions as $auction)
                        @php
                            $property = \Illuminate\Support\Facades\DB::table('properties')->select('*')->where('id', '=', $auction->properties_id)->first();
                            $address = ($property->settlement).','.' '.($property->address).'.';
                            $currentDate = date('Y-m-d');
                        @endphp
                        @if(!$auction->closed && $auction->user_id == auth()->id() && $auction->deadline < $currentDate)
                            <div class="col-lg-auto d-flex justify-content-evenly mb-5">
                                <div class="card border-0 shadow-custom text-black" style="width: 25rem;">
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h1 class="card-title">{{number_format(($property->auction_price),0,'','.')}}
                                            Ft</h1>
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
                                        <div class="row mb-3">
                                            <div>
                                                <a href="/properties/{{$property->id}}" class="btn btn-second-main-color text-15 text-white"><i
                                                        class="fa-solid fa-circle-info" data-mdb-ripple-init></i> @lang('messages.details')</a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div>
                                                <a class="btn btn-main-color text-15 text-white" href="/auctions/{{$property->id}}" data-mdb-ripple-init><i class="fa-solid fa-eye"></i> @lang('messages.view_auction')</a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div>
                                                <a href="/properties/{{$property->id}}/edit" class="btn btn-main-color text-15 text-white p-3 mt-3" data-mdb-ripple-init><i
                                                        class="fa-solid fa-pen-to-square"></i> @lang('messages.property_edit')
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div>
                                                <a href="/image/{{$property->id}}/edit" class="btn btn-main-color text-15 text-white p-3 mt-3" data-mdb-ripple-init><i
                                                        class="fa-solid fa-pen-to-square"></i> @lang('messages.property_img_edit')
                                                </a>
                                            </div>
                                        </div>
                                        {{--<form action="/properties/{{$property->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> @lang('messages.delete')
                                            </button>
                                        </form>--}}
                                        <div class="row">
                                            <div>
                                                <form action="/own_closed/{{$property->id}}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-warning text-15 rounded-custom mt-3" data-mdb-ripple-init><i class="fa-solid fa-sack-dollar"></i>
                                                        @lang('messages.close_auction')
                                                    </button>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class=" m-5">
                        {{ $auctions->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>


            <div class="tab-pane fade p-3" id="nav-sold" role="tabpanel" aria-labelledby="nav-sold-tab">
                <div class="row">
                    @foreach($auctions as $auction)
                        @php
                            $property = \Illuminate\Support\Facades\DB::table('properties')->select('*')->where('id', '=', $auction->properties_id)->first();
                        @endphp
                        @if($auction->closed && $auction->user_id == auth()->id())
                            @php
                                $address = ($property->settlement).','.' '.($property->address).'.';
                            @endphp
                            <div class="col-lg-auto d-flex justify-content-evenly mb-5">
                                <div class="card border-0 shadow-custom text-black" style="width: 25rem;">
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                        class="card-img-top" alt="...">
                                    <div class="card-body text-center">
                                        <h1 class="card-title">{{number_format(($property->auction_price),0,'','.')}}
                                            Ft</h1>
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
                                                <a href="/properties/{{$property->id}}" class="btn btn-second-main-color text-white"><i
                                                        class="fa-solid fa-circle-info" data-mdb-ripple-init></i> @lang('messages.details')</a>
                                            </div>
                                            <div class="col-md-6">
                                                <a class="btn btn-main-color text-white" href="/auctions/{{$property->id}}" data-mdb-ripple-init><i class="fa-solid fa-eye"></i> @lang('messages.view_auction')</a>
                                            </div>
                                        </div>
                                       {{-- <a href="properties/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i>@lang('messages.property_edit')
                                        </a>
                                        <a href="/image/{{$property->id}}/edit" class="btn btn-dark"><i
                                                class="fa-solid fa-pen-to-square"></i>@lang('messages.property_img_edit')
                                        </a>
--}}
                                        <form action="/auction/{{$property->id}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger rounded-custom mt-3"><i
                                                    class="fa-solid fa-trash" data-mdb-ripple-init></i>@lang('messages.delete')
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
