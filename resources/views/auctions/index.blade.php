<x-layout>
    <div class="container margin-top">
        <div class="row">
            @if(count($properties)<1)
                <p>NINCS TALÁLAT</p>
            @endif

            @foreach($properties as $property)
                @if(!$property->sold)
                    @php
                        $address = ($property->settlement).','.' '.($property->address).'.';
                    @endphp
                    {{--<iframe src="https://maps.google.it/maps?q=<?php echo $address?>&output=embed" width="600" height="450"
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}

                    <div class="col-lg-3 width-33 mb-5">
                        <div class="card border-0 shadow-2xl" style="width: 25rem;">
                            {{--@if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
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
                            @endif--}}
                            <img
                                src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                class="card-img-top " alt="...">
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
                                {{--<a href="properties/{{$property->id}}"
                                   class="btn btn-primary" >@lang('messages.details')</a>--}}
                                <a href="properties/{{$property->id}}" class="btn btn-primary">@lang('messages.details')</a>
                                <!-- Button trigger modal -->
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#auctions">
                                    Aukció megtekintése
                                </button>

                                @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "i")
                                    <button class="btn btn-primary">
                                        Aukció lezárása
                                    </button>
                                @endif

                                    <!-- Modal -->
                                    <div class="modal fade" id="auctions" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">FIGYELEM!</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Az aukcióra való belépéshez szükséges letétet fizetni. <br> Pontosan: {{number_format(($property->price*0.05),0,'','.')}} Ft
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vissza</button>
                                                    <a class="btn btn-primary" href="/auctions/{{$property->id}}">Tovább</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</x-layout>
