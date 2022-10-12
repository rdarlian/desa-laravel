<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('img/pasuruan.png') }}" width="35px" class="me-0 item-center" alt="">Desa Kepulungan</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($active === "home") ? 'active' : '' }}"  href="/">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link {{ ($active === "profil") ? 'active' : '' }}" href="/profil">Desa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "perangkat") ? 'active' : '' }}" href="/perangkat">Perangkat Desa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "galery") ? 'active' : '' }}" href="/galery">Galery</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle  {{ ($active === "pelayanan*") ? 'active' : '' }}" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Pelayanan
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item {{ ($active === "pelayanan*") ? 'active' : '' }}" href="/pelayanan/ktp">KTP</a></li>
              <li><a class="dropdown-item {{ ($active === "pelayanan*") ? 'active' : '' }}" href="/pelayanan/kk">KK</a></li>
              <li><a class="dropdown-item {{ ($active === "pelayanan*") ? 'active' : '' }}" href="/pelayanan/suratkematian">Surat Kematian</a></li>
              <li><a class="dropdown-item {{ ($active === "pelayanan*") ? 'active' : '' }}" href="/pelayanan/aktekelahiran">Akte Kelahiran</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#" >Lainnya</a></li>
            </ul>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link {{ ($active === "Pelayanan") ? 'active' : '' }}" href="/pelayanan">Pelayanan</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">KTP</a></li>
                <li><a class="dropdown-item" href="#">KK</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
          </li> --}}

          <li class="nav-item">
            <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Kategori</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($active === "download") ? 'active' : '' }}" href="/download">Download</a>
          </li>

        </ul>
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf

                            <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                        </form>
                    </ul>
                </li>
            @else


                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
            @endauth
        </ul>
      </div>
    </div>
  </nav>
