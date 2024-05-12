<x-layout>
    <div class="p-5 text-center bg-image shadow-custom"
         style="background-image: url('{{asset('img/auction_bg.jpg')}}'); height: 920px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="text-center align-items-center mb-10">@lang('messages.registered_auctions')</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row margin-top">
            @foreach($properties as $property)
                @php
                    $address = ($property->settlement).','.' '.($property->address).'.';
                    $auctions = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where('properties_id', '=', $property->id)->first();
                @endphp
            @if(!$auctions->closed)
                <div class="col-md-4 mb-5">
                    <div class="card border-0 shadow-custom text-black" style="width: 25rem;">
                        <img src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}" class="card-img-top" alt="...">
                        <div class="card-body text-center">
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
                            <a href="properties/{{$property->id}}" class="btn btn-second-main-color mx-2 text-white" data-mdb-ripple-init><i
                                    class="fa-solid fa-circle-info"></i> @lang('messages.details')</a>
                            <!-- Button trigger modal -->
                            <a class="btn btn-second-main-color text-white" data-mdb-ripple-init href="/auctions/{{$property->id}}"><i class="fa-solid fa-eye"></i> @lang('messages.view_auction')</a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</x-layout>
