<x-layout>
    <div class="container-fluid py-5">
        <div class="row d-flex justify-content-between">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="text-light text-center">
                Dashboard
                </h1>
            </div>

            <div class="row">
                @if(session('message'))
                    <div class="col-12 ">
                        <p class="alert alert-success text-center  ">{{session('message')}}</p>
                    </div>
                @endif
                <div class="col-12 col-md-6 my-5 vh-50">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="text-white text-center">User info</h2>
                        </div>
                        <div class="col-9 my-3">
                            <div class="card card-detail  shadow p-5 d-flex justify-content-center bg-light ">
                                <h3>{{Ucwords($user->name)}}</h3>
                                <p>{{$user->email}}</p>
                                <hr class="hr">
                                <h5>Articols uploaded: {{count($user->articles)}}</h5>
                                <h5>Articles rejected: {{count($user->articles->where('is_accepted',0))}}</h5>
                                <h5>Articles under review: {{count($user->articles->where('is_accepted',null))}}</h5>

                                <h5>Iscritto il: {{$user->created_at }}</h5>
                                {{-- <a class="btn btn-outline-dark" href="#">Add to cart</a> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 my-5 vh-50">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-white text-center"> User Articles</h2>
                        </div>
                        <div class="col-12">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($user->articles as $article)
                                    <div class="swiper-slide">
                                            <a href="{{route('show_article',compact('article'))}}" class="">
                                                <div class="card shadow">
                                                    <div class="fadex"></div>
                                                    <img src="{{$article->images()->first()->GetUrl(500,500)}}" class="card-img-top img-fluid" alt="...">
                                                    <div class="overlay"></div>
                                                    <div class="card-body">
                                                        <h5 class="card-title text">{{$article->title}}</h5>
                                                        <p class="card-text text">{{$article->price}} €</p>
                                                        <p class="card-text text">{{$article->category->category}}</p>
                                                        @if($article->is_accepted===NULL)
                                                        <div class="bg-dark rounded">
                                                            <h6 class="text-light text-center mt-1">Under review</h6>
                                                        </div>
                                                        @elseif($article->is_accepted==1)
                                                            <div class="bg-success rounded">
                                                                <h6 class="text-light text-center mt-1">Accepted</h6>
                                                            </div>
                                                        @elseif($article->is_accepted==0)
                                                        <div class="bg-danger rounded">
                                                            <h6 class="text-light text-center mt-1">Rejected</h6>
                                                        </div>

                                                        @endif
                                                    </div>
                                                </div>
                                            </a>
                                    </div>
                                   @endforeach
                                <div class="swiper-pagination"></div>
                              </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>
