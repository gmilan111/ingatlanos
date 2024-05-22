<x-layout>
    <div class="p-5 text-center bg-image shadow-custom"
               style="background-image: url('{{asset('img/agents_bg.png')}}'); height: 920px;">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="text-center align-items-center text-70 h1-custom ">@lang('messages.our_team')</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-6 mb-5">
        <div class="row d-flex justify-content-evenly">
            @foreach($agents as $agent)
                @php
                    $agent_info = \Illuminate\Support\Facades\DB::table('agents')->select('*')->where('user_id', '=', $agent->id)->get();
                @endphp
                @foreach($agent_info as $info)
                    <div class="col-lg-auto mb-5">
                        <a href="/agents/{{$agent->id}}">
                            <div class="card border-0 shadow-custom agent text-black" style="width: 25rem;">
                                <img src="{{asset('storage/'.$agent->profile_photo_path)}}" class="card-img-top agent-img"
                                     alt="...">
                                <div class="card-body">
                                    <h1 class="card-title text-center">{{$agent->name}}</h1>
                                    <p class="card-text mb-5 text-center">{{___($info->description)}}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            @endforeach
        </div>
    </div>
</x-layout>
