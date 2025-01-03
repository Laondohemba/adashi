<div class="d-flex justify-content-between">
  <h3>Welcome back 👋🏿 {{ ucwords(auth()->user()->username) }}</h3>
  <p>Account Balance: <strong>&#8358; {{ number_format(auth()->user()->account_balance, 2) }} </strong></p>
</div>
<nav class="navbar navbar-expand-lg bg-body-tertiary display-6">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('userdashboard')}}">Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link" href="{{route('user.showGroups')}}">Groups</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('deposits.create')}}">Deposit</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('user.contribution')}}">Contributions</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('user.payments')}}">Payments</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Withdrawal</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>