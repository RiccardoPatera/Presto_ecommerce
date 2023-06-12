<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center display-1 my-5 text-light">Login</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="userMail" class="form-label text-light">Email</label>
                        <input type="email" class="form-control" name="email" id="userMail" aria-describedby="emailHelp">
                    </div>


                    <div class="mb-3">
                        <label for="password" class="form-label text-light">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror



                    <p class=" text-light">Not Register? <a href="{{route('register')}}" class=" text-light">Register Here</a></p>

                    <button type="submit" class="btn btn-outline-dark text-light">Login</button>

                </form>
            </div>
        </div>
    </div>

</x-layout>
