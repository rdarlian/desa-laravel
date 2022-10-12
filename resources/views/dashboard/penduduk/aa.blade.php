@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Penduduk</h1>
  </div>
<div class="container pt-lg-2 navbar-nav-scroll">
    <table id="myTable" class="table table-bordered table-striped table-hover">

        <thead>
            <tr>
                <th>No</th>
                <th>NIK <i class="fa fa-sort fa-sm"></i></a></th>
                <th>Nama <i class="fa fa-sort fa-sm"></i></a></th>
                <th>No. KK <i class="fa fa-sort fa-sm"></i></a></th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>E-mail </th>
                <th>Alamat</th>
                <th>Dusun</th>
                <th>Status</th>
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Tanggal Lapor</th>
                <th>Action </th>
            </tr>
        </thead>

        <tbody>


              {{-- <td>
                <a href="/dashboard/penduduks/{{ $penduduk->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/penduduks/{{ $penduduk->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/penduduks/{{ $penduduk->slug }}" method="penduduk" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus data sekarang ?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr> --}}
        </tbody>
    </table>
</div>
</div>
@endsection
