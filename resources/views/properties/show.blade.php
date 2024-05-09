<x-layout>

    @foreach($properties as $property)
        @php
            $address = ($property->settlement).','.' '.($property->address).'.';
        @endphp
        <div class="container mt-6">
            <div id="carouselExampleCrossfade" class="carousel slide carousel-fade" data-mdb-ride="carousel"
                 data-mdb-carousel-init>
                <div class="carousel-inner">
                    @foreach($main_img as $img)
                        <div class="carousel-item active">
                            <img src="{{asset($img->main_img)}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                    @foreach($images as $image)
                        <div class="carousel-item">
                            <img src="{{asset($image->images)}}" class="d-block w-100" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleCrossfade"
                        data-mdb-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleCrossfade"
                        data-mdb-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="row">
                <div class="col-sm-8 mb-3 mb-sm-0">
                    <div class="card border-0 shadow-custom text-black">
                        <div class="card-body">
                            <h1 class="card-title mt-2">{{$address}}</h1>
                            <h1 class="card-title-price card-title">{{number_format(($property->price),0,'','.')}}
                                Ft</h1>
                            <div class="row mb-2 d-flex justify-content-between">
                                <div class="col-md-3">
                                    <div>
                                        <i class="fa-solid fa-bed icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->rooms}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <i class="fa-solid fa-shower icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->bathrooms}}</span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <i class="fa-solid fa-vector-square icon-size"></i><span
                                            class="px-2 font-weight-600">{{$property->size}} m<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card border-0 shadow-custom mt-5 text-black">
                        <div class="card-body">
                            <h1 class="card-title mt-2">@lang('messages.description')</h1>
                            <p class="card-text mb-2">{{___($property->description)}}</p>
                        </div>
                    </div>

                    <div class="card border-0 shadow-custom mt-5 text-black">
                        <div class="card-body row">
                            <h1 class="card-title mt-2">@lang('messages.general_info')</h1>
                            <div class="col-sm-5">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.condition')</th>
                                        <td>{{___($property->condition)}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.property_type')</th>
                                        <td>{{___($property->type)}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.year_construction')</th>
                                        <td>{{$property->year_construction}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.floor')</th>
                                        <td>{{$property->floor}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.building_levels')</th>
                                        <td>{{$property->building_levels}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.lift')</th>
                                        @if($property->lift == "Van")
                                            <td>@lang('messages.there_is')</td>
                                        @elseif($property->lift == "Nincs")
                                            <td>@lang('messages.there_is_not')</td>
                                        @elseif($property->lift == "Nincs kiválasztva")
                                            <td>@lang('messages.not_selected')</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.inner_height')</th>
                                        @if($property->inner_height == "3 méternél alacsonyabb")
                                            <td>@lang('messages.less_then_3')</td>
                                        @elseif($property->inner_height == "3 méter vagy magasabb")
                                            <td>@lang('messages.3_or_higher')</td>
                                        @elseif($property->inner_height == "Nincs kiválasztva")
                                            <td>@lang('messages.not_selected')</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-7">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.air_conditioner')</th>
                                        @if($property->air_conditioner == "Van")
                                            <td>@lang('messages.there_is')</td>
                                        @elseif($property->air_conditioner == "Nincs")
                                            <td>@lang('messages.there_is_not')</td>
                                        @elseif($property->air_conditioner == "Nincs kiválasztva")
                                            <td>@lang('messages.not_selected')</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.accessible')</th>
                                        @if($property->accessible == "Igen")
                                            <td>@lang('messages.yes')</td>
                                        @elseif($property->accessible == "Nem")
                                            <td>@lang('messages.no')</td>
                                        @elseif($property->accessible == "Nincs kiválasztva")
                                            <td>@lang('messages.not_selected')</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.attic')</th>
                                        <td>{{___($property->attic)}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.balcony')</th>
                                        <td>{{$property->balcony}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.parking')</th>
                                        <td>{{___($property->parking)}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">@lang('messages.parking_costs')</th>
                                        <td>{{$property->parking_price}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-custom mt-5 text-black">
                        <div class="card-body">
                            <h1 class="card-title mt-2">@lang('messages.useful_info')</h1>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <th scope="row">@lang('messages.avg_gas_cost')</th>
                                    <td>{{number_format(($property->avg_gas),0,'','.')}} Ft</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('messages.avg_electricity_cost')</th>
                                    <td>{{number_format(($property->avg_electricity),0,'','.')}} Ft</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('messages.avg_overhead_cost')</th>
                                    <td>{{number_format(($property->overhead_cost),0,'','.')}} Ft</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('messages.common_cost')</th>
                                    <td>{{number_format(($property->common_cost),0,'','.')}} Ft</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('messages.heating')</th>
                                    <td>{{___($property->heating)}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">@lang('messages.insulation')</th>
                                    <td>{{___($property->insulation)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card border-0 shadow-custom mb-5 mt-5 text-black">
                        <div class="card-body d-flex justify-content-center">
                            <iframe src="https://maps.google.it/maps?q=<?php echo $address?>&output=embed" width="800"
                                    height="650"
                                    style="border: 2px solid black;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="card border-0 shadow-custom text-black text-center">
                        <div class="card-body">
                            <h1 class="card-title">@lang('messages.contact_advertiser')</h1>
                            <hr class="mb-4">
                            @php
                                $agents = \Illuminate\Support\Facades\DB::table('users')->select('*')->where('id', '=', $property->user_id)->first();
                                $agent_info = \Illuminate\Support\Facades\DB::table('agents')->select('*')->where('user_id', '=', $agents->id)->first();
                            @endphp
                            @if(isset(auth()->user()->is_ingatlanos))
                                <h2 style="font-size: 20px"><i
                                        class="fa-solid fa-phone p-3"></i>{{$agents->phone_number}}</h2>
                            @else
                                <h1 class="card-title"><a href="{{route('login')}}"
                                                          class="btn btn-second-main-color text-white px-4 py-3"
                                                          data-mdb-ripple-init>@lang('messages.show_phone_number')</a>
                                </h1>
                            @endif

                            <img class="mt-3 mb-3 rounded-3 shadow-lg profile-photo mx-auto"
                                 src="{{asset('storage/'.$agents->profile_photo_path)}}" alt="{{$agents->name}}">
                            <h1 class="card-title mb-5">{{$agents->name}}</h1>

                            @if(auth()->user() == null)
                                <div id="liveAlertPlaceholder"></div>
                                <button type="button" class="btn btn-main-color text-white" id="liveAlertBtn"><i
                                        class="fa-regular fa-star fa-xl"
                                        style="color: #f8c920;"></i>@lang('messages.save_ad')
                                </button>

                            @else
                                @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m")
                                    @if(\App\Models\LikedProperties::where([['user_id', '=', auth()->id()], ['properties_id', '=', $property->id]])->count()>0)
                                        <form action="/like/delete/{{$property->id}}" method="GET">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-main-color text-white"><i
                                                    class="fa-solid fa-star fa-xl"
                                                    style="color: #f8c920;"></i>@lang('messages.ad_saved')
                                            </button>
                                        </form>
                                    @else
                                        <form action="/like/{{$property->id}}" method="POST">
                                            @csrf
                                            <button class="btn btn-main-color text-white"><i
                                                    class="fa-regular fa-star fa-xl"
                                                    style="color: #f8c920;"></i>@lang('messages.save_ad')
                                            </button>
                                        </form>

                                    @endif
                                @endif
                                <a href="/agents/{{$agent_info->user_id}}"
                                   class="btn btn-second-main-color mt-3 text-white" data-mdb-ripple-init>Ingatlanos
                                    információk</a>

                                <div class="mt-3">
                                    <!-- Button trigger modal -->
                                    @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m")
                                        <button type="button" class="btn btn-third-color text-white px-4 py-3"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">@lang('messages.send_message')</button>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content bg-main-color">
                                                <form action="/email/{{$property->id}}" method="GET">
                                                    <div class="modal-header model-header-custom">
                                                        <h1 class="modal-title fs-5 text-light"
                                                            id="exampleModalLabel">@lang('messages.send_message')</h1>
                                                        <button type="button" class="btn-close my-auto"
                                                                data-bs-dismiss="modal"
                                                                aria-label="Close"><i class="fa-solid fa-xmark"
                                                                                      style="color: #ffffff; text-align: center"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class=" mb-3">
                                                            <label for="name"
                                                                   class="form-label text-white">@lang('messages.name')</label>
                                                            <x-input id="name" class="block mt-1 w-full bg-main-color"
                                                                     type="text"
                                                                     name="name" :value="old('name')" required
                                                                     autofocus autocomplete="name"/>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlTextarea1"
                                                                   class="form-label text-white">@lang('messages.message')</label>
                                                            <textarea class="form-control bg-main-color"
                                                                      id="exampleFormControlTextarea1"
                                                                      rows="3" name="description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer model-footer-custom">
                                                        {{--<button type="button" class="btn btn-secondary text-second-main-color rounded"
                                                                data-bs-dismiss="modal">@lang('messages.back')
                                                        </button>--}}
                                                        <button
                                                            class="btn btn-second-main-color text-white">@lang('messages.send')</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <script>
                                const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
                                const appendAlert = (message, type) => {
                                    const wrapper = document.createElement('div')
                                    wrapper.innerHTML = [
                                        `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                                        `   <div>${message}</div>`,
                                        '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa-solid fa-x"></i></button>',
                                        '</div>'
                                    ].join('')

                                    alertPlaceholder.append(wrapper)
                                }

                                const alertTrigger = document.getElementById('liveAlertBtn')
                                if (alertTrigger) {
                                    alertTrigger.addEventListener('click', () => {
                                        appendAlert('@lang('messages.only_auth_user')', 'danger')
                                    })
                                }
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-layout>
