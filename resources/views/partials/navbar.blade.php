<!-- <header class="navbar navbar-light">
  <div class="container-xl">

    <div class="navbar-nav flex-row ms-auto">

      <div class="nav-item me-3">
        Welcome, {{ auth()->user()->name ?? 'Admin' }}
      </div>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-danger btn-sm">Logout</button>
      </form>

    </div>

  </div>
</header> -->