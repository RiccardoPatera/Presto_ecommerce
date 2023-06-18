<div class="container-fluid ">
    @if(session('message'))
        <div class="col-12 ">
            <h4 class="alert alert-success text-center  ">{{session('message')}}</h4>
        </div>
    @endif
    @if(count($articles->where('is_accepted','===', null))>0)
        <div class="col-12 ">
            <h4 class="alert alert-info text-center">There are new articles to review!
                <a  class='ms-3 btn-link mt-2' href="{{route('revisor_index')}}">GO</a>
            </h4>
        </div>
    @endif
    <div class="col-12 d-flex justify-content-center my-4">
        <h1 class="text-light text-center">Dashboard revisor</h1>
    </div>

    <div class="row d-flex justify-content-between align-items-center  vh-75 my-3">
                {{-- Colonna Dati Revisor --}}
                <div class="col-12 col-md-6  ">
                    <div class="row justify-content-center ">
                        <div class="col-12">
                            <div class="card card-detail  shadow p-5 d-flex justify-content-center bg-light rounded shadow ">
                                <h2 class=" text-center">Revisor info</h2>
                                @livewire('user-img',compact('user'))
                                <h3>{{Ucwords($user->name)}}</h3>
                                <p>{{$user->email}}</p>
                                <hr class="hr">
                                <h5>Articols Reviewed: {{count($articles)}}</h5>
                                <h5>Articles Rejected: {{count($articles->where('is_accepted','===', 0))}}</h5>
                                <h5>Articles to be reviewed: {{count($articles->where('is_accepted','===', null))}}</h5>
                                <h5>Iscritto il: {{$user->created_at }}</h5>
                            </div>
                        </div>
                    </div>
                </div>


        {{-- Colonna Articoli Revisionati se presenti --}}
        @if (count($articles->where('revisored_by',$this->user->id))>0)
            <div class="col-12 col-md-6  ">
                <div class="row align-items-center ">
                    <div class="col-12">
                        <h2 class="text-white text-center">Articles reviewed</h2>
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
                                            <img src="{{$article->images()->first()->GetUrl(500,500)}}" class="card-img-top img-fluid" alt="...">
                                                <div class="card-body">
                                                    <h5 class="card-title text">{{$article->title}}</h5>
                                                    <p class="card-text text">{{$article->price}} €</p>
                                                    <p class="card-text text">{{$article->category->category}}</p>
                                                    <a href="{{route('users_articles',['user'=>$article->user])}}" class="z-3 w-100">
                                                        <h6 class="fst-italic  z-4">Created by: {{Ucwords($article->user->name)}}</h6>
                                                    </a>
                                                    @if($article->is_accepted===NULL)
                                                        <div class="bg-dark rounded">
                                                            <h6 class="text-light text-center mt-1">Under review</h6>
                                                        </div>
                                                    @elseif($article->is_accepted==1)
                                                        <div class="bg-success rounded">
                                                            <h6 class="text-light text-center mt-1">Accepted</h6>
                                                        </div>
                                                    @elseif($article->is_accepted==0)
                                                        <div class="bg-danger rounded">
                                                            <h6 class="text-light text-center mt-1">Rejected</h6>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center">
                                                <form wire:submit.prevent='review({{$article}})'>
                                                <button class="btn-link  "><h6 class="mt-1">Send to review</h6></button>
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









