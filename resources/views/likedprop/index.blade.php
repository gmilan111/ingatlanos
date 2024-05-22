<x-layout>
    <div class="p-5 text-center bg-image shadow-custom"
         style="background-image: url('{{asset('img/header.jpg')}}'); height: 920px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="text-center h1-custom text-70">@lang('messages.liked_properties')</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-6">
            @foreach($properties as $property)
                @php
                    $address = ($property->settlement).','.' '.($property->address).'.';
                @endphp
                <div class="col-lg-3 width-33 mb-5">
                    <a href="properties/{{$property->id}}">
                        <div class="card border-0 shadow-custom property text-black" style="width: 25rem;">
                            @if(isset(auth()->user()->is_ingatlanos) and auth()->user()->is_ingatlanos == 'm')
                                <img
                                    src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                    class="card-img-top image" alt="...">
                                @if(\App\Models\LikedProperties::where([['user_id', '=', auth()->id()], ['properties_id', '=', $property->id]])->count()>0)
                                    <form action="/liked_prop/delete/{{$property->id}}" method="GET">
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
                            <div class="card-body text-center">
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

                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="m-5">
                {{$properties->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
</x-layout>
