<nav class="navbar navbar-expand-lg sticky-top  nav-custom">
    <div class="container-fluid">
        <div class="logo-div">
        <a class="navbar-brand fw-semibold logo text-white" href="{{route('welcome')}}">prst</a>
        </div>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fa-solid fa-bars icon"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-lg-0" >

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('items')}}">{{__('ui.allArticles')}}</a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('create_article')}}">{{__('ui.create')}}</a>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{__('ui.welcome')}} {{ucwords(Auth::user()->name)}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('user_dashboard',['user'=>Auth::user() ])}}">{{__('ui.prof')}}</a></li>
                    @if(Auth::user()->is_revisor)
                        <li>
                            <a class="dropdown-item" href="{{route('revisor_index')}}">{{__('ui.rev')}}
                                <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{App\Models\Article::toBeRevisionedCount()}}
                                </span>
                            </a>
                        </li>
                    @endif

                        <form id="logoutForm" method="POST" action="{{route('logout')}}">
                        @csrf
                        <a id="logout" class="dropdown-item">Logout</a>
                        </form>
                    </ul>
                </li>

                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white " href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{__('ui.welcome')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('register')}}">{{__('ui.register')}}</a></li>
                        <li><a class="dropdown-item" href="{{route('login')}}">{{__('ui.login')}}</a></li>
                    </ul>
                </li>
                @endauth


                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{route('become_revisor')}}">{{__('ui.work')}}</a>
                        </li>

                        <div class="d-flex">
                        <li class="nav-item">
                            <x-_locale lang="it"/>
                        </li>

                        <li class="nav-item">
                            <x-_locale lang="en"/>
                        </li>

                        <li class="nav-item">
                            <x-_locale lang="es"/>
                        </li>
                        </div>
            </ul>

            {{-- <button id="search" class="btn btn-light"><i class="fa-solid fa-magnifying-glass"></i></button> --}}


            <livewire:search-bar />


        </div>
    </div>

</nav>

{{-- LOGICA DEL CONTAINER-SEARCH --}}
{{-- <div id="megaContainer" class="fixed-top d-none">
    <livewire:search-collaps />
</div> --}}



{{-- // LOGICA DEL CONTAINER-SEARCH

    // let btnIsClicked = false;
    // let search = document.querySelector('#search');
    // let megaContainer = document.querySelector('#megaContainer');

    // search.addEventListener('click', ()=>{

    // if (btnIsClicked == false) {
    //     megaContainer.classList.remove('d-none');
    //     btnIsClicked = true
    // } else {
    //     megaContainer.classList.add('d-none');
    //     btnIsClicked = false
    // }


    // }); --}}

