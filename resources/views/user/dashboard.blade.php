<x-layout>

    <div class="container my-2">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="text-light text-center display-1">Dashboard</h1>
            </div>
        </div>
    </div>

    @if (session('message'))
        <div class="col-12 ">
            <p class="alert alert-success text-center">{{ session('message') }}</p>
        </div>
    @endif
    @if (session('deleted'))
        <div class="col-12 ">
            <p class="alert alert-danger text-center">{{ session('deleted') }}</p>
        </div>
    @endif
    @if (session('edit'))
    <div class="col-12 ">
        <p class="alert alert-warning text-center">{{ session('edit') }}</p>
    </div>
    @endif

    <div class="container-fluid ">
        <div class="row justify-content-between">
            <div class="col-12 col-md-5  d-flex flex-column align-items-center justify-content-center ">
                <div class="card card-detail text-center d-flex justify-content-center p-5 bg-light">
                    <h3 class="text-center  mb-5">{{__('ui.userInfo')}}</h3>
                    @livewire('user-img',compact('user'))
                    <h3>{{Ucwords($user->name)}}</h3>
                    <p class="">{{$user->email}}</p>
                    <hr class="hr-custom">
                    <p class="mb-0">{{__('ui.artUploaded')}}: {{count($user->articles)}}</p>
                    <p class="mb-0">{{__('ui.artRejected')}}: {{count($user->articles->where('is_accepted','===', 0))}}</p>
                    <p class="">{{__('ui.undRev')}}: {{count($user->articles->where('is_accepted', '===', null))}}</p>
                    <p class="fst-italic mb-0">{{__('ui.joinedOn')}}: {{substr($user->created_at, 0, 10) }}</p>
                </div>
            </div>


            <div class="col-12 col-md-7 d-flex flex-column justify-content-center my-lg-0 my-5">
                <h3 class="text-center text-light mb-5">{{__('ui.userArt')}}</h3>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @forelse ($user->articles as $article)
                            <div class="swiper-slide">
                                <div class="card shadowcard">
                                    <a href="{{ route('show_article', compact('article')) }}">
                                        <div class="fadex"></div>
                                        <img src="{{ $article->images()->first()->GetUrl(500, 500) }}"
                                            class="card-img-top img-fluid rounded-card" alt="...">
                                        <div class="card-info ms-3 mt-3">
                                            <p class="text-light fst-italic mb-2">{{ $article->category->category }}</p>
                                            <h5 class="text-light fw-bold text mb-0">{{ $article->title }}</h5>
                                            <p class="text-light fst-italic">{{ $article->price }} €</p>
                                        </div>
                                    </a>
                                    @if ($article->is_accepted === null)

                                        <div class="bg-dark bg-opacity-75 rounded-end position-absolute start-0 bottom-0 pt-1 px-3">
                                            <h6 class="text-under-rewiew text-start mt-1 me-4">{{__('ui.undRev')}}</h6>
                                        </div>

                                    @elseif($article->is_accepted == 1)

                                        <div class="bg-dark bg-opacity-75 rounded-end position-absolute start-0 bottom-0 pt-1 px-3">
                                            <h6 class="text-accepted text-start mt-1 me-4">{{__('ui.accepted')}}</h6>
                                        </div>

                                        <div class="fs-5 text-light position-absolute bottom-0 end-0 translate-middle-x">
                                            <a class="btn bg-dark p-0" href="{{route('edit_article', compact('article'))}}"><i class="fa-solid fa-pencil textEdit bg-opacity-75 rounded-top p-2"></i></a>
                                            <button  class="btn bg-dark p-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-{{$article->id}}"><i class="fa-solid fa-trash textDelete  bg-opacity-75 rounded-top p-2"></i></button>
                                        </div>

                                    @elseif($article->is_accepted == 0)

                                        <div class="bg-dark bg-opacity-75 rounded-end position-absolute start-0 bottom-0 pt-1 px-3">
                                            <h6 class="text-rejected text-start mt-1 me-4">{{__('ui.rejected')}}</h6>
                                        </div>

                                        <div class="fs-5 text-light position-absolute bottom-0 end-0 translate-middle-x z-4">
                                            <a class="btn bg-dark p-0 " href="{{route('edit_article', compact('article'))}}"><i class="fa-solid fa-pencil textEdit bg-opacity-75 rounded-top p-2"></i></a>
                                            <button  class="btn bg-dark p-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-{{$article->id}}"><i class="fa-solid fa-trash textDelete  bg-opacity-75 rounded-top p-2"></i></button>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="col-12  d-flex align-item-center justify-content-center">
                                <h4 class="text-center text-light">{{__('ui.noProdFound')}}</h4>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($user->articles as $article)
        <div class="modal z-5 " id="modal-{{$article->id}}" tabindex="-1" aria-labelledby="Delete Article" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger d-flex justify-content-center">
                        <h1 class="modal-title fs-5" id="Modal-{{$article->id}}-label">{{__('ui.noProdFound')}}</h1>
                    </div>
                    <div class="modal-body text-center">
                    {{__('ui.sureDelArt')}}
                    </div>
                    <div class="modal-footer d-flex justify-content-evenly">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.discard')}}</button>
                        <form method="POST"   action="{{route('delete_article',compact('article'))}}">
                            @csrf
                            @method('delete')
                            <button type='submit' type="button" class="btn btn-danger">{{__('ui.deleteArt')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-layout>
