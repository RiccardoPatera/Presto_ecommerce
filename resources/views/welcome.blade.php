@if (session('access.denied'))
        <h3 class="text-center alert alert-danger">{{session('access.denied')}}</h3>
@endif
@if (session('message'))
        <h3 class="text-center alert alert-success">{{session('message')}}</h3>
@endif
<x-layout>
    
    <div class="container-fluid align-items-center">
        <div class="row">

            <div class="col-12 justify-content-end d-flex">
                <p class="textcustom">Codeartisans.</p>
            </div>

            <div class="col-12 header d-flex align-items-center d-flex flex-column">
                <div class="col-12 align-items-end d-flex divcustom">
                    <p class="textcustom">Elevate Your Style with Timeless Luxury.</p>
                </div>
                <div class="col-12 justify-content-center d-flex">
                    <h1 class=" text-center new">presto</h1>
                </div>
            </div>
            @foreach ($articles->take(6) as $article)
            <div class="col-12 col-md-4 d-flex justify-content-center my-3">
                <div class="card">
                    <div class="fadex"></div>
                        <a href="{{route('show_article', compact('article'))}}" class="">
                            <img src="{{Storage::url($article->img)}}" class="card-img-top img-fluid" alt="Img">
                            <div class=" overlay">
                            </div>
                        <div class="card-body">
                        <h5 class="card-title text">{{$article->title}}</h5>
                        <p class="card-text text">{{$article->price}}</p>
                        <p class="card-text text">{{$article->category->category}}</p>

                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>
