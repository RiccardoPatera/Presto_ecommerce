<div>
    <div class="container-fluid my-2">
        <div class="row justify-content-center">
            <div class="col-10 bg-black my-5" >
                <div class="dropdown">
                    <form wire:submit.prevent="filterByCategory">
                        <select name="category" wire:model="category" class="btn">
                            <option value="0">
                                All Categories
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">
                                    {{$category->category}}
                                </option>

                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-secondary">Cerca</button>
                    </form>





                    {{-- <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item text-dark category"   wire:click='filterByCategory' wire:model="category" value="{{$category->id}}">{{$category->category}} </a></li>
                        @endforeach
                    </ul> --}}
                </div>
            </div>






                @foreach ($articles as $article)
                <div class="col-12 col-md-6 d-flex justify-content-center">
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
