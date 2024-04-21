<x-layout>
    <div class="container margin-top">
        <div class="row">
            @foreach($agents as $agent)
                @php
                    $agent_info = \Illuminate\Support\Facades\DB::table('agents')->select('*')->where('user_id', '=', $agent->id)->get();
                @endphp
                @foreach($agent_info as $info)
                    <div class="col-lg-3 width-33 mb-5">
                        <a href="/agents/{{$agent->id}}">
                            <div class="card border-0 shadow-2xl" style="width: 25rem;">
                                <img src="{{asset('storage/'.$agent->profile_photo_path)}}" class="card-img-top"
                                     alt="...">
                                <div class="card-body">
                                    <h1 class="card-title">{{$agent->name}}</h1>
                                    <p class="card-text mb-5">{{___($info->description)}}</p>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            @endforeach
        </div>
    </div>
</x-layout>
