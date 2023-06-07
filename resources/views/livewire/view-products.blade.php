<div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-10 bg-black my-3" >
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item text-dark category" wire:model='{{$category->id}}'>{{$category->category}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>






                @foreach ($articles as $article)
                <div class="col-12 col-md-6 d-flex justify-content-center my-4">
                    <div class="card">
                        <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->price}}</p>
                        <p class="card-text">{{$article->category_id}}</p>
                        <a href="{{route('show_article',['id'=>$article->id])}}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
                @endforeach

        </div>
    </div>
</div>
