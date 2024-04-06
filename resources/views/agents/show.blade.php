<x-layout>
    <div class="container margin-top">
        {{--@foreach($agents as $agent)
            {{$agent->name}}
        @endforeach
        @foreach($agents_info as $info)
            {{$info->language}}
        @endforeach--}}

        @foreach($agents as $agent)
            @foreach($agents_info as $info)
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card border-0 shadow-2xl mt-5">
                            <div class="card-body">
                                <img src="{{asset('storage/'.$agent->profile_photo_path)}}" alt="">
                                <h1 class="card-title mt-2">{{$agent->name}}</h1>
                                <h1 class="card-title mt-2"
                                    style="font-size: 20px !important;">{{$agent->phone_number}}</h1>
                                <p class="card-text mb-2">ALVBALKÉLSLKJDLKASDLJASKJKGAJS</p>
                                <button class="btn btn-primary">Üzenet küldése</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card border-0 shadow-2xl mt-5">
                            <div class="card-body">
                                <h1 class="card-title mt-2">Általános információk</h1>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Járulékom:</th>
                                        <td>{{$info->salary}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tapasztalatom:</th>
                                        <td>{{$info->experience}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Nyelvudásom:</th>
                                        <td>{{$info->language}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card border-0 shadow-2xl mt-5">
                            @php
                                $array = explode(',', $info->help);

                            @endphp
                            <div class="card-body">
                                <h1 class="card-title mt-2">Ezekben tudok segíteni</h1>
                                @foreach($array as $item)
                                    <div class="rounded-3 p-3 bg-danger">{{$item}}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card border-0 shadow-2xl mt-5">
                            <div class="card-body">
                                <h1 class="card-title mt-2">Rólam</h1>
                                <p class="card-text">
                                    {{$info->description}}
                                </p>
                            </div>
                        </div>

                        <div class="card border-0 shadow-2xl mt-5">
                            <div class="card-body">
                                <h1 class="card-title mt-2">Ingatlanok</h1>
                                <div class="row">
                                    @if(count($properties)<1)
                                        <p>NINCS TALÁLAT</p>
                                    @endif
                                    @foreach($properties as $property)
                                        @php
                                            $address = ($property->settlement).','.' '.($property->address).'.';
                                        @endphp
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
                                                                                    style="color: #f8c920;"></i>
                                                            </button>
                                                        </form>

                                                    @endif

                                                @else
                                                    <img
                                                        src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                                        class="card-img-top" alt="...">
                                                @endif
                                                <div class="card-body">
                                                    <h1 class="card-title">{{number_format(($property->price),0,'','.')}}
                                                        Ft</h1>
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
                                                    <a href="/properties/{{$property->id}}" class="btn btn-primary">Go
                                                        somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</x-layout>
