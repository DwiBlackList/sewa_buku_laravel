<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:void(0)">Sewa Buku</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('data_peminjam.index') }}">Data Peminjam</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('peminjaman.index') }}">Transaksi Peminjaman</a>
        </li>
        <li class="nav-item">
          
          <form action="{{ route('logout') }}" id="logout-form" method="post"> @csrf
            <a href="{{ route('logout') }}" class="btn btn-outline-danger" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
          </form>
        </li>
      </ul>
      <div>
        <marquee behavior="" direction="">
          @if(Auth::check())
          <b>{{ 'Halo, '. Auth::user()->name }}</b>
          @else
            <script>window.location = "/login";</script>
          @endif
        </marquee>
      </div>
      <form class="d-flex">
        <input class="form-control me-2" type="text" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
      </form>
    </div>
  </div>
</nav>