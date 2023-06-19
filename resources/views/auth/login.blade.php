<x-layout>

        <div class="container">
            <div class="row justify-content-center align-items-center vh-100  ">

                <div class="col-12 p-5 col-md-4 user rounded bg-light ">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center display-1 mb-5 mt-3 ">{{__('ui.login')}}</h1>
                        </div>
                        <div class="col-12">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="userMail" class="form-label ">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="userMail" aria-describedby="emailHelp">
                                </div>

                                @error('email')
                                    <div class="alert alert-danger">{{__('ui.reqEmail')}}</div>
                                @enderror

                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password">
                                </div>

                                @error('password')
                                <div class="alert alert-danger">{{__('ui.reqPass')}}</div>
                                @enderror



                                <p class=" ">{{__('ui.notReg')}} <a href="{{route('register')}}" class="text-black">{{__('ui.hereReg')}}</a></p>

                                <button type="submit" class="btn btn-dark">{{__('ui.login')}}</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



</x-layout>
