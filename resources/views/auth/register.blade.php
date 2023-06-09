<x-layout>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h1 class="text-center display-1 my-5">Register</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" class="form-control" name="name" id="userName"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="userMail" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="userMail"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>

                    <div class="mb-3">
                        <label for="passwordConfirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control"
                            id="passwordConfirmation">
                    </div>

                    <p>Already Register? <a href="{{route('login')}}">Login Here</a></p>

                    <button type="submit" class="btn btn-outline-dark">Register</button>

                </form>

            </div>
        </div>
    </div>

</x-layout>