<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="whole_page py-5" style="min-height: 100vh;">
        <div class="container">
            <div class="row">

                <div class="col-5 form-signin w-50 mx-auto bg-light p-5">
                    <form class="text-center" method="POST" action="{{route('userlogin')}}">
                      @csrf
                        <h3>Welcome back</h3>
                        <strong>Users sign in</strong>

                        <div class="form-floating my-2">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Username"
                                name="username">
                            <label for="floatingInput">Username</label>
                        </div>
                        @error('username')
                          <p class="text-danger">
                            {{$message}}
                          </p>
                        @enderror
                        
                        <div class="form-floating my-2">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        @error('username')
                        <p class="text-danger">
                          {{$message}}
                        </p>
                      @enderror

                        <div class="col-12 mt-2">
                          <div class="form-check d-flex">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label ms-2" for="remember">
                              Remember me
                            </label>
                          </div>
                        </div>
                        @error('loginfailed')
                          <p class="text-danger">
                            {{$message}}
                          </p>
                        @enderror
                        <button class="w-100 btn btn_color mt-4" type="submit">Login</button>

                        <p class="mt-5">Don't have an account?
                            <a href="{{ route('usersignupform') }}" class="text-decoration-none">Sign Up</a>
                        </p>
                    </form>

                  </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
