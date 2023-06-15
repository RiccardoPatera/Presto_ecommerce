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
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center text-light">Review Dashboard</h1>
        </div>
        
                


            <div class="col-12 col-md-4 my-3">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
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

        <div class="col-12 col-md-4 my-3">
            <div class="card card-detail  shadow p-3 d-flex justify-content-center bg-light">
                <h3>{{ $article->title }}</h3>
                <hr class="hr">
                <h5>{{__('ui.price')}}: {{ $article->price }}&euro;</h5>
                <h5>{{__('ui.desc')}}: {{ $article->body }}</h5>
                <p>{{__('ui.singleCat')}}: {{ $article->category->category }}</p>
                <div class="col-12 d-flex">
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
                    <textarea  id="tips" wire:model="tips" cols="30" rows="8" class="form-control  shadow @error('tips') is-invalid @enderror"></textarea>
                </form>
            </div>
        </div>
        <div class="col-md-3 border-end text-dark bg-white">
                    <h5 class="tc-accent mt-3 text-dark">Tags</h5>
                    <div class="p-2">
                        @if ($image->labels)
                            @foreach ($image->labels as $label)
                                 <p class="d-inline">{{$label}}</p>
                            @endforeach
                         @endif
        
                        <h5 class="tc-accent mt-5">Revisione Immagini</h5>
                        <p>Adulti: <span class="{{$image->adult}}"></span></p>
                        <p>Satira: <span class="{{$image->spoof}}"></span></p>
                        <p>Medicina: <span class="{{$image->medical}}"></span></p>
                        <p>Violenza: <span class="{{$image->violence}}"></span></p>
                        <p>Contenuto ammiccante: <span class="{{$image->racy}}"></span></p>
                    </div>
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


<div class="col-12 d-flex justify-content-center">
    <h3 class="text-center text-light"> To review your decisions go to your Profile</h3>
    <a  href={{route('user_dashboard',compact('user'))}} class="btn-custom btn-light mt-1 ms-2"><h6>Go</h6> </a>
</div>
