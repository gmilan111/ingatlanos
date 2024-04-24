<x-layout>
    <div class="container margin-top">
        <div id="carouselExampleIndicators" class="carousel slide mb-5">
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
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true" style="color: black"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        @php
            $address = ($properties_info->settlement).','.' '.($properties_info->address).'.';
        @endphp

        <div class="row">
            <div class="col-sm-8">
                <div class="card border-0 shadow-2xl mb-5">
                    <div class="card-body">
                        <h1 class="card-title mt-2">{{$address}}</h1>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-6">
                                <h1 class="card-title-price card-title">Kezdőár: {{number_format(($properties_info->price),0,'','.')}}
                                    Ft</h1>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="card-title-price card-title">Határidő: 2024.05.12.</h1>
                            </div>
                        </div>
                        <div class="row mb-2 d-flex justify-content-between">
                            <div class="col-md-3">
                                <div>
                                    <i class="fa-solid fa-bed icon-size"></i><span
                                        class="px-2 font-weight-600">{{$properties_info->rooms}}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <i class="fa-solid fa-shower icon-size"></i><span
                                        class="px-2 font-weight-600">{{$properties_info->bathrooms}}</span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <i class="fa-solid fa-vector-square icon-size"></i><span
                                        class="px-2 font-weight-600">{{$properties_info->size}} m<sup>2</sup></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m")
                    <div class="card border-0 shadow-2xl">
                        <div class="card-body">
                            <h1 class="card-title mt-2">Licitálás</h1>
                            <div class="row mb-2 d-flex justify-content-between">
                                <div class="col-sm-5">
                                    <div>
                                        <x-input id="deposit" class="block w-full" type="number" name="deposit" :value="old('deposit')"
                                                 autocomplete="deposit"/>
                                    </div>
                                </div>
                                <div class="col-sm-5 d-flex align-items-center">
                                    <div>
                                        <button class="btn btn-primary">Licitálás
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>

                        <div class="card-body">
                            <h1 class="card-title mt-2">Azonnali megvásárlás</h1>
                            <h1 class="card-title-price">Ára: {{number_format(($properties_info->immediate_purchase),0,'','.')}} Ft</h1>
                            <div class="row mt-2 mb-2 d-flex justify-content-between">
                                <div class="col d-flex align-items-center">
                                    <div>
                                        <button class="btn btn-primary">Vásárlás
                                        </button>
                                    </div>
                                </div>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                @elseif(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "i")
                    <div class="card border-0 shadow-2xl mt-5">
                        <div class="card-body row">
                            <h1 class="card-title mt-2">@lang('messages.general_info')</h1>
                            <div class="col-sm-5">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.condition')</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-7">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">@lang('messages.air_conditioner')</th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col-sm-4">
                <div class="card border-0 shadow-2xl text-center">
                    <div class="card-body">
                        <h1 class="card-title">@lang('messages.contact_advertiser')</h1>
                        <hr class="mb-4">
                        @php
                            $agents = DB::table('users')->select('*')->where('id', '=', $properties_info->user_id)->first();
                            $auctions = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where('properties_id', '=', $properties_info->id)->first();
                        @endphp
                        @if(isset(auth()->user()->is_ingatlanos))
                            <h2 style="font-size: 20px">(IDE JÖHET EGY ICON){{$agents->phone_number}}</h2>
                        @else
                            <h1 class="card-title"><a href="{{route('login')}}" class="btn btn-primary">@lang('messages.show_phone_number')</a></h1>
                        @endif

                        <img class="mt-5 mb-3 rounded-3 shadow-lg"
                             src="{{asset('storage/'.$agents->profile_photo_path)}}" alt="{{$agents->name}}">
                        <h1 class="card-title">{{$agents->name}}</h1>

                        @if(auth()->user() == null)
                            <div id="liveAlertPlaceholder"></div>
                            <button type="button" class="btn btn-primary" id="liveAlertBtn"><i
                                    class="fa-regular fa-star fa-xl"
                                    style="color: #f8c920;"></i>@lang('messages.save_ad')
                            </button>

                        @else
                            @if(\App\Models\LikedAuctions::where([['user_id', '=', auth()->id()], ['auctions_id', '=', $auctions->id]])->count()>0)
                                <form action="/liked_auction/delete/{{$auctions->id}}" method="GET">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary"><i class="fa-solid fa-star fa-xl"
                                                                       style="color: #f8c920;"></i>Aukció mentése
                                    </button>
                                </form>
                            @else
                                <form action="/liked_auction/{{$auctions->id}}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary"><i class="fa-regular fa-star fa-xl"
                                                                       style="color: #f8c920;"></i>Aukció mentése
                                    </button>
                                </form>

                            @endif
                            <div class="mt-3">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                    @lang('messages.send_message')
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/email/{{$properties_info->id}}" method="GET">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('messages.send_message')</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class=" mb-3">
                                                        <x-label for="name">@lang('messages.name')</x-label>
                                                        <x-input id="name" class="block mt-1 w-full" type="text"
                                                                 name="name" :value="old('name')" required
                                                                 autofocus autocomplete="name"/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleFormControlTextarea1" class="form-label">@lang('messages.message')</label>
                                                        <textarea class="form-control"
                                                                  id="exampleFormControlTextarea1"
                                                                  rows="3" name="description"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">@lang('messages.back')
                                                    </button>
                                                    <button class="btn btn-primary">@lang('messages.send')</button>
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
</x-layout>
