<div class="container-fluid py-5">
    <div class="row d-flex justify-content-between">
        <div class="col-12 d-flex justify-content-center">
            <h1 class="text-light text-center">Dashboard revisor</h1>
        </div>
            @if(session('message'))
                <div class="col-12 ">
                    <h4 class="alert alert-success text-center  ">{{session('message')}}</h4>
                </div>
            @endif
            @if(count($articles->where('is_accepted','===', null))>0)
            <div class="col-12  mt-5 ">
                <h4 class="alert alert-info text-center">There are new articles to review!
                    <a  class='ms-3 btn-link mt-2' href="{{route('revisor_index')}}">GO</a>
                </h4>

            </div>
            @endif

            <div class="col-12 col-md-6 my-3 vh-50 ">
                <div class="row justify-content-center ">
                    <div class="col-12">
                        <div class="card card-detail  shadow p-5 d-flex justify-content-center bg-light rounded shadow ">
                            <h2 class=" text-center">Revisor info</h2>

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

            <div class="col-12 col-md-6 my-3 vh-50">
                <div class="row align-items-center ">
                    <div class="col-12">
                        <h2 class="text-white text-center">Articles reviewed</h2>
                    </div>
                    <div class="col-12">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @forelse ($articles->where('revisored_by',$this->user->id) as $article)
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
                                                <button class="btn-custom btn-light "><h6>Send to review</h6></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                    </div>
                    @empty
                        <div class="col-12 vh-50   d-flex align-item-center justify-content-center">
                            <h4 class="text-center text-light">No products revisored</h4>
                        </div>
                    @endforelse

                </div>
            </div>

    </div>
</div>
