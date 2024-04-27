<x-layout>
    <div class="container margin-top">
        <form action="{{route('auctions.search')}}" method="POST">
            @csrf
            <div class="input-group margin-top row">
                <div class="col">
                    @if(isset($settlement_search))
                        <input type="search" class="form-control rounded" placeholder="@lang('messages.settlement')"
                               aria-label="Search"
                               name="settlement_search"
                               aria-describedby="search-addon" value="{{$settlement_search}}"/>
                    @else
                        <input type="search" class="form-control rounded" placeholder="@lang('messages.settlement')"
                               aria-label="Search"
                               name="settlement_search"
                               aria-describedby="search-addon"/>
                    @endif
                </div>
                <div class="col">
                    @if(isset($size_min))
                        <x-input id="size_min" class="block mt-1 w-full" type="number"
                                 name="size_min"
                                 value="{{$size_min}}" placeholder="MIN"
                                 autocomplete="size_min"/>
                    @else
                        <x-input id="size_min" class="block mt-1 w-full" type="number"
                                 name="size_min"
                                 :value="old('size_min')" placeholder="MIN"
                                 autocomplete="size_min"/>
                    @endif
                </div>
                <div class="col">
                    @if(isset($size_max))
                        <x-input id="size_max" class="block mt-1 w-full" type="number"
                                 name="size_max"
                                 value="{{$size_max}}" placeholder="MAX"
                                 autocomplete="size_max"/>
                    @else
                        <x-input id="size_max" class="block mt-1 w-full" type="number"
                                 name="size_max"
                                 :value="old('size_max')" placeholder="MAX"
                                 autocomplete="size_max"/>
                    @endif
                </div>
                <div class="col">
                    @if(isset($rooms_min_search))
                        <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                               name="rooms_min_search"
                               aria-describedby="search-addon" value="{{$rooms_min_search}}"/>
                    @else
                        <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search"
                               name="rooms_min_search"
                               aria-describedby="search-addon"/>
                    @endif
                </div>
                <div class="col">
                    @if(isset($rooms_max_search))
                        <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search"
                               name="rooms_max_search"
                               aria-describedby="search-addon" value="{{$rooms_max_search}}"/>
                    @else
                        <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search"
                               name="rooms_max_search"
                               aria-describedby="search-addon"/>
                    @endif
                </div>
                <div class="col">
                    <button class="btn btn-outline-primary">@lang('messages.search')</button>
                </div>
            </div>
        </form>
        <div class="row mt-5">
            @if(count($auctions)<1)
                <p>NINCS TALÁLAT</p>
            @endif
            @foreach($auctions as $auction)
                @php
                    $property = \Illuminate\Support\Facades\DB::table('properties')->select('*')->where('id', '=', $auction->properties_id)->first();
                    $address = ($property->settlement).','.' '.($property->address).'.';
                @endphp
                @if(!$property->sold && !$auction->closed)
                    <div class="col-lg-3 width-33 mb-5">
                        <div class="card border-0 shadow-2xl" style="width: 25rem;">
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
                                <a href="properties/{{$property->id}}"
                                   class="btn btn-primary">@lang('messages.details')</a>

                                @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m")
                                    <a class="btn btn-primary" href="/auctions/{{$property->id}}">Aukció
                                        megtekintése</a>
                                @endif

                                <a class="btn btn-primary" href="/auction_winner/{{$property->id}}">Email</a>

                                @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "i")
                                    <a class="btn btn-primary" href="/auctions/{{$property->id}}">Aukció
                                        megtekintése</a>
                                    <form action="/closed/{{$property->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-warning"><i class="fa-solid fa-sack-dollar"></i>
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
