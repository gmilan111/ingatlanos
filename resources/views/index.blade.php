<x-layout>
    <form action="{{route('properties.search')}}" method="POST">
        @csrf
        <div class="input-group margin-top row">
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="@lang('messages.settlement')"
                       aria-label="Search"
                       name="settlement_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                       name="price_min_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search"
                       name="price_max_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                       name="rooms_min_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search"
                       name="rooms_max_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <button class="btn btn-outline-primary">@lang('messages.search')</button>
            </div>
        </div>
    </form>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img\elso_alberlet.jpg')}}" class="d-block w-100 c-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img\masodik_alberlet.jpg')}}" class="d-block w-100 c-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img\harmadik_alberlet.jpg')}}" class="d-block w-100 c-img" alt="...">
            </div>
        </div>
    </div>
    @if(!$igaz)
        @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m")
            <div class="row">
                @foreach($recommendations as $item)
                    @php
                        $address = ($item->settlement).','.' '.($item->address).'.';
                        $helper = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where([['properties_id', '=', $item->id],['closed', '=', true]])->get();
                    @endphp
                    @if(count($helper)<1)
                        <div class="col-lg-3 width-33 mb-5">
                            <div class="card border-0 shadow-2xl" style="width: 25rem;">
                                @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($item->id)->main_img)}}"
                                        class="card-img-top image" alt="...">
                                    @if(\App\Models\LikedProperties::where([['user_id', '=', auth()->id()], ['properties_id', '=', $item->id]])->count()>0)
                                        <form action="/like/delete/{{$item->id}}" method="GET">
                                            @csrf
                                            @method('DELETE')
                                            <button class="star"><i class="fa-solid fa-star fa-xl"
                                                                    style="color: #f8c920;"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="/like/{{$item->id}}" method="POST">
                                            @csrf
                                            <button class="star"><i class="fa-regular fa-star fa-xl"
                                                                    style="color: #f8c920;"></i></button>
                                        </form>
                                    @endif
                                @else
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($item->id)->main_img)}}"
                                        class="card-img-top" alt="...">
                                @endif
                                <div class="card-body">
                                    @if($item->auction)
                                        <h1 class="card-title">{{number_format(($item->auction_price),0,'','.')}}
                                            Ft</h1>
                                    @else
                                        <h1 class="card-title">{{number_format(($item->price),0,'','.')}} Ft</h1>
                                    @endif
                                    <p class="card-text mb-5">{{$address}}</p>
                                    <div class="row mb-4">
                                        <div class="col-md-3 width-33">
                                            <div>
                                                <i class="fa-solid fa-bed icon-size"></i><span
                                                    class="px-2 font-weight-600">{{$item->rooms}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 width-33">
                                            <div>
                                                <i class="fa-solid fa-shower icon-size"></i><span
                                                    class="px-2 font-weight-600">{{$item->bathrooms}}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 width-33">
                                            <div>
                                                <i class="fa-solid fa-vector-square icon-size"></i><span
                                                    class="px-2 font-weight-600">{{$item->size}} m<sup>2</sup></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="properties/{{$item->id}}"
                                       class="btn btn-primary">@lang('messages.details')</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="row">
                @foreach($properties as $property)
                    @php
                        $address = ($property->settlement).','.' '.($property->address).'.';
                        $helper_property = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where([['properties_id', '=', $property->id],['closed', '=', true]])->get();
                    @endphp
                    @if(count($helper_property)<1)
                        <div class="col-lg-3 width-33 mb-5">
                            <div class="card border-0 shadow-2xl" style="width: 25rem;">
                                @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                        class="card-img-top image" alt="...">
                                    @if(\App\Models\LikedProperties::where([['user_id', '=', auth()->id()], ['properties_id', '=', $property->id]])->count()>0)
                                        <form action="/like/delete/{{$property->id}}" method="GET">
                                            @csrf
                                            @method('DELETE')
                                            <button class="star"><i class="fa-solid fa-star fa-xl"
                                                                    style="color: #f8c920;"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="/like/{{$property->id}}" method="POST">
                                            @csrf
                                            <button class="star"><i class="fa-regular fa-star fa-xl"
                                                                    style="color: #f8c920;"></i></button>
                                        </form>

                                    @endif
                                @else
                                    <img
                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                        class="card-img-top" alt="...">
                                @endif
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
                                    <a href="properties/{{$property->id}}"
                                       class="btn btn-primary">@lang('messages.details')</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    @else
        <div class="row">
            @foreach($properties as $property)
                @php
                    $address = ($property->settlement).','.' '.($property->address).'.';
                    $helper = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where([['properties_id', '=', $property->id],['closed', '=', true]])->get();
                @endphp
            @if(count($helper)<1)
                <div class="col-lg-3 width-33 mb-5">
                    <div class="card border-0 shadow-2xl" style="width: 25rem;">
                        @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
                            <img
                                src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                class="card-img-top image" alt="...">
                            @if(\App\Models\LikedProperties::where([['user_id', '=', auth()->id()], ['properties_id', '=', $property->id]])->count()>0)
                                <form action="/like/delete/{{$property->id}}" method="GET">
                                    @csrf
                                    @method('DELETE')
                                    <button class="star"><i class="fa-solid fa-star fa-xl" style="color: #f8c920;"></i>
                                    </button>
                                </form>
                            @else
                                <form action="/like/{{$property->id}}" method="POST">
                                    @csrf
                                    <button class="star"><i class="fa-regular fa-star fa-xl"
                                                            style="color: #f8c920;"></i></button>
                                </form>

                            @endif
                        @else
                            <img
                                src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                class="card-img-top" alt="...">
                        @endif
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
                            <a href="properties/{{$property->id}}" class="btn btn-primary">@lang('messages.details')</a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @endif
</x-layout>
