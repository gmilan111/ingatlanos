<x-layout>
    <form action="{{route('properties.search')}}" method="GET">
        <div class="input-group margin-top">
            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" name="search"
                   aria-describedby="search-addon"/>
            <button class="btn btn-outline-primary">search</button>
        </div>
    </form>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('img\elso_alberlet.jpg')}}" class="d-block w-100 c-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img\masodik_alberlet.jpg')}}" class="d-block w-100 c-img" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{asset('img\harmadik_alberlet.jpg')}}" class="d-block w-100 c-img" alt="...">
            </div>
        </div>
    </div>
</x-layout>
