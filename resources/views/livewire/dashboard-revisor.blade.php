<div class="container-fluid ">
    @if(session('message'))
        <div class="col-12 ">
            <h4 class="alert alert-success text-center">{{session('message')}}</h4>
        </div>
    @endif
    @if(count($articles->where('is_accepted','===', null))>0)
        <div class="col-12 ">
            <h4 class="alert alert-info text-center">{{__('ui.newArticleRev')}}
                <a class='ms-2 btn-link mt-2 px-1' href="{{route('revisor_index')}}">GO</a>
            </h4>
        </div>
    @endif
    <div class="col-12 d-flex justify-content-center my-4">
        <h1 class="text-light display-1 text-center">Dashboard {{__('ui.rev')}}</h1>
    </div>

    <div class="row d-flex justify-content-between align-items-center vh-75 my-3">
                {{-- Colonna Dati Revisor --}}
                <div class="col-12 col-md-5">
                    <div class="row justify-content-center mb-5">
                        <div class="col-12">
                            <div class="card card-detail text-center p-5 d-flex justify-content-center bg-light">
                                <h3 class="text-center mb-5">{{__('ui.rev')}} Info</h3>
                                @livewire('user-img',compact('user'))
                                <h3>{{Ucwords($user->name)}}</h3>
                                <p>{{$user->email}}</p>
                                <hr class="hr">
                                <p class="mb-0">{{__('ui.artReviewed')}}: {{count($articles)}}</p>
                                <p class="mb-0">{{__('ui.artRejected')}}: {{count($articles->where('is_accepted','===', 0))}}</p>
                                <p>{{__('ui.artToBeReviewed')}}: {{count($articles->where('is_accepted','===', null))}}</p>
                                <p class="mb-0 fst-italic">{{__('ui.joinedOn')}}: {{$user->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>


        {{-- Colonna Articoli Revisionati se presenti --}}
        @if (count($articles->where('revisored_by',$this->user->id))>0)
            <div class="col-12 col-md-7">
                <div class="row align-items-center ">
                    <div class="col-12">
                        <h3 class="text-white text-center mb-5">{{__('ui.artReviewed')}}</h3>
                    </div>
                    <div class="col-12 ">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($articles->where('revisored_by',$this->user->id) as $article)
                                <div class="swiper-slide">
                                    <a href="{{route('show_article',compact('article'))}}" class="">
                                        <div class="card shadow">
                                            <div class="fadex">
                                            </div>
                                            <img src="{{$article->images()->first()->GetUrl(500,500)}}" class="card-img-top img-fluid rounded-card" alt="...">
                                                <div class="card-body">
                                                    <p class="card-text text-light text mb-1">{{$article->category->category}}</p>
                                                    <h5 class="card-title text-light text">{{$article->title}}</h5>
                                                    <p class="card-text text-light text mb-2">{{$article->price}} €</p>
                                                    <a href="{{route('users_articles',['user'=>$article->user])}}" class="z-3 w-100">
                                                        <h6 class="fst-italic text-light z-4">Created by: {{Ucwords($article->user->name)}}</h6>
                                                    </a>
                                                    @if($article->is_accepted===NULL)
                                                        <div class="bg-dark rounded">
                                                            <h6 class="text-light text-center p-1 mt-1">{{__('ui.undRev')}}</h6>
                                                        </div>
                                                    @elseif($article->is_accepted==1)
                                                        <div class="bg-success rounded">
                                                            <h6 class="text-light text-center p-1 mt-1">{{__('ui.accepted')}}</h6>
                                                        </div>
                                                    @elseif($article->is_accepted==0)
                                                        <div class="bg-danger rounded">
                                                            <h6 class="text-light text-center p-1 mt-1">{{__('ui.rejected')}}</h6>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center">
                                                <form wire:submit.prevent='review({{$article}})'>
                                                    <button class="btn-sendRewiew rounded"><h6 class="mt-2">{{__('ui.sendRev')}}</h6></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
                </div>

        </div>




        {{-- Colonna Articoli revisionati in caso di 0 articoli revisionati --}}
        @else
            <div class="col-12 col-md-6">
                <div class="row   justify-content-center vh-50">
                    <div class="col-12">
                        <h2 class="text-white text-center">Articles reviewed</h2>
                    </div>
                    <div class="col-12">
                        <h4 class="text-light text-center">No products revisored</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif









