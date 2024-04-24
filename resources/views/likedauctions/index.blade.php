<x-layout>
    <div class="container">
        {{--<div class="input-group margin-top py-3 rounded row bg-dark mb-5">
            <form action="{{route('liked_prop.search')}}" method="POST" class="row mb-2">
                @csrf
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
            </form>
        </div>--}}
        <div class="row margin-top">
            @foreach($properties as $property)
                @php
                    $address = ($property->settlement).','.' '.($property->address).'.';
                    $auctions = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where('properties_id', '=', $property->id)->first();
                @endphp

                <div class="col-lg-3 width-33 mb-5">
                    <div class="card border-0 shadow-2xl" style="width: 25rem;">

                        @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
                            <img
                                src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                class="card-img-top image" alt="...">
                            @if(\App\Models\LikedAuctions::where([['user_id', '=', auth()->id()], ['auctions_id', '=', $auctions->id]])->count()>0)
                                <form action="/own_liked_auction/delete/{{$auctions->id}}" method="GET">
                                    @csrf
                                    @method('DELETE')
                                    <button class="star"><i class="fa-solid fa-star fa-xl" style="color: #f8c920;"></i>
                                    </button>
                                </form>
                            @else
                                <form action="/liked_auction/{{$auctions->id}}" method="POST">
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
                            <!-- Button trigger modal -->
                            <a class="btn btn-primary" href="/auctions/{{$property->id}}">Aukció megtekintése</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</x-layout>
