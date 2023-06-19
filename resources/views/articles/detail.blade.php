<x-layout>
    <div class="container-fluid mt-lg-0 mt-5">
        <div class="row ms-md-5 vh-100 align-items-center">
            <div class="col-12 col-md-6">
                <div id="carouselExampleControls" class="carousel slide shadowhite" data-bs-ride="carousel">
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
                        <p class="fst-italic fs-5">{{__('ui.singleCat')}}: {{ $article->category->category }}</p>
                        <p class="fs-5 mb-0 fw-semibold">{{__('ui.desc')}}: {{ $article->body }}</p>
                        <p class="fst-italic textPrice">{{__('ui.price')}}: {{ $article->price }}&euro;</p>
                    </div>
                    {{-- <a class="btn btn-outline-dark" href="#">Add to cart</a> --}}
                    <div class="d-flex mt-4 mb-5">
                        <div class="fs-5">
                            @if ($article->user->id==Auth::id())
                                <a class="btn btnEdit fs-5 p-1 me-5" href="{{route('edit_article', compact('article'))}}"><i class="fa-solid fa-pencil p-2"></i></a>
                                <button class="btn btnDelete fs-5 p-1" type="button" data-bs-toggle="modal" data-bs-target="#modal-{{$article->id}}"><i class="fa-solid fa-trash p-2"></i></button>
                                <a class="btn btn-back fs-5 p-1 ms-5" href="{{route('items')}}"><i class="fa-solid fa-arrow-left p-2"></i></a>
                            @elseif($article->user->id)
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-back fs-5 p-1" href="{{route('items')}}"><i class="fa-solid fa-arrow-left p-2"></i></a>
                                </div>
                            @endif
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
                    <h1 class="modal-title fs-5" id="Modal-{{$article->id}}-label">{{__('ui.deleteArt')}}</h1>
                </div>
                <div class="modal-body text-center">
                {{__('ui.sureDelArt')}}
                </div>
                <div class="modal-footer d-flex justify-content-evenly">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.discard')}}</button>
                    <form method="POST"   action="{{route('delete_article',compact('article'))}}">
                        @csrf
                        @method('delete')
                        <button type='submit' type="button" class="btn btn-danger">{{__('ui.deleteArt')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
