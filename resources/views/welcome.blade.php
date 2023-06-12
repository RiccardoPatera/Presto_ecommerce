@if (session('access.denied'))
        <h3 class="text-center alert alert-danger">{{session('access.denied')}}</h3>
@endif
@if (session('message'))
        <h3 class="text-center alert alert-success">{{session('message')}}</h3>
@endif
<x-layout>
    <div class="container-fluid align-items-center">
        <div class="row ">
            <div class="col-12 header d-flex justify-content-center d-flex">
                {{-- <img src="{{Storage::url('public/media/header.jpg')}}" alt="" class="header"> --}}
                <h1 class="display-1 text-center new ">NEW ARRIVALS</h1>
            </div>
            @foreach ($articles->take(6) as $article)
            <div class="col-12 col-md-4 d-flex justify-content-center my-3">
                <div class="card">
                <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="Img">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->title}}</h5>
                        <p class="card-text">{{$article->price}}</p>
                        <p class="card-text">{{$article->category->category}}</p>
                        <a href="{{route('show_article', compact('article'))}}" class="btn btn-outline-dark">See Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-layout>
