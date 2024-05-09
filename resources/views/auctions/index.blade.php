<x-layout>
    <style>
        /* unfocused borders and label*/

        .form-outline .form-control ~ .form-notch .form-notch-trailing {
            border: 0;
            border-bottom: .125rem solid var(--second-main-color);
        }

        .form-outline .form-control ~ .form-notch .form-notch-middle {
            border: 0;
            border-bottom: .125rem solid var(--second-main-color);
        }

        .form-outline .form-control ~ .form-notch .form-notch-leading {
            border: 0;
            border-bottom: .125rem solid var(--second-main-color);
        }

        .form-outline .form-control ~ .form-label {
            border: 0;
            color: white;
        }


        /* focused borders and label*/
        .form-outline .form-control:focus ~ .form-notch .form-notch-leading {
            border: 0;
            border-bottom: .125rem solid var(--second-main-color);
        }

        .form-outline .form-control:focus ~ .form-notch .form-notch-trailing {
            border: 0;
            border-bottom: .125rem solid var(--second-main-color);
        }

        .form-outline .form-control:focus ~ .form-notch .form-notch-middle {
            border: 0;
            border-bottom: .125rem solid var(--second-main-color);
        }

        .form-outline .form-control:focus ~ .form-label {
            color: white;
        }
    </style>

    <div class="container margin-top">
        <form action="{{route('auctions.search')}}" method="POST">
            @csrf
            <div class="input-group margin-top p-4 row rounded shadow-custom search-header mb-5 mx-auto align-items-center">
                <div class="col">
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
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        @if(isset($size_min))
                            <input id="size_min" class="form-control text-white"
                                   type="number"
                                   name="size_min"
                                   value="{{$size_min}}"
                                   autocomplete="size_min"/>
                            <label for="size_min" class="form-label">Méret (min)</label>
                        @else
                            <input id="size_min" class="form-control text-white"
                                   type="number"
                                   name="size_min"
                                   autocomplete="size_min"/>
                            <label for="size_min" class="form-label">Méret (min)</label>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        @if(isset($size_max))
                            <input id="size_max" class="form-control text-white"
                                   type="number"
                                   name="size_max"
                                   value="{{$size_max}}"
                                   autocomplete="size_max"/>
                            <label for="size_max" class="form-label">Méret (max)</label>
                        @else
                            <input id="size_max" class="form-control text-white"
                                   type="number"
                                   name="size_max"
                                   autocomplete="size_max"/>
                            <label for="size_max" class="form-label">Méret (max)</label>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        @if(isset($price_min_search))
                            <input type="search" class="form-control text-white" aria-label="Search"
                                   name="price_min_search"
                                   id="price_min"
                                   aria-describedby="search-addon" value="{{$price_min_search}}"/>
                            <label for="price_min" class="form-label">Ár (min)</label>
                        @else
                            <input type="search" class="form-control text-white" aria-label="Search"
                                   name="price_min_search"
                                   id="price_min"
                                   aria-describedby="search-addon"/>
                            <label for="price_min" class="form-label">Ár (min)</label>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline" data-mdb-input-init>
                        @if(isset($price_max_search))
                            <input type="search" class="form-control text-white" id="price_max" aria-label="Search"
                                   name="price_max_search"
                                   aria-describedby="search-addon" value="{{$price_max_search}}"/>
                            <label for="price_max" class="form-label">Ár (max)</label>
                        @else
                            <input type="search" class="form-control text-white" id="price_max" aria-label="Search"
                                   name="price_max_search"
                                   aria-describedby="search-addon"/>
                            <label for="price_max" class="form-label">Ár (max)</label>
                        @endif
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <button class="btn text-15 text-white btn-second-main-color" data-mdb-ripple-init><i
                            class="fa-solid fa-magnifying-glass"></i> @lang('messages.search')</button>
                </div>
            </div>
        </form>
        <div class="row mt-5 d-flex justify-content-evenly">
            @if(count($auctions)<1)
                <p>NINCS TALÁLAT</p>
            @endif
            @foreach($auctions as $auction)
                @php
                    $property = \Illuminate\Support\Facades\DB::table('properties')->select('*')->where('id', '=', $auction->properties_id)->first();
                    $address = ($property->settlement).','.' '.($property->address).'.';
                @endphp
                @if(!$property->sold && !$auction->closed)
                    <div class="col-lg-auto width-33 mb-5">
                        <div class="card border-0 shadow-custom text-black" style="width: 25rem;">
                            <img
                                src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                class="card-img-top " alt="...">
                            <div class="card-body">
                                <h1 class="card-title">{{number_format(($property->auction_price),0,'','.')}} Ft</h1>
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

                                <div class="d-flex justify-content-center">
                                    <a href="properties/{{$property->id}}"
                                       class="btn btn-second-main-color mx-2 text-white" data-mdb-ripple-init><i
                                            class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>

                                    @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m" || auth()->user()->is_ingatlanos == "i")
                                        <a class="btn btn-second-main-color text-white mx-2" data-mdb-ripple-init href="/auctions/{{$property->id}}">Aukció
                                            megtekintése</a>
                                    @endif
                                </div>


                                @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "i")
                                    {{--<a class="btn btn-primary" href="/auctions/{{$property->id}}">Aukció
                                        megtekintése</a>--}}
                                    <form action="/closed/{{$property->id}}" class="d-flex justify-content-center" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-warning mt-4" data-mdb-ripple-init><i class="fa-solid fa-sack-dollar"></i>
                                            Lezárás
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-layout>
