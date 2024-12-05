<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="whole_page pb-5">
        <!-- header -->
        <div class="container-fluid sticky-top head">
            <div class="row head align-items-center">
                <div class="name col-2 text-white ms-2 ps-5">
                    <h1>
                        <a href="{{route('home')}}" class="text-decoration-none text-light">{{ env('APP_NAME') }} </a>
                    </h1>
                </div>
                <div class="sections col-9">
                    @auth
                        <form action="{{route('userlogout')}}" method="post">
                            @csrf
                            <button class="btn btn-danger">Logout</button>
                        </form>
                    @endauth

                    @guest
                        
                    <li>
                        <a href="{{route('usersignupform')}}" class="btn btn-primary">Sign Up</a>
                    </li>
                    <li>
                        <a href="{{route('userloginform')}}" class="btn btn-primary">Login</a>
                    </li>
                    @endguest
                </div>
            </div>
        </div>
        <!-- Welcome -->
        @guest
        <div class="my-container">
            <div class="welcome-container text-center text-white p-5">
                <h3>Welcome to {{ env('APP_NAME') }}</h3>
                <p>Here, you can create an account, display your projects and discover the profiles of others</p>
                <div class="d-flex justify-content-center">
                    <a href="{{route('usersignupform')}}" class="btn btn_color me-4">Sign Up</a>
                    <a href="{{route('userloginform')}}" class="btn btn_color">Login</a>
                </div>
            </div>
        </div>
        @endguest
        <!-- Welcome -->
        <div class="my-container">
            {{$slot}}
        </div>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
