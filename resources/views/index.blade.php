<x-layout>
    <form action="{{route('properties.search')}}" method="POST">
        @csrf
        <div class="input-group margin-top row">
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="Település" aria-label="Search" name="settlement_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search" name="price_min_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search" name="price_max_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="Min" aria-label="Search" name="rooms_min_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <input type="search" class="form-control rounded" placeholder="Max" aria-label="Search" name="rooms_max_search"
                       aria-describedby="search-addon"/>
            </div>
            <div class="col">
                <button class="btn btn-outline-primary">search</button>
            </div>
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
