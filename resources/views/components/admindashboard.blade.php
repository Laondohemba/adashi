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
    <div class="whole_page pb-5">
        <!-- header -->
        <div class="container-fluid sticky-top head">
            <div class="row head align-items-center">
                <div class="name col-2 text-white ms-2 ps-5">
                    <h1>
                        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-light">{{ env('APP_NAME') }} </a>
                    </h1>
                </div>
                <div class="sections col-9">
                    @if (auth('admin')->user())
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-sm">Logout</button>
                        </form>
                    @else
                        <li>
                            <a href="{{ route('usersignupform') }}" class="btn btn-primary btn-sm">Sign Up</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
                        </li>
                    @endif
                </div>
            </div>
        </div>
        {{-- dashboard --}}
        <div class="my-container">
          <h3>Welcome back 👋🏿 {{ auth('admin')->user()->username }}</h3>
          <nav class="navbar navbar-expand-lg bg-body-tertiary display-6">
              <div class="container-fluid">
                  <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Dashboard</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('showgroups') }}">Groups</a>
                        </li>
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('creategroup') }}">Create group</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.contribution') }}">Contributions</a>
                        </li>
  
                          <li class="nav-item">
                              <a class="nav-link" href="#">Users</a>
                          </li>
  
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('deposits.index') }}">Deposits</a>
                          </li>

                          <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.payments') }}">Payments</a>
                        </li>
  
                          <li class="nav-item">
                              <a class="nav-link" href="#">Withdrawals</a>
                          </li>
                          
                      </ul>
                  </div>
              </div>
          </nav>
        </div>
        <div class="my-container" style="min-height: 100vh">
            {{ $slot }}
        </div>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
