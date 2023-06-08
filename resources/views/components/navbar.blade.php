<nav class="navbar navbar-expand-lg sticky-top ">
    <div class="container-fluid">
        <a class="navbar-brand fw-semibold logo" href="{{route('welcome')}}">PRESTO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-lg-0" >
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('welcome')}}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('items')}}">Our products</a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('create_article')}}">Create</a>
                </li>
                @endauth

                @auth (Auth::user()->is_revisor)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome {{Auth::user()->name}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Profile</a></li>



                            <li>
                                <a class="dropdown-item" href="{{route('revisor_index')}}">Revisor
                                    <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">
                                         {{App\Models\Article::toBeRevisionedCount()}}
                                    </span>
                                </a>
                            </li>


                            <form id="logoutForm" method="POST" action="{{route('logout')}}">
                            @csrf
                            <a id="logout" class="dropdown-item">Logout</a>
                            </form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Welcome user
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                        </ul>
                    </li>
                @endauth

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>

</nav>

<script>

    let logout = document.querySelector('#logout');
    logout.addEventListener('click', (event)=>{
        event.preventDefault();
        let logoutForm = document.querySelector('#logoutForm');
        logoutForm.submit();
    });

</script>
