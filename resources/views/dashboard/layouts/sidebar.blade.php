<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard"><span data-feather="home"></span>Dashboard
          </a>
        </li>
        @can('admin')

        <li class="nav-item">
            <a class="nav-link" id="myDropdown" display="none" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="true">
                <span data-feather="archive"></span>
                Tampilan Utama
                <span data-feather="chevron-down"></span>
            </a>
            <div class="collapse  {{ Request::is('dashboard/pelayanan*') || Request::is('dashboard/posts*') || Request::is('dashboard/download') || Request::is('dashboard/categories*') ? 'show' : ''}}"id="dashboard-collapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                    <li class="dropdown-item">
                        <a class="link-dark rounded nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts"><span data-feather="file-text"></span>Berita</a>
                    </li>
                    <li class="nav-item dropdown-item">
                        <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
                            <span data-feather="grid"></span>Kategori Berita</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="link-dark rounded nav-link {{ Request::is('dashboard/download') ? 'active' : '' }}" href="/dashboard/download"><span data-feather="file-text"></span>Download File</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="link-dark rounded nav-link {{ Request::is('dashboard/perangkat') ? 'active' : '' }}" href="/dashboard/perangkat"><span data-feather="file-text"></span>Perangkat Desa</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="nav-link {{ Request::is('dashboard/galery*') ? 'active' : '' }}" href="/dashboard/galery">
                                <span data-feather="grid"></span>
                            Galery
                        </a>
                    </li>
                    <!-- <li class="dropdown-item">
                        <a class="nav-link {{ Request::is('dashboard/pelayanan*') ? 'active' : '' }}" href="/dashboard/pelayanan">
                            <span data-feather="mail"></span>
                            Pelayanan
                        </a>
                    </li> -->
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                <span data-feather="file-text"></span>
                My Posts
            </a>
        </li> --}}
        
    </ul>
    

      {{-- @can('admin') --}}

      {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrator</span>
      </h6> --}}

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#dashboardd" aria-expanded="true">
                    <span data-feather="user"></span>
                    Penduduk
                    <span data-feather="chevron-down"></span>

                </a>
                <div class="collapse  {{ Request::is('dashboard/penduduk') || Request::is('dashboard/penduduk/create') ? 'show' : '' }}" id="dashboardd">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 ">
                        <li class="dropdown-item">
                            <a class="link-dark rounded nav-link {{ Request::is('dashboard/penduduk') ? 'active' : '' }}" href="/dashboard/penduduk"><span data-feather="users"></span>Data Penduduk</a>
                        </li>
                        <li class="dropdown-item">
                            <a class="link-dark rounded nav-link {{ Request::is('dashboard/penduduk/create') ? 'active' : '' }}" href="/dashboard/penduduk/create"><span data-feather="user-plus"></span>Tambah Penduduk</a>
                        </li>
                    </ul>
                  </div>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
                    <span data-feather="grid"></span>
                    User
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#doksur" aria-expanded="true">
                    <span data-feather="book"></span>
                        Dokumen Surat
                    <span data-feather="chevron-down"></span>

                </a>
                <div class="collapse  {{ Request::is('dashboard/penduduk') || Request::is('dashboard/penduduk/create') ? 'show' : '' }}" id="doksur">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-2 ">
                        <li class="dropdown-item">
                            <a class="link-dark rounded nav-link {{ Request::is('dashboard/layanan*') ? 'active' : '' }}" href="/dashboard/layanan">
                                <span data-feather="airplay"></span>
                                Layanan
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a class="link-dark rounded nav nav-link {{ Request::is('dashboard/syaratsurat*') ? 'active' : '' }}" href="/dashboard/syaratsurat">
                                <span data-feather="airplay"></span>
                                Daftar Persyaratan
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a class="link-dark rounded nav nav-link {{ Request::is('dashboard/suratmasuk*') ? 'active' : '' }}" href="/dashboard/suratmasuk">
                                <span data-feather="airplay"></span>
                                Permintaan Masuk
                            </a>
                        </li>

                    </ul>
                  </div>
            </li>
            @endcan
            <li class="nav-item">
                <a class="link-dark rounded nav-link {{ Request::is('dashboard/layananmandiri*') ? 'active' : '' }}" href="/dashboard/layananmandiri">
                    <span data-feather="airplay"></span>
                    Layanan Mandiri
                </a>
            </li>

        </ul>
    </div>
  </nav>
