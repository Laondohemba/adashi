<h3>Welcome back 👋🏿 {{auth()->user()->username}}</h3>
<nav class="navbar navbar-expand-lg bg-body-tertiary display-6">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('showgroups')}}">Groups</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="{{route('creategroup')}}">Create group</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Users</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Deposits</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Withdrawals</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>