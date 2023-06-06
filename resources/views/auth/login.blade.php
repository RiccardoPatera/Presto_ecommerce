<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center display-1 my-5">Fai il login</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
            
                    <div class="mb-3">
                        <label for="userMail" class="form-label">Inserisci email</label>
                        <input type="email" class="form-control" name="email" id="userMail" aria-describedby="emailHelp">
                    </div>
            
                    <div class="mb-3">
                        <label for="password" class="form-label">Inserisci password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
            
                    <button type="submit" class="btn btn-primary">Login</button>
            
                </form>
            </div>
        </div>
    </div>

</x-layout>
