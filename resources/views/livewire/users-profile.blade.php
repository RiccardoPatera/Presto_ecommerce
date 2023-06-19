<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">
            <div class="card card-profile pb-5 pt-3 px-2 bg-light mt-3">
                <p class="text-center display-6 mb-0">{{Ucwords($user->name)}}</p>
                <hr class="hr-custom mx-auto">
                <div class="d-flex justify-content-evenly align-items-center">
                    <img src="{{Storage::url($user->img)}}" alt="user_img" class="img-fluid user-img ms-md-5">
                    <div class="ms-4 ms-md-0">
                        <h5 class="me-md-5">Articles Uploaded: {{count($user->articles)}}</h5>
                        <p class="mb-0 fst-italic">{{__('ui.joinedOn')}}: {{substr($user->created_at, 0, 10) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <p class="text-light text-center display-3 mb-3">Articles</p>
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