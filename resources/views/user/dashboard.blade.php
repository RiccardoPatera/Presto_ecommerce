<x-layout>
    <div class="container-fluid py-5">
        <div class="row d-flex justify-content-between">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="text-light text-center">Dashboard</h1>
            </div>

            <div class="row">
                @if (session('message'))
                    <div class="col-12 ">
                        <p class="alert alert-success text-center">{{ session('message') }}</p>
                    </div>
                @endif
                <div class="col-12 col-md-6 my-5 vh-50">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h2 class="text-white text-center">User info</h2>
                        </div>
                        <div class="col-9 my-3">
                            <div class="card card-detail  shadow p-5 d-flex justify-content-center bg-light ">

                                <h3>{{ Ucwords($user->name) }}</h3>
                                <p>{{ $user->email }}</p>
                                <hr class="hr">

                                <h5>Articols uploaded: {{ count($user->articles) }}</h5>
                                <h5>Articles accepted: {{ count($user->articles->where('is_accepted', 1)) }}</h5>
                                <h5>Iscritto il: {{ $user->created_at }}</h5>
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
                                    @forelse ($user->articles as $article)
                                        <div class="swiper-slide">
                                            <a class="" href="{{ route('show_article', compact('article')) }}">
                                                <div class="card">
                                                    <div class="fadex-2"></div>
                                                    <img src="{{ $article->images()->first()->GetUrl(500, 500) }}"
                                                        class="card-img-top img-fluid " alt="...">
                                                    <div class="card-info">
                                                        <p class="text-light fst-italic mb-2">{{ $article->category->category }}</p>
                                                        <h5 class="text-light fw-bold text mb-0">{{ $article->title }}</h5>
                                                        <p class="text-light fst-italic">{{ $article->price }} €</p>
                                                    </div>

                                                    @if ($article->is_accepted === null)

                                                        <div class="bg-dark bg-opacity-75 rounded-end position-absolute start-0 bottom-0 pt-1 px-3">
                                                            <h6 class="text-under-rewiew text-start mt-1 me-4">Under review</h6>
                                                        </div>

                                                    @elseif($article->is_accepted == 1)

                                                        <div class="bg-dark bg-opacity-75 rounded-end position-absolute start-0 bottom-0 pt-1 px-3">
                                                            <h6 class="text-accepted text-start mt-1 me-4">Accepted</h6>
                                                        </div>

                                                        {{-- Edit-Delete --}}
                                                        <div class="fs-5 text-light position-absolute bottom-0 end-0 translate-middle-x">
                                                            <button class="btn bg-dark p-0" href="{{route('edit_article', compact('article'))}}"><i class="fa-solid fa-pencil textEdit bg-opacity-75 rounded-top p-2"></i></button>
                                                            <button class="btn bg-dark p-0" href=""><i class="fa-solid fa-trash textDelete  bg-opacity-75 rounded-top p-2"></i></button>
                                                        </div>

                                                    @elseif($article->is_accepted == 0)
                                                        
                                                        <div class="bg-dark bg-opacity-75 rounded-end position-absolute start-0 bottom-0 pt-1 px-3">
                                                            <h6 class="text-rejected text-start mt-1 me-4">Rejected</h6>
                                                        </div>

                                                        {{-- Edit-Delete --}}
                                                        <div class="fs-5 text-light position-absolute bottom-0 end-0 translate-middle-x">
                                                            <button class="btn bg-dark p-0" href="{{route('edit_article', compact('article'))}}"><i class="fa-solid fa-pencil textEdit bg-opacity-75 rounded-top p-2"></i></button>
                                                            <button class="btn bg-dark p-0" href=""><i class="fa-solid fa-trash textDelete  bg-opacity-75 rounded-top p-2"></i></button>
                                                        </div>
                                                    @endif

                                                </div>
                                            </a>
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
            </div>
        </div>
    </div>
</x-layout>
