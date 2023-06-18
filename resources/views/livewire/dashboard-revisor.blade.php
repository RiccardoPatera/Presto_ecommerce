<div class="container-fluid ">
    @if(session('message'))
        <div class="col-12 ">
            <h4 class="alert alert-success text-center  ">{{session('message')}}</h4>
        </div>
    @endif
    @if(count($articles->where('is_accepted','===', null))>0)
        <div class="col-12 ">
            <h4 class="alert alert-info text-center">{{__('ui.newArticleRev')}}
                <a  class='ms-3 btn-link mt-2' href="{{route('revisor_index')}}">GO</a>
            </h4>
        </div>
    @endif
    <div class="col-12 d-flex justify-content-center my-4">
        <h1 class="text-light text-center">Dashboard {{__('ui.rev')}}</h1>
    </div>

    <div class="row d-flex justify-content-between align-items-center  vh-75 my-3">
                {{-- Colonna Dati Revisor --}}
                <div class="col-12 col-md-6  ">
                    <div class="row justify-content-center ">
                        <div class="col-12">
                            <div class="card card-detail  shadow p-5 d-flex justify-content-center bg-light rounded shadow ">
                                <h2 class=" text-center">{{__('ui.rev')}} Info</h2>
                                @livewire('user-img',compact('user'))
                                <h3>{{Ucwords($user->name)}}</h3>
                                <p>{{$user->email}}</p>
                                <hr class="hr">
                                <h5>{{__('ui.artReviewed')}}: {{count($articles)}}</h5>
                                <h5>{{__('ui.artRejected')}}: {{count($articles->where('is_accepted','===', 0))}}</h5>
                                <h5>{{__('ui.artToBeReviewed')}}: {{count($articles->where('is_accepted','===', null))}}</h5>
                                <h5>{{__('ui.joinedOn')}}: {{$user->created_at }}</h5>
                            </div>
                        </div>
                    </div>
                </div>


        {{-- Colonna Articoli Revisionati se presenti --}}
        @if (count($articles->where('revisored_by',$this->user->id))>0)
            <div class="col-12 col-md-6  ">
                <div class="row align-items-center ">
                    <div class="col-12">
                        <h2 class="text-white text-center">{{__('ui.artReviewed')}}</h2>
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
                                            <div class="overlay">
                                            </div>
                                                <div class="card-body">
                                                    <h5 class="card-title text">{{$article->title}}</h5>
                                                    <p class="card-text text">{{$article->price}} €</p>
                                                    <p class="card-text text">{{$article->category->category}}</p>
                                                    @if($article->is_accepted===NULL)
                                                        <div class="bg-dark rounded">
                                                            <h6 class="text-light text-center mt-1">{{__('ui.undRev')}}</h6>
                                                        </div>
                                                    @elseif($article->is_accepted==1)
                                                        <div class="bg-success rounded">
                                                            <h6 class="text-light text-center mt-1">{{__('ui.accepted')}}</h6>
                                                        </div>
                                                    @elseif($article->is_accepted==0)
                                                        <div class="bg-danger rounded">
                                                            <h6 class="text-light text-center mt-1">{{__('ui.rejected')}}</h6>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center">
                                                <form wire:submit.prevent='review({{$article}})'>
                                                <button class="btn-link  "><h6 class="mt-1">{{__('ui.sendRev')}}</h6></button>
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









