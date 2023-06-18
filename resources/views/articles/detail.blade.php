<x-layout>

    <div>
        <p class="mb-0 text-center fs-1 text-light borderBottom">Detail</p>
        <h1 class="display-1 text-center text-light">{{$article->title}}</h1>
    </div>

    <div class="container-fluid vh-100 mt-100">
        <div class="row ms-md-5">
            <div class="col-12 col-md-6">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner carousel">
                        @foreach ($article->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img src={{$image->getUrl(500,500) }} class="img-fluid d-block w-100" alt="img">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('ui.prev')}}</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">{{__('ui.next')}}</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-md-5 d-flex align-items-center mt-5">
                <div class="card-detailProduct d-flex flex-column align-items-center justify-content-center">
                    <div class="text-start mt-5">
                        <h3>{{ $article->title }}</h3>
                        <hr class="hr">
                        <p class="fst-italic fs-5">Category: {{ $article->category->category }}</p>
                        <p class="fs-5 mb-0 fw-semibold">Description: {{ $article->body }}</p>
                        <p class="fst-italic textPrice">Price: {{ $article->price }}&euro;</p>
                    </div>
                    {{-- <a class="btn btn-outline-dark" href="#">Add to cart</a> --}}
                    <div class="d-flex mt-4 mb-5">
                        <div class="fs-5">
                            <a class="btn btnEdit fs-5 p-1 me-5" href="{{route('edit_article', compact('article'))}}"><i class="fa-solid fa-pencil p-2"></i></a>
                            <button class="btn btnDelete fs-5 p-1" type="button" data-bs-toggle="modal" data-bs-target="#modal-{{$article->id}}"><i class="fa-solid fa-trash p-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-layout>

@foreach ($article->user->articles as $article)
    <div class="modal z-5 " id="modal-{{$article->id}}" tabindex="-1" aria-labelledby="Delete Article" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger d-flex justify-content-center">
                    <h1 class="modal-title fs-5" id="Modal-{{$article->id}}-label">Delete Article</h1>
                </div>
                <div class="modal-body text-center">
                    You are about to delete your article, are you sure?
                </div>
                <div class="modal-footer d-flex justify-content-evenly">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                    <form method="POST"   action="{{route('delete_article',compact('article'))}}">
                        @csrf
                        @method('delete')
                        <button type='submit' type="button" class="btn btn-danger">Delete Article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach