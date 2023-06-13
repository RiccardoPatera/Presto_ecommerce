@if (session('access.denied'))
        <h3 class="text-center alert alert-danger">{{session('access.denied')}}</h3>
@endif
@if (session('message'))
        <h3 class="text-center alert alert-success">{{session('message')}}</h3>
@endif

<x-layout>

    <div class="container-fluid align-items-center">
        <div class="row ">

            <div class="col-12 justify-content-end align-items-start d-flex">
                <p class="textcustom">Codeartisans.</p>
            </div>

            <div class="col-12 header d-flex align-items-center d-flex flex-column">
                <div class="col-12 d-flex align-items-end divcustom mt-5 mt-lg-0 ">
                    <p class="textcustom ms-5 ">Elevate Your Style with Timeless Luxury.</p>
                </div>
                <div class="col-12 justify-content-center d-flex p-0">
                    <h1 class=" new mb-5">presto</h1>
                </div>
            </div>
                <div class="col-12 col-md-3 d-flex justify-content-center mt-5 ">
                    <h2 class="title-text">{{__('ui.new')}}</h2>
                </div>
            <div class="col-md-9 col-12">
                <div class="row">
                    @foreach ($articles->take(6) as $article)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 d-flex justify-content-center my-4">
                        <a href="{{route('show_article',compact('article'))}}" class="">
                            <div class="card shadow">
                                <div class="fadex"></div>
                                <img src="{{$article->images()->first()->GetUrl(500,500)}}" class="card-img-top img-fluid" alt="...">
                                <div class=" overlay"></div>
                                <div class="card-body ">
                                    <h5 class="card-title text">{{$article->title}}</h5>
                                    <p class="card-text text">{{$article->price}}€</p>
                                    <p class="card-text text">{{$article->category->category}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-layout>
