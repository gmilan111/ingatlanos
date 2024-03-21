<x-layout>
    <div class="container margin-top">
        <div class="row">
            @foreach($properties as $property)
                @php
                    $address = ($property->settlement).','.' '.($property->address).'.';
                @endphp
                {{--<iframe src="https://maps.google.it/maps?q=<?php echo $address?>&output=embed" width="600" height="450"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
                <div class="col-lg-3 width-33 mb-5">
                    <div class="card border-0 shadow-2xl" style="width: 25rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h1 class="card-title">{{number_format(($property->price),0,'','.')}} Ft</h1>
                            <p class="card-text mb-5">{{$address}}</p>
                            <div class="row mb-4">
                                <div class="col-md-3 width-33">
                                    <div>
                                        <i class="fa-solid fa-bed icon-size"></i><span class="px-2 font-weight-600">{{$property->rooms}}</span>
                                    </div>
                                </div><div class="col-md-3 width-33">
                                    <div>
                                        <i class="fa-solid fa-shower icon-size"></i><span class="px-2 font-weight-600">{{$property->bathrooms}}</span>
                                    </div>
                                </div><div class="col-md-3 width-33">
                                    <div>
                                        <i class="fa-solid fa-vector-square icon-size"></i><span class="px-2 font-weight-600">{{$property->size}} m<sup>2</sup></span>
                                    </div>
                                </div>
                            </div>
                            <a href="properties/{{$property->id}}" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i> Részletek</a>
                            <a href="properties/{{$property->id}}/edit" class="btn btn-dark"><i class="fa-solid fa-pen-to-square"></i> Ingatlan módosítás</a>
                            <a href="/image/{{$property->id}}/edit" class="btn btn-dark"><i class="fa-solid fa-pen-to-square"></i> Ingatlanhoz tartozó képek módosítás</a>
                            <form action="/properties/{{$property->id}}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa-solid fa-trash"></i> Törlés</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
