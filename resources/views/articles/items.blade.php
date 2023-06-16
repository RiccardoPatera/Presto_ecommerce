<x-layout>
    <div class="container-fluid">
        <div class="row pt-5">
            @if(session('message'))
                    <div class="col-12 ">
                        <p class="alert alert-danger text-center  ">{{session('message')}}</p>
                    </div>
                @endif
            <div class="col-12">
                <h1 class="text-center my-2 text-white "> {{__('ui.allArticles')}} </h1>
            </div>
            @if(count($articles)==1)
                <h4 class="text-center text-white">{{$articles->total()}} Result </h4>
            @else
                <h4 class="text-center text-white">{{$articles->total()}} {{__('ui.results')}} </h4>
            @endif
            @forelse ($articles as $article)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center my-4">
                    <a href="{{route('show_article',compact('article'))}}" class="">
                        <div class="card">
                            <div class="fadex"></div>
                            <img src="{{$article->images()->first()->GetUrl(500,500)}}" class="card-img-top img-fluid rounded-bottom" alt="...">
                            <div class="overlay rounded-end">
                                <p class="text-card ms-3">{{$article->price}} €</p>
                                <h6 class="fst-italic ms-3">Created by: {{Ucwords($article->user->name)}}</h6>
                            </div>
                            <div class="card-body">
                                <p class="card-text text fst-italic text-light mb-2">{{$article->category->category}}</p>
                                <h5 class="card-title text-light text fw-bold">{{$article->title}}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 d-flex justify-content-center my-4">
                    <h3 class="alert text-white">{{__('ui.noArt')}}</h3>
                </div>
            @endforelse
            <div class="col-12 d-flex justify-content-center mt-5">{{$articles->links()}}</div>
        </div>
    </div>
</x-layout>
