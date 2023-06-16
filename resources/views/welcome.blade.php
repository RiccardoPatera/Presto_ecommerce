@if (session('access.denied'))
        <h3 class="text-center alert alert-danger">{{session('access.denied')}}</h3>
@endif
@if (session('message'))
        <h3 class="text-center alert alert-success">{{session('message')}}</h3>
@endif

<x-layout>
{{-- LOGO --}}
    <div class="container-fluid align-items-center ">
        <div class="row p-0 m-0 b-0 opacity-0" id='container-home' >

            <div class="col-12 justify-content-end align-items-start d-flex " id='slogan'>
                <p class="textcustom d-none d-xl-block">DISCOVER TREASURES FROM THE PAST, ANEW.</p>
            </div>

            <div class="col-12 header d-flex align-items-center d-flex flex-column ">
                <div class="col-12 d-flex align-items-end divcustom mt-5 mt-lg-0 " id='slogan2'>
                    <p class="textcustom ms-5 text-center pads">Elevate Your Style with Timeless Luxury.</p>
                </div>
                <div class="col-12 d-flex align-items-center d-flex flex-column ">
                <div class="col-12 d-flex align-items-end copy mt-5 mt-lg-0 ">
                    <p class="d-none d-xl-block pads">Codeartisans 2023 ©</p>

                </div>
                <div class="col-12 justify-content-center d-flex p-0 " id="logo">

                    <h1 class="new mb-5">presto</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- VISION  --}}

                <div class="container underlogo align-items-center justify-content-center d-flex opacity-0 mb-5 "  id="ourvision"  >
                    <div class="row justify-content-center" >

                            <div class="col-12 col-md-6 text-light under">
                                <h2>{{__('ui.ourv')}}</h2>

                            </div>
                            <div class="col-12 col-md-6 text-light under1 " id="ourv-obs-point" >
                                <p>{{__('ui.ourvision')}}</p>

                            </div>
                    </div>
                </div>
{{-- ARRIVALS/CARD  --}}

                <div class="container-fluid align-items-center pt-5">
                    <div class="row">
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
                                    <img src="{{$article->images()->first()->GetUrl(500,500)}}" class="card-img-top img-fluid rounded-bottom" alt="...">
                                    <div class="overlay rounded-end">
                                        <p class="text-card ms-3">{{$article->price}} €</p>
                                        <h6 class="fst-italic ms-3">Created by: {{Ucwords($article->user->name)}}</h6>
                                    </div>
                                    <div class="card-body ">
                                        <p class="card-text text fst-italic text-light mb-2">{{$article->category->category}}</p>
                                <h5 class="card-title text-light text fw-bold">{{$article->title}}</h5>
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
