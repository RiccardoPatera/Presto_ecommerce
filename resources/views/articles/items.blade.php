<x-layout>
    <div class="container-fluid">
        <div class="row pt-5">
            <div class="col-12">
                <h1 class="text-center my-2 pt-3"> Our Products </h1>
            </div>
            <h4 class="text-center">{{$articles->total()}} results </h4>
            @forelse ($articles as $article)
        <div class="col-12 col-md-6 d-flex justify-content-center my-4">
            <div class="card">
                <img src="{{Storage::url($article->img)}}" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->price}}</p>
                    <p class="card-text">{{$article->category->category}}</p>
                    <a href="{{route('show_article',compact('article'))}}" class="btn btn-outline-dark">See Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 d-flex justify-content-center my-4">
            <h3 class="alert ">No articles found, try with a different search</h3>
        </div>
        @endforelse
            <div class="col-12 d-flex justify-content-center mt-5">{{$articles->links()}}</div>
</x-layout>
