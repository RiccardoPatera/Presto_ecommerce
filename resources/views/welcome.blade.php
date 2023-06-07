<x-layout>
    <div class="container-fluid">
        <div class="row ">
            @foreach ($articles as $article)
            <div class="col-12 col-md-4 d-flex justify-content-center my-3">
                    <div class="card">
                        <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->price}}</p>
                        <p class="card-text">{{$article->category_id}}</p>
                        <a href="{{route('show_article', compact('article'))}}" class="btn btn-primary">Go somewhere</a>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
</x-layout>
