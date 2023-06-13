<x-layout>

    <div class="container my-5">
        <div class="row justify-content-center align-items-center">

            @if(session('message'))
                <h3 class="alert alert-success text-center">{{session('message')}}</h3>
            @endif
            {{-- @dd(session('previous_article')) --}}

            @if(session('previous_article'))
                <div class="col-12">
                    <a href="#" id="open-modal"><i class="icon fa-solid fa-arrow-rotate-left fa-2xl" data-bs-toggle="modal" data-bs-target="#Modal"></i></a>
                    <div id="Modal" class="modal fade" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Are you sure you want to restore the article?</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body vh-25 d-flex align-items-end justify-content-end w-100">
                                    <form method='POST' action="{{route('revisor_restore', ['article'=>session('previous_article')])}}">
                                    @csrf
                                    @method('patch')
                                        <button  type='submit' class="btn btn-success">Sure</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($article)
            <div class="col-12 col-md-6 my-3">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($article->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img src={{ Storage::url($image->path) }} class="img-fluid d-block w-100" alt="img">
                            </div>
                        @endforeach
                    </div>  
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-6 my-3">
                <div class="card card-detail  shadow p-3 d-flex justify-content-center bg-light">
                    <h3>{{ $article->title }}</h3>
                    <hr class="hr">
                    <h5>Price: {{ $article->price }}&euro;</h5>
                    <h5>Description: {{ $article->body }}</h5>
                    <p>Category: {{ $article->category->category }}</p>
                    <div class="d-flex w-100 justify-content-center ">
                        <form method='POST' action="{{route('revisor_accept', compact('article'))}}">
                        @csrf
                        @method('patch')
                            <button type='submit' class="btn btn-success m-5">Accept</button>
                        </form>
                        <form method='POST' action="{{route('revisor_reject', compact('article'))}}">
                        @csrf
                        @method('patch')
                            <button type='submit' class="btn btn-danger m-5">Reject</button>
                        </form>
                    </div>
                </div>
            </div>

            @else
            <h1 class="text-white text-center">Review Dashboard</h1>
            <div class="col-12 d-flex flex-column justify-content-center vh-75 align-items-center">
                <div class="d-flex align-items-center justify-content-center flex-column notify mt-3">
                    <h3 class="text-center">No articles to review</h3>
                    <h3 class="text-center"> See you soon <i class="fa-regular fa-face-smile" style="color: #000000;"></i></h3> 
                </div>
            </div>
            @endif

        </div>
    </div>

</x-layout>
