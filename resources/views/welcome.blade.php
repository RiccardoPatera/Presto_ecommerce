<x-layout>
<<<<<<< HEAD

    <div class="container-fluid">
        <div class="row ">
            <div class="col-12 bg-black d-flex justify-content-center ">
                <img src="{{Storage::url('public/media/header.webp')}}" alt="" class="header">
=======
    <div class="container-fluid align-items-center">
        <div class="row ">
            <div class="col-12 bg-black d-flex justify-content-center d-flex">
                {{-- <img src="{{Storage::url('public/media/header.jpg')}}" alt="" class="header"> --}}
                <h1 class="display-1 text-center new ">NEW ARRIVALS</h1>
>>>>>>> 7e2b1b8a7ed4619cb008f98c042b24bd6093bfef
            </div>
            @foreach ($articles as $article)
            <div class="col-12 col-md-4 d-flex justify-content-center my-3">
                <div class="card">
                <img src="{{Storage::url($article->img)}}" class="card-img-top" alt="...">
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