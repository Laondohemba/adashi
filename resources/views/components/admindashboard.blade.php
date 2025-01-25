<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- google fonts link --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
    .sidebar-toggler {
        position: fixed !important;
        top: 40px !important;
        width: fit-content;

    }
    .sidebar {
        position: fixed !important;
        top: 100px !important;
    }
    .content {
        min-height: 100vh;
        overflow-y: auto;
    }
    @media(max-width:550px){
        .sidebar{
            padding: 0 !important;
            max-height: fit-content !important;
        }
        .content{
            min-width: 100%;
        }
    }
</style>

<body>
    <div class="whole_page pb-5">
        <!-- header -->
        <div class="container-fluid sticky-top head">
            <div class="row head align-items-center">
                <div class="name col-2 text-white ms-2 ps-5">
                    <h1>
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-decoration-none text-light">{{ env('APP_NAME') }} </a>
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
        <div class="container-fluid" style="margin-top: 50px">
            <div class="row">
                    <!-- Sidebar Toggler -->
                    <button class="btn btn-secondary d-md-none my-3 sidebar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                        aria-label="Toggle navigation">
                        Menu &#8594;
                    </button>
                <!-- Sidebar -->
                <nav class="col-4 col-lg-2 bg-light py-5 d-md-block collapse sidebar" id="sidebarMenu">

                    <div class="sticky-top d-md-block collapse" id="sidebarMenu">
                        <ul class="nav flex-column ps-2">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
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
                                <a class="nav-link" href="{{ route('deposits.index') }}">Deposits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.payments') }}">Payments</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.interests') }}">Interests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Withdrawals</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Main Content -->
                <main class="col-8 ms-sm-auto col-lg-10 px-md-4 content">
                    <h3>Welcome back 👋🏿 {{ auth('admin')->user()->username }}</h3>
                    <div class="my-container">
                        {{ $slot }}
                    </div>
                </main>

            </div>
        </div>






    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
