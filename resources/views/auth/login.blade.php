<x-layout>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center display-1 my-5 text-light">{{__('ui.login')}}</h1>
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
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="userMail" aria-describedby="emailHelp">
                    </div>

                    @error('email')
                        <div class="alert alert-danger">{{__('ui.reqEmail')}}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="password" class="form-label text-light">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                    </div>

                    @error('password')
                    <div class="alert alert-danger">{{__('ui.reqPass')}}</div>
                    @enderror



                    <p class=" text-light">{{__('ui.notReg')}} <a href="{{route('register')}}" class=" text-light">{{__('ui.hereReg')}}</a></p>

                    <button type="submit" class="btn btn-log">{{__('ui.login')}}</button>

                </form>
            </div>
        </div>
    </div>

</x-layout>
