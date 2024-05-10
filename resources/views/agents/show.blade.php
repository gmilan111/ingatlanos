<x-layout>
    <div class="container margin-top">
        @foreach($agents as $agent)
            @foreach($agents_info as $info)
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card border-0 shadow-custom text-black text-center">
                            <div class="card-body text-center text-black">
                                <img src="{{asset('storage/'.$agent->profile_photo_path)}}" alt="">
                                <h1 class="card-title mt-2">{{$agent->name}}</h1>
                                <h1 class="card-title mt-2"
                                    style="font-size: 20px !important;"><i
                                        class="fa-solid fa-phone p-2"></i>{{$agent->phone_number}}</h1>
                                {{--<button class="btn btn-second-main-color text-white" data-mdb-ripple-init  data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">@lang('messages.send_message')</button>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card border-0  shadow-custom text-black">
                            <div class="card-body">
                                <h1 class="card-title mt-2">@lang('messages.general_info')</h1>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th scope="row">@lang('messages.my_commission')</th>
                                            <td>{{___($info->salary)}}</td>
                                            {{--<td>{{$info->salary}}</td>--}}
                                        </tr>
                                        <tr>
                                            <th scope="row">@lang('messages.experience')</th>
                                            <td>{{$info->experience}} @lang('messages.year')</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">@lang('messages.language')</th>
                                            <td>{{___($info->language)}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-custom text-black mt-5">
                            <div class="card-body">
                                <h1 class="card-title mt-2">@lang('messages.help')</h1>
                                @foreach($agent_help as $item)
                                    <div
                                        class="rounded-3 p-3 bg-main-color shadow-custom text-second-main-color mt-3">{{___($item)}}</div>
                                @endforeach
                            </div>
                        </div>

                        <div class="card border-0 shadow-custom text-black mt-5">
                            <div class="card-body">
                                <h1 class="card-title mt-2">@lang('messages.about_me')</h1>
                                <p class="card-text">
                                    {{___($info->description)}}
                                </p>
                            </div>
                        </div>

                        <div class="card border-0 shadow-custom text-black mt-5">
                            <div class="card-body">
                                <h1 class="card-title mt-2">@lang('messages.real_estates')</h1>
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active " id="nav-offer-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-offer"
                                                type="button" role="tab" aria-controls="nav-offer" aria-selected="true">
                                            @lang('messages.for_sale')
                                        </button>
                                        <button class="nav-link" id="nav-sold-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-sold"
                                                type="button" role="tab" aria-controls="nav-sold" aria-selected="false">
                                            @lang('messages.sold_properties')
                                        </button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active p-3" id="nav-offer" role="tabpanel"
                                         aria-labelledby="nav-offer-tab">
                                        <div class="row">
                                            @foreach($properties as $property)
                                                @if(!$property->sold)
                                                    @php
                                                        $address = ($property->settlement).','.' '.($property->address).'.';
                                                    @endphp
                                                    <div class="col-md-6 mb-5">
                                                        <div class="card border-0 shadow-custom text-black" style="width: 22rem;">
                                                            <img
                                                                src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                                                class="card-img-top" alt="...">
                                                            <div class="card-body text-center">
                                                                <h1 class="card-title">{{number_format(($property->price),0,'','.')}}
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
                                                                <a href="/properties/{{$property->id}}"
                                                                   class="btn btn-second-main-color text-white"
                                                                   data-mdb-ripple-init><i
                                                                        class="fa-solid fa-circle-info"></i>@lang('messages.details')
                                                                </a>
                                                                    {{--<div class="row">
                                                                        <div class="col-md-6 my-auto">

                                                                        </div>--}}

                                                                        {{--<div class="col-md-6">
                                                                            <a href="properties/{{$property->id}}/edit"
                                                                               class="btn btn-main-color text-white px-3"
                                                                               data-mdb-ripple-init><i
                                                                                    class="fa-solid fa-pen-to-square"></i> @lang('messages.property_edit')
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="/image/{{$property->id}}/edit"
                                                                       class="btn btn-main-color text-white mt-3 p-3"
                                                                       data-mdb-ripple-init><i
                                                                            class="fa-solid fa-pen-to-square"></i>
                                                                        @lang('messages.property_img_edit')</a>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <form action="/properties/{{$property->id}}"
                                                                                  method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button
                                                                                    class="btn btn-danger rounded-custom mt-3"
                                                                                    data-mdb-ripple-init><i
                                                                                        class="fa-solid fa-trash"></i>
                                                                                    @lang('messages.delete')
                                                                                </button>
                                                                            </form>
                                                                        </div>--}}
                                                                        {{--<div class="col-md-6">
                                                                            <form action="/sold/{{$property->id}}" method="POST">
                                                                                @csrf
                                                                                @method('PUT')
                                                                                <button class="btn btn-warning rounded-custom mt-3" data-mdb-ripple-init><i
                                                                                        class="fa-solid fa-sack-dollar"></i>
                                                                                    @lang('messages.sold')
                                                                                </button>
                                                                            </form>
                                                                        </div>--}}
                                                                    {{--</div>--}}
                                                                {{--@else
                                                                    <a href="properties/{{$property->id}}"
                                                                       class="btn btn-second-main-color text-white"
                                                                       data-mdb-ripple-init><i
                                                                            class="fa-solid fa-circle-info"></i>@lang('messages.details')
                                                                    </a>
                                                                @endif--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class="tab-pane fade p-3" id="nav-sold" role="tabpanel"
                                         aria-labelledby="nav-sold-tab">
                                        <div class="row">
                                            @foreach($properties as $property)
                                                @if($property->sold)
                                                    @php
                                                        $address = ($property->settlement).','.' '.($property->address).'.';
                                                    @endphp
                                                    <div class="col-lg-3 width-33 mb-5">
                                                        <div class="card border-0 text-center shadow-custom text-black"
                                                             style="width: 22rem;">
                                                            <img
                                                                src="{{asset(\App\Http\Controllers\MainImageController::main_img_show($property->id)->main_img)}}"
                                                                class="card-img-top" alt="...">
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
                                                                <a href="/properties/{{$property->id}}"
                                                                   class="btn btn-second-main-color text-white"><i
                                                                        class="fa-solid fa-circle-info"></i>@lang('messages.details')
                                                                </a>
                                                                {{--<a href="properties/{{$property->id}}/edit"
                                                                   class="btn btn-main-color text-white mt-3"><i
                                                                        class="fa-solid fa-pen-to-square"></i>@lang('messages.property_edit')
                                                                </a>
                                                                <a href="/image/{{$property->id}}/edit"
                                                                   class="btn btn-main-color text-white p-3 mt-3"><i
                                                                        class="fa-solid fa-pen-to-square"></i> @lang('messages.property_img_edit')
                                                                </a>--}}
                                                                {{--@if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "i")
                                                                    <form action="/properties/{{$property->id}}"
                                                                          method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn rounded-custom btn-danger mt-3">
                                                                            <i
                                                                                class="fa-solid fa-trash"></i>@lang('messages.delete')
                                                                        </button>
                                                                    </form>
                                                                @endif--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</x-layout>
