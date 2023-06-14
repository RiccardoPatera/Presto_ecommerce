<x-layout>
    <div class="container-fluid">
        <div class="row d-flex justify-content-between">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="text-light text-center">
                    Personal Profile
            </div>
                </h1>
                <div class="col-12 col-md-6 my-5 vh-50">
                    <div class="card card-detail  shadow p-3 d-flex justify-content-center bg-light ">
                        <h3>{{Ucwords($user->name)}}</h3>
                        <p>{{$user->email}}</p>
                        <hr class="hr">
                        <h5>Articoli caricati: {{count($user->articles)}}</h5>
                        <h5>Articoli non idonei: {{count($user->articles->where('is_accepted',0))}}</h5>

                        <h5>Iscritto il: {{$user->created_at }}</h5>
                        {{-- <a class="btn btn-outline-dark" href="#">Add to cart</a> --}}
                    </div>
                </div>

                <div class="col-12 col-md-6 my-5 vh-50">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($user->articles as $article)
                            <div class="swiper-slide">
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center my-4">
                                    <a href="{{route('show_article',compact('article'))}}" class="">
                                        <div class="card shadow">
                                            <div class="fadex"></div>
                                            <img src="{{$article->images()->first()->GetUrl(500,500)}}" class="card-img-top img-fluid" alt="...">
                                            <div class="overlay"></div>
                                            <div class="card-body">
                                                <h5 class="card-title text">{{$article->title}}</h5>
                                                <p class="card-text text">{{$article->price}} €</p>
                                                <p class="card-text text">{{$article->category->category}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                           @endforeach
                        <div class="swiper-pagination"></div>
                      </div>

                </div>
        </div>
    </div>
</x-layout>
