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

        <!-- sign up -->
        <div class="whole_page">
            <div class="x-small my-container text-center mb-0" id="contact">
                <h3>Welcome to {{env('APP_NAME')}}</h3>
    
                <div class="text-center">
                    <!-- contact form -->
                     <strong>Sign Up</strong>
                    <div class="col-md-7 mt-3 mb-5 mx-auto bg-light py-3">
    
                        <form action="{{route('createuser')}}" method="post" id="contactform">
                            @csrf
                            <div class="text-start p-3">
                                <label for="name" class="form-label mb-0">Username:</label>
                                <input type="text" placeholder="Username..." id="name" name="username" value="{{old('username')}}" 
                                class="form-control mb-3 @error('username') border-danger @enderror">
                                @error('username')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                                <label for="email" class="form-label mb-0">Email:</label>
                                <input type="text" placeholder="Email..." id="email" name="email" value="{{old('email')}}"
                                class="form-control mb-3 @error('email') border-danger @enderror">
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                                <label for="phone" class="form-label mb-0">Phone:</label>
                                <input type="tel" placeholder="Phone..." id="phone" name="phone" value="{{old('phone')}}"
                                class="form-control mb-3 @error('phone') border-danger @enderror">
                                @error('phone')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                                <label for="password" class="form-label mb-0">Password:</label>
                                <input type="password" placeholder="Password..." id="password" name="password"
                                class="form-control mb-3 @error('password') border-danger @enderror">
                                @error('password')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                        
                                <label for="confirmpassword" class="form-label mb-0">Confirm Password:</label>
                                <input type="password" placeholder="Confirm Password..." class="form-control mb-3 @error('password') border-danger @enderror" id="confirmpassword" name="password_confirmation">
                            </div>
                        
                            <button type="submit" class="btn btn_color w-75">
                                Sign Up
                            </button>
                        </form>
                        
    
                        <p class="mt-3">Already have an account?
                            <a href="{{route('login')}}" class="text-decoration-none">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
