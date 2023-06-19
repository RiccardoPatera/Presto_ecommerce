<div class="container-fluid min-100 ">
    <div class="row justify-content-between ">
        <div class="col-12 d-flex user-info  justify-content-center ">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 class="text-center">{{Ucwords($user->name)}} Articles</h3>
                </div>
                <div class="col-6 d-flex flex-column align-items-center justify-content-center">
                    <img src="{{Storage::url($user->img)}}" alt="user_img" class="img-fluid user-img ">
                </div>
                <div class="col-6 d-flex flex-column align-items-center justify-content-center">
                    <h6 class="">{{count($user->articles)}} Articles Uploaded</h6>
                </div>
            </div>
        </div>


        <div class="col-12  d-flex flex-column justify-content-center user-articles">
            <h3 class="text-center text-light ">User Articles</h3>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @forelse ($user->articles as $article)
                        <div class="swiper-slide">
                            <div class="card">
                                <a href="{{ route('show_article', compact('article')) }}">
                                    <div class="fadex"></div>
                                    <img src="{{ $article->images()->first()->GetUrl(500, 500) }}"
                                        class="card-img-top img-fluid rounded-card" alt="...">
                                    <div class="card-info ms-3 mt-3">
                                        <p class="text-light fst-italic mb-1">{{ $article->category->category }}</p>
                                        <h5 class="text-light fw-bold text mb-1">{{ $article->title }}</h5>
                                        <p class="text-light fst-italic">{{ $article->price }} €</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="col-12  d-flex align-item-center justify-content-center">
                            <h4 class="text-center text-light">No products found</h4>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
