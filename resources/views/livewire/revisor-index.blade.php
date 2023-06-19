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
<div class="container  p-2 pm-md-0 min-100 ">
    <div class="row  justify-content-center">
        <div class="col-12 d-flex justify-content-center">
            <h1 class=" text-light display-1">{{__('ui.revDash')}}</h1>
        </div>
        <div class="col-md-4 col-6 d-flex justify-content-center ">
            <h5 class="text-nowrap text-light">{{count($articles)}} {{__('ui.artReview')}}</h5>
        </div>
    </div>
    <div class="row  justify-content-center justify-content-lg-between   align-items-center  ">

        {{-- Colonna Google API --}}
        <div class=" col-12 col-lg-3  bg-white rounded  revisor-card  p-3 my-2 my-lg-0">
            <h5 class="tc-accent  text-dark text-center">Tags</h5>
            <div class="row justify-content-start flex-column justify-content-between p-2">
                <div class="col-12">
                    <div class="row  f">
                        @foreach ($article->images as $image )
                            @if(isset($image->labels))
                                @foreach ($image->labels as $label)
                                <div class="tag col-3 m-1  mt-2  ">
                                <p class="text-light  ">{{$label}}</p>
                                </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="row flex-row flex-md-column">
                        <h5 class=" tc-accent  text-center">{{__('ui.revImg')}}</h5>
                        <div class="col-4 d-flex">
                            <p class="text-nowrap">{{__('ui.adulti')}} <span class="{{$image->adult}}"></span></p>
                        </div>
                        <div class="col-4 d-flex ">
                            <p class="text-nowrap">{{__('ui.satira')}} <span class="{{$image->spoof}}"></span></p>
                        </div>
                        <div class="col-4 d-flex">
                            <p class="text-nowrap">{{__('ui.medicina')}} <span class="{{$image->medical}}"></span></p>
                        </div>
                        <div class="col-4 d-flex">
                            <p class="text-nowrap">{{__('ui.violenza')}} <span class="{{$image->violence}}"></span></p>
                        </div>
                        <div class="col-4 d-flex">
                            <p class="text-nowrap">{{__('ui.contAmmi')}} <span class="{{$image->racy}}"></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



            {{-- Colonna Foto Articolo --}}
            <div class="col-11  col-lg-5 revisor-card p-3 rounded d-flex justify-content-center  my-2 my-lg-0">
                    <div id="carouselExampleControls" class="carousel slide  " data-bs-ride="carousel">
                        <div class="carousel-inner  ">
                            @foreach ($article->images as $image)
                                <div class="carousel-item @if($loop->first) active @endif padimage">
                                    <img src={{$image->getUrl(500,500)}} class="img-fluid d-block w-100 " alt="img">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev  " type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{__('ui.prev')}}</span>
                        </button>
                        <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">{{__('ui.next')}}</span>
                        </button>
                    </div>
            </div>



            {{-- Container Accett/Rifiuta Prodotto --}}
            <div class="col-lg-3 col-12  revisor-card rounded shadow p-3 bg-light my-5 my-lg-0 ">
                <div class="row">
                    <h3>{{ $article->title }}</h3>
                    <hr class="hr">
                    <h5>{{__('ui.price')}}: {{ $article->price }}&euro;</h5>
                    <h5>{{__('ui.desc')}}: {{ $article->body }}</h5>
                    <p>{{__('ui.singleCat')}}: {{ $article->category->category }}</p>
                    <div class="col-12  d-flex justify-content-center ">
                        <form wire:submit.prevent='accept_article' class=" d-flex justify-content-center">
                            <button type='submit' class="btn btn-success m-5" >{{__('ui.accept')}}</button>
                        </form>
                        <form wire:submit.prevent="reject_article" class="d-flex justify-content-center">
                            <button type='submit' class="btn btn-danger m-5">{{__('ui.reject')}}</button>
                    </div>
                        @error('tips')
                            <p class="text-danger"></p>
                        @enderror

                        <label  class='form-label my-2' for="tips">{{__('ui.prodReq')}}</label>
                        <textarea  id="tips" wire:model="tips" cols="30" rows="4" class="form-control  shadow @error('tips') is-invalid @enderror"></textarea>
                    </form>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center mb-3 ">
                <h5 class="text-center text-light "> {{__('ui.revDecision')}}
                    <a  href={{route('user_dashboard',compact('user'))}} class=" my-2 my-lg-0 text-light">Dashboard </a>
                </h5>
            </div>
        </div>
    </div>


@else
<div class="container-fluid ">
    <div class="row  align-items-center min-100 ">
        <div class="col-12">
            <h1 class="text-white text-center">{{__('ui.revDash')}}</h1>
        </div>
        <div class="col-12">
                <div class="col-12 d-flex  flex-column justify-content-center  align-items-center ">
                    <div class="d-flex align-items-center justify-content-center flex-column notify mt-3">
                        <h3 class="text-center">{{__('ui.noRevArt')}}</h3>
                        <h3 class="text-center"> {{__('ui.seeSoon')}} <i class="fa-regular fa-face-smile" style="color: #000000;"></i></h3>
                    </div>
                </div>
        </div>



        <div class="col-12 d-flex justify-content-center ">
            <h5 class="text-center text-light "> {{__('ui.revDecision')}}
                <a  href={{route('user_dashboard',compact('user'))}} class="text-light my-2 my-lg-0">Dashboard </a>
            </h5>
        </div>


    </div>
</div>
@endif
