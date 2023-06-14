<x-layout>
    <div class="container-fluid">
        <div class="row d-flex justify-content-between">
            <div class="col-12 d-flex justify-content-center">
                <h1 class="text-light text-center">
                    Personal Profile
            </div>
                </h1>
                <div class="col-12 col-md-6 my-5 vh-50">
                    <div class="card card-detail  shadow p-3 d-flex justify-content-center bg-light ">
                        <h3>{{$user->name }}</h3>
                        <p>Email registrazione {{ $user->mail}}</p>
                        <hr class="hr">
                        <h5>Articoli caricati {{count($user->articles)}}</h5>
                        <h5>Iscritto il: {{$user->created_at }}</h5>
                        {{-- <a class="btn btn-outline-dark" href="#">Add to cart</a> --}}
                    </div>
                </div>
        </div>
    </div>
</x-layout>
