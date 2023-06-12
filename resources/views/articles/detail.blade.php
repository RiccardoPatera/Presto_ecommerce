<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6 my-3">


                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src={{ Storage::url($article->img) }} class="d-block w-100" alt="img">
                        </div>
                        <div class="carousel-item">
                            <img src={{ Storage::url($article->img) }} class="d-block w-100" alt="img">
                        </div>
                        <div class="carousel-item">
                            <img src={{ Storage::url($article->img) }} class="d-block w-100" alt="img">
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
                    <a class="btn btn-outline-dark" href="#">Add to cart</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>
