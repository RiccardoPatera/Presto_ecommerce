<x-layout>
    <div class="container-fluid min-100">
        <div class="row pt-5">
            @if(session('message'))
                    <div class="col-12 ">
                        <p class="alert alert-danger text-center">{{session('message')}}</p>
                    </div>
                @endif
            <div class="col-12">
                <h1 class="text-center my-2 text-white display-1"> {{__('ui.allArticles')}} </h1>
            </div>
            @if(count($articles)==1)
                <h4 class="text-center text-white">{{$articles->total()}} {{__('ui.results')}} </h4>
            @else
                <p class="text-center text-white mb-4 fs-4 fst-italic">{{$articles->total()}} {{__('ui.results')}} </p>
            @endif
            @forelse ($articles as $article)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center my-4">
                    <a href="{{route('show_article',compact('article'))}}" class="">
                        <div class="card">
                            <div class="fadex"></div>
                            <img src="{{$article->images()->first()->GetUrl(500,500)}}" class="card-img-top-welcome img-fluid rounded-card" alt="...">
                            <div class="overlay rounded-end">
                                <p class="text-card text-light ms-3">{{$article->price}} €</p>
                                <a href="{{route('users_articles',['user'=>$article->user])}}" class="z-3 w-100">
                                    <p class="fst-italic ms-3 z-4 text-light">{{__('ui.createby')}} {{Ucwords($article->user->name)}}</p>
                                </a>
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
