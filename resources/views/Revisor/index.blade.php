<x-layout>
    <div class="container my-5">
        <div class="row">
            @if(session('message'))
                <h3 class="alert alert-success">{{session('message')}}</h3>
            @endif

            @if ($article)
            <div class="col-12 col-md-6 my-3">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src={{ Storage::url($article->img) }} class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src={{ Storage::url($article->img) }} class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src={{ Storage::url($article->img) }} class="d-block w-100" alt="...">
                        </div>
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
                <div class="card card-detail  shadow p-3 d-flex justify-content-center ">
                    <h3>{{ $article->title }}</h3>
                    <hr class="hr">
                    <h5>Price: {{ $article->price }}&euro;</h5>
                    <h5>Description: {{ $article->body }}</h5>
                    <p>Category: {{ $article->category->category }}</p>
                    <div class="d-flex w-100 justify-content-center ">
                    <form  method='POST' action="{{route('revisor_accept', compact('article'))}}">
                        @csrf
                        @method('patch')
                        <button type='submit' class="btn btn-success m-5" >Accetta articolo</button>
                    </form>
                    <form method='POST' action="{{route('revisor_reject', compact('article'))}}">
                        @csrf
                        @method('patch')
                        <button type='submit' class="btn btn-danger m-5">Rifiuta articolo</button>
                    </form>
                    </div>
                </div>
            </div>
            @else
            <h2 class="text-center">Nessun Prodotto da revisionare</h2>
            @endif
        </div>
    </div>
</x-layout>
