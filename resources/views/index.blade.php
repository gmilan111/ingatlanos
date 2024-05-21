<x-layout>
    <div class="p-5 text-center bg-image shadow-custom"
         style="background-image: url('{{asset('img/header.jpg')}}'); height: 1050px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="text-center align-items-center mb-10">@lang('messages.index_text')</h1>
                    <form action="{{route('properties.search')}}" method="GET">
                        @csrf
                        <div class="mx-auto input-group search-header p-5 row">
                            <div class="col">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="search" class="form-control" id="settlement" name="settlement_search"/>
                                    <label class="form-label" for="settlement">@lang('messages.settlement')</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="search" class="form-control" id="price_min" name="price_min_search"/>
                                    <label for="price_min" class="form-label">@lang('messages.price_input') (min)</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="search" class="form-control" id="price_max" name="price_min_search"/>
                                    <label for="price_max" class="form-label">@lang('messages.price_input') (max)</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="search" class="form-control" id="rooms_min" name="rooms_min_search"/>
                                    <label for="rooms_min" class="form-label">@lang('messages.number_of_rooms') (min)</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline" data-mdb-input-init>
                                    <input type="search" class="form-control" id="rooms_max" name="rooms_max_search"/>
                                    <label for="rooms_max" class="form-label">@lang('messages.number_of_rooms') (max)</label>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center align-items-center">
                                <button class="btn btn-danger text-15 btn-second-main-color" data-mdb-ripple-init><i
                                        class="fa-solid fa-magnifying-glass"></i> @lang('messages.search')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5 bg-section shadow-custom text-light">
        <h1 class="text-center mt-5" style="color: var(--main-color)">@lang('messages.why_choose_us')</h1>
        <h4 class="text-center mb-10">@lang('messages.choose_text')</h4>
        <div class="container my-5 mb-10">
            <div class="row d-flex justify-content-between">
                <div class="col-md-3 p-4 mb-5 text-center custom-card shadow-custom-2">
                    <i class="fa-solid fa-user text-56 my-4 icon-orange"></i>
                    <h3 class="mb-5">@lang('messages.skilled_workers')</h3>
                    <p>@lang('messages.skilled_workers_text')</p>
                </div>
                <div class="col-md-3 p-4 mb-5 text-center custom-card shadow-custom-2">
                    <i class="fa-solid fa-handshake text-56 my-4 icon-orange"></i>
                    <h3 class="mb-5">@lang('messages.free_consultation')</h3>
                    <p>@lang('messages.free_consultation_text')</p>
                </div>
                <div class="col-md-3 p-4 mb-5 text-center custom-card shadow-custom-2">
                    <i class="fa-solid fa-medal text-56 my-4 icon-orange"></i>
                    <h3 class="mb-5">@lang('messages.best_in_hungary')</h3>
                    <p>@lang('messages.best_in_hungary_text')</p>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <h1 class="mx-5 text-56 font-main-color font-weight-600 text-center my-5">@lang('messages.recommended_for_you')</h1>
        <div class="owl-carousel owl-theme">
            @if(!$rec_helper)
                @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m")
                    @foreach($recommendations as $item)
                        @php
                            $address = ($item->settlement).','.' '.($item->address).'.';
                            $helper = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where([['properties_id', '=', $item->id],['closed', '=', true]])->get();
                        @endphp
                        @if(count($helper)<1)
                            <div class="m-5">
                                <div class="card border-0 shadow-custom" style="width: 25rem;">
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
                                            <h1 class="card-title font-weight-600">{{number_format(($item->auction_price),0,'','.')}}
                                                Ft</h1>
                                        @else
                                            <h1 class="card-title">{{number_format(($item->price),0,'','.')}} Ft</h1>
                                        @endif
                                        <p class="card-text mb-5">{{$address}}</p>
                                        <div class="row mb-4 text-center">
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
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="properties/{{$item->id}}"
                                                   class="btn btn-primary text-15 btn-second-main-color" data-mdb-ripple-init><i
                                                        class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    @foreach($properties as $property)
                        @php
                            $address = ($property->settlement).','.' '.($property->address).'.';
                            $helper_property = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where([['properties_id', '=', $property->id],['closed', '=', true]])->get();
                        @endphp
                        @if(count($helper_property)<1)
                            <div class="m-5">
                                <div class="card border-0 card-custom shadow-custom" style="width: 25rem;">
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
                                        <h1 class="card-title font-weight-600">{{number_format(($property->price),0,'','.')}}
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
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="properties/{{$property->id}}"
                                               class="btn btn-primary text-15 btn-second-main-color" data-mdb-ripple-init><i
                                                    class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @else
                @foreach($properties as $property)
                    @php
                        $address = ($property->settlement).','.' '.($property->address).'.';
                        $helper = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where([['properties_id', '=', $property->id],['closed', '=', true]])->get();
                    @endphp
                    @if(count($helper)<1)
                        <div class="m-5">
                            <div class="card border-0 shadow-custom" style="width: 25rem;">
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
                                    <h1 class="card-title font-weight-600">{{number_format(($property->price),0,'','.')}}
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
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="properties/{{$property->id}}"
                                           class="btn btn-primary text-15 btn-second-main-color" data-mdb-ripple-init><i
                                                class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </section>

    <section class="py-5 bg-section shadow-custom text-light">
        <h1 class="text-center mt-5" style="color: var(--main-color)">@lang('messages.what_we_offer')</h1>
        <div class="container my-5 mb-10">
            <div class="row d-flex justify-content-between">
                <div class="col-md-3 mb-5 p-4 text-center custom-card shadow-custom-2">
                    <i class="fa-solid fa-house text-56 my-4 icon-orange"></i>
                    <h3 class="mb-5">@lang('messages.real_estates')</h3>
                    <a href="{{route('properties.index')}}"
                       class="btn btn-primary text-15 btn-second-main-color" data-mdb-ripple-init><i
                            class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>
                    {{--<p>A csapatunk több mint 20 képzett és tapasztalt ingatlanügynök és ingatlankezelőből áll, akik készen állnak segíteni Önt.</p>--}}
                </div>
                <div class="col-md-3 p-4 mb-5 text-center custom-card shadow-custom-2">
                    <i class="fa-solid fa-gavel text-56 my-4 icon-orange"></i>
                    <h3 class="mb-5">@lang('messages.auctions')</h3>
                    <a href="{{route('auctions.index')}}"
                       class="btn btn-primary text-15 btn-second-main-color" data-mdb-ripple-init><i
                            class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>
                    {{--<p>A klienssel való ismerkedésünk mindig egy ingyenes konzultációval kezdődik annak kiderítésére, hogy milyen ingatlant keresnek.</p>--}}
                </div>
                <div class="col-md-3 mb-5 p-4 text-center custom-card shadow-custom-2">
                    <i class="fa-solid fa-house-chimney-user text-56 my-4 icon-orange"></i>
                    <h3 class="mb-5">@lang('messages.rents')</h3>
                    <a href="{{route('properties.index')}}"
                       class="btn btn-primary text-15 btn-second-main-color" data-mdb-ripple-init><i
                            class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>
                    {{--<p>Minden eredmény, amit a ingatlanközvetítőinktől kap, 100%-osan garantáltan a legjobb ingatlanválasztékot kínálja Magyarországon.</p>--}}
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <h1 class="mx-5 text-56 text-center my-5 font-main-color">@lang('messages.real_estate_agents')</h1>
        <div class="owl-carousel owl-theme mb-10">
            @foreach($agents as $agent)
                @php
                    $agent_information = \Illuminate\Support\Facades\DB::table('users')->select('*')->where('id', '=', $agent->user_id)->first();
                @endphp
                <div class="m-5">
                    <div class="card border-0 shadow-custom" style="width: 25rem;">
                        <img src="{{asset('storage/'.$agent_information->profile_photo_path)}}"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h1 class="card-title font-weight-600">{{$agent_information->name}}</h1>
                            <p class="card-text mb-5">{{$agent->salary}}</p>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="/agents/{{$agent->user_id}}"
                                   class="btn btn-primary text-15 btn-second-main-color" data-mdb-ripple-init><i
                                        class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>
