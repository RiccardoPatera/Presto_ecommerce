@if(session('accepted'))
    <div class="col-12 alert alert-success">
        <h4 class="text-center">{{session('accepted')}}</h4>
    </div>
@elseif (session('rejected'))
<div class="col-12 alert alert-danger">
    <h4 class="text-center">{{session('rejected')}}</h4>
</div>
@endif
@if(!empty($article))
<div class="container">
    <div class="row mt-2">
        <div class="col-12 ">
            <h1 class="text-center text-light">Review Zone</h1>
        </div>
    </div>
    <div class="row p-5 align-items-center justify-content-center my-2">

        {{-- Colonna Google API --}}
        <div class="col-md-3 col-12 border-end text-dark bg-white rounded  revisor-card  p-3">
            <h5 class="tc-accent mt-3 text-dark text-center">Tags</h5>
            <div class="row justify-content-center">
                @if ($article->images)
                    @foreach ($article->images as $image )
                        @foreach ($image->labels as $label)
                        <div class="tag col-3 m-1 mt-2  ">
                        <p class="text-light text-nowrap mt-2">{{$label}}</p>
                        </div>
                        @endforeach
                    @endforeach
                @endif
            </div>
            <div class="row ">
                <h5 class=" tc-accent mt-5 text-center">Revisione Immagini</h5>
                <div class="col-4 d-flex">
                    <p class="text-nowrap">Adulti: <span class="{{$image->adult}}"></span></p>
                </div>
                <div class="col-4 d-flex ">
                    <p class="text-nowrap">Satira: <span class="{{$image->spoof}}"></span></p>
                </div>
                <div class="col-4 d-flex">
                    <p class="text-nowrap">Medicina: <span class="{{$image->medical}}"></span></p>
                </div>
                <div class="col-4 d-flex">
                    <p class="text-nowrap">Violenza: <span class="{{$image->violence}}"></span></p>
                </div>
                <div class="col-4 d-flex">
                    <p class="text-nowrap">Contenuto ammiccante: <span class="{{$image->racy}}"></span></p>
                </div>
            </div>

    </div>



            {{-- Colonna Foto Articolo --}}
            <div class="col-12 col-md-6   rounded d-flex align-items-center justify-content-center ">
                <div id="carouselExampleControls" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($article->images as $image)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <img src={{$image->getUrl(500,500)}} class="img-fluid d-block w-100" alt="img">
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



            {{-- Container Accett/Rifiuta Prodotto --}}
            <div class="col-12 col-md-3 revisor-card rounded shadow p-3 bg-light">
                <div class="row">
                    <h3>{{ $article->title }}</h3>
                    <hr class="hr">
                    <h5>{{__('ui.price')}}: {{ $article->price }}&euro;</h5>
                    <h5>{{__('ui.desc')}}: {{ $article->body }}</h5>
                    <p>{{__('ui.singleCat')}}: {{ $article->category->category }}</p>
                    <div class="col-12  d-flex justify-content-center">
                        <form wire:submit.prevent='accept_article' class=" d-flex justify-content-center">
                            <button type='submit' class="btn btn-success m-5" >{{__('ui.accept')}}</button>
                        </form>
                        <form wire:submit.prevent="reject_article" class="d-flex justify-content-center">
                            <button type='submit' class="btn btn-danger m-5">{{__('ui.reject')}}</button>
                    </div>
                        @error('tips')
                            <p class="text-danger"></p>
                        @enderror

                        <label  class='form-label my-2' for="tips">Explain why the product doesn't meet the requirements</label>
                        <textarea  id="tips" wire:model="tips" cols="30" rows="3" class="form-control  shadow @error('tips') is-invalid @enderror"></textarea>
                    </form>
                </div>
            </div>
    </div>

@else
    <div class="col-12">
        <h1 class="text-white text-center">{{__('ui.revDash')}}</h1>
            <div class="col-12 d-flex  flex-column justify-content-center vh-75 align-items-center ">
                <div class="d-flex align-items-center justify-content-center flex-column notify mt-3">
                <h3 class="text-center">{{__('ui.noRevArt')}}</h3>
                <h3 class="text-center"> {{__('ui.seeSoon')}} <i class="fa-regular fa-face-smile" style="color: #000000;"></i></h3>
                </div>
            </div>
    </div>
@endif


<div class="col-12 d-flex justify-content-center ">
    <h3 class="text-center text-light mb-"> To review your decisions go to your
        <a  href={{route('user_dashboard',compact('user'))}} class="btn-link">Dashboard </a>
    </h3>
</div>

</div>
