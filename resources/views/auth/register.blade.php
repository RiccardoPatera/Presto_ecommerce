<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="text-center display-1 my-5 text-light">{{__('ui.register')}}</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="userName" class="form-label text-light">{{__('ui.user')}}</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="userName"
                            aria-describedby="emailHelp">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="userMail" class="form-label text-light">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="userMail"
                            aria-describedby="emailHelp">
                    </div>

                    @error('email')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="password" class="form-label text-light">{{__('ui.password')}}</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    </div>

                    @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="passwordConfirmation" class="form-label text-light">{{__('ui.confPass')}}</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"
                            id="passwordConfirmation">
                    </div>

                    @error('password')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    

                    <p class=" text-light">Already Register? <a href="{{route('login')}}" class=" text-light">Login Here</a></p>

                    <button type="submit" class="btn btn-log">Register</button>

                </form>

            </div>
        </div>
    </div>

</x-layout>
