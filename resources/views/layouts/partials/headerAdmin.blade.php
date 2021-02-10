<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-4 col-lg-2  px-3" href="{{ url('/') }}">
    <img class="d-inline-block align-top" src="/images/icon.png" alt="NIUFP" height="120px">
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3 col-lg-3 col-md-4">
    <h1 style="color:white;">Admin Dashboard</h1>
  </ul>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="{{ route('logout') }}">Sign out</a>
    </li>
  </ul>
</header>