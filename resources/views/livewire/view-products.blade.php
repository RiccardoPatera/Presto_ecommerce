<div class="container-fluid my-2">
    <div class="row justify-content-center">
        <div class="col-10 my-5">
            <div class="category-search">
                <form wire:submit.prevent="filterByCategory">
                    <div class="d-flex">
                        <select name="category" wire:model="category" class="form-select me-2">
                            <option value="0">
                                All Categories
                            </option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->category}}
                            </option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-outline-dark">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- @if (session()->has('message'))
            <div class="alert alert-dark">
                {{ session('message') }}
            </div>
        @endif --}}
        <!--
        @foreach ($articles as $article)
        <div class="col-12 col-md-6 d-flex justify-content-center my-4">
            <div class="card">
                <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->price}}</p>
                    <p class="card-text">{{$article->category->category}}</p>
                    <a href="{{route('show_article',compact('article'))}}" class="btn btn-outline-dark">See Detail</a>
                </div>
            </div>
        </div>
        @endforeach
        -->
        
        @forelse ($articles as $article)
        <div class="col-12 col-md-6 d-flex justify-content-center my-4">
            <div class="card">
                <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$article->title}}</h5>
                    <p class="card-text">{{$article->price}}</p>
                    <p class="card-text">{{$article->category->category}}</p>
                    <a href="{{route('show_article',compact('article'))}}" class="btn btn-outline-dark">See Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning py-3 shadow">
                <p class="lead">Non ci sono annunci per questa ricerca. Prova a cambiare.
            </div>
        </div>
        @endforelse
    </div>
</div>