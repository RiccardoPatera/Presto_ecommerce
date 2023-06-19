<x-layout>

    <div class="container">
        <div class="row justify-content-center min-vh-100 align-items-center ">


            <div class="col-12 col-md-6 rounded bg-light p-5">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <h1 class="text-center display-1 mb-5 mt-3">{{__('ui.register')}}</h1>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="userName" class="form-label">{{__('ui.user')}}</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="userName"
                                aria-describedby="emailHelp">
                        </div>
                        @error('name')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="userMail" class="form-label ">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="userMail"
                                aria-describedby="emailHelp">
                        </div>

                        @error('email')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="password" class="form-label ">{{__('ui.password')}}</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                        </div>

                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="passwordConfirmation" class="form-label ">{{__('ui.confPass')}}</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"
                                id="passwordConfirmation">
                        </div>

                        @error('password')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror


                        <p>{{__('ui.alrReg')}} <a href="{{route('login')}}" class="text-dark ">{{__('ui.hereLog')}}</a></p>

                        <button type="submit" class="btn btn-dark mb-5">{{__('ui.register')}}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-layout>
