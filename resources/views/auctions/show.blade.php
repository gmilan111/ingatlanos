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
            $auction = \Illuminate\Support\Facades\DB::table('auctions')->select('*')->where('properties_id', '=', $properties_info->id)->first();
            $auction_list2 = \Illuminate\Support\Facades\DB::table('auctions_entereds')->select('*')->where('auctions_id', '=', $auction->id)->get();
        @endphp

        <div class="row">
            <div class="col-sm-8">
                <div class="card border-0 shadow-2xl mb-5">
                    <div class="card-body">
                        <h1 class="card-title mt-2">{{$address}}</h1>
                        <div class="row mt-4 mb-4">
                            <div class="col-sm-6">
                                <h1 class="card-title-price card-title">
                                    Kezdőár: {{number_format(($properties_info->auction_price),0,'','.')}}
                                    Ft</h1>
                            </div>
                            <div class="col-sm-6">
                                <h1 class="card-title-price card-title">Határidő: {{$auction->deadline}}</h1>
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

                @if(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m" && isset(auth()->user()->auction_entered) && auth()->user()->auction_entered == true && count($auction_list2)>0)
                    <div class="card border-0 shadow-2xl">
                        <div class="card-body">
                            <h1 class="card-title mt-2">Licitálás</h1>
                            <form action="/bid/{{$properties_info->id}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-2 d-flex justify-content-between">
                                    <div class="col-sm-5">
                                        <div>
                                            <input type="hidden" name="auction_id" value="{{$auction->id}}">
                                            <x-input id="bid" class="block w-full" type="number" name="bid"
                                                     :value="old('bid')"
                                                     autocomplete="bid" min="{{$properties_info->auction_price+50000}}" max="{{$properties_info->immediate_purchase-1}}"/>
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
                            </form>
                        </div>

                        <div class="card-body">
                            <h1 class="card-title mt-2">Azonnali megvásárlás</h1>
                            <h1 class="card-title-price">
                                Ára: {{number_format(($properties_info->immediate_purchase),0,'','.')}} Ft</h1>
                            <div class="row mt-2 mb-2 d-flex justify-content-between">
                                <form action="/buy/{{$properties_info->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="col d-flex align-items-center">
                                        <div>
                                            <button class="btn btn-primary">Vásárlás
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="col-sm-2"></div>
                            </div>
                        </div>
                    </div>
                @elseif(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "i")
                    <div class="card border-0 shadow-2xl mt-5">
                        <div class="card-body row">
                            <h1 class="card-title mt-2">@lang('messages.general_info')</h1>
                            <div class="col">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Felhasználó neve</td>
                                        <td>Ajánlat</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($auction_list as $item)
                                        @php
                                            $user = \Illuminate\Support\Facades\DB::table('users')->select('*')->where('id', '=', $item->user_id)->get();
                                        @endphp
                                        @foreach($user as $value)
                                            <tr>
                                                <th scope="row">{{$value->name}}</th>
                                                <th scope="row">{{number_format(($item->offer),0,'','.')}} Ft</th>
                                            </tr>
                                        @endforeach
                                    @endforeach
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
                            <h1 class="card-title"><a href="{{route('login')}}"
                                                      class="btn btn-primary">@lang('messages.show_phone_number')</a>
                            </h1>
                        @endif

                        <img class="mt-5 mb-3 rounded-3 shadow-lg"
                             src="{{asset('storage/'.$agents->profile_photo_path)}}" alt="{{$agents->name}}">
                        <h1 class="card-title">{{$agents->name}}</h1>

                        @php
                            $auction_entered = \Illuminate\Support\Facades\DB::table('auctions_entereds')->select('*')->where([['auctions_id', '=', $auction->id],['user_id','=',auth()->id()]])->get();
                        @endphp
                        @if(count($auction_entered)<1 && isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "m")
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registration">Regisztráció az árverésre</button>
                        @elseif(count($auction_entered)>=1)
                            <form action="/entered_auction/delete/{{$auction->id}}" method="GET">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary">Kilépés az árverésről</button>
                            </form>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="registration" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="/enter_auction/{{$auction->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5"
                                                id="exampleModalLabel">Regisztráció az aukcióra</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>A regisztrációhoz szükséges letét díjat fizetni. Ezt azért kell, mert így tudunk megbizonyosodni, hogy komoly a vevő szándéka.<br>Regisztráció ára: {{number_format((($properties_info->price)*($properties_info->deposit/100)),0,'','.')}} Ft</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">@lang('messages.back')
                                            </button>

                                            <button class="btn btn-primary">@lang('messages.registration')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                            <div class="mt-3">
                                <!-- Button trigger modal -->
                                @if(!auth()->user()->is_ingatlanos == "i")
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                        @lang('messages.send_message')
                                    </button>
                                @elseif(isset(auth()->user()->is_ingatlanos) && auth()->user()->is_ingatlanos == "i")
                                    <form action="/own_closed/{{$properties_info->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-warning"><i class="fa-solid fa-sack-dollar"></i>
                                            Lezárás
                                        </button>
                                    </form>
                                @endif

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="/email/{{$properties_info->id}}" method="GET">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5"
                                                        id="exampleModalLabel">@lang('messages.send_message')</h1>
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
                                                        <label for="exampleFormControlTextarea1"
                                                               class="form-label">@lang('messages.message')</label>
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

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
