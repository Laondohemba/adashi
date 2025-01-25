<div class="d-flex justify-content-between">

{{-- dashboard --}}
<div class="container-fluid" style="margin-top: 50px">
    <div class="row">
        <!-- Sidebar Toggler -->
        <button class="btn btn-secondary d-md-none my-3 sidebar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            Menu &#8594;
        </button>
        <!-- Sidebar -->
        <nav class="col-4 col-lg-2 bg-light py-5 d-md-block collapse sidebar" id="sidebarMenu">

            <div class="sticky-top d-md-block collapse" id="sidebarMenu">
                <ul class="nav flex-column ps-2">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('userdashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.showGroups') }}">Groups</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('deposits.create') }}">Deposit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.contribution') }}">Contributions</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.payments') }}">Payments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Withdrawals</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-8 ms-sm-auto col-lg-10 px-md-4 content">
            <div class="my-container">

                <h3>Welcome back 👋🏿 {{ ucwords(auth()->user()->username) }}</h3>
                <p>Account Balance: <strong>&#8358; {{ number_format(auth()->user()->account_balance, 2) }} </strong>
                </p>
                {{ $slot }}
            </div>
        </main>

    </div>
</div>
