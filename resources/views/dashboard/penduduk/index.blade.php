@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Penduduk</h1>
  </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>

@endif
<a href="/dashboard/penduduk/create" class="btn btn-primary mb-3">Tambah Penduduk</a>
<div class="table-responsive-md">
    <table class="table table-bordered table-striped table-hover">

        <thead class="bg-gray disabled color-palette">
            <tr>
                <th>No</th>
                <th>NIK <i class="fa fa-sort fa-sm"></i></a></th>
                <th>Nama <i class="fa fa-sort fa-sm"></i></a></th>
                <th>No. KK <i class="fa fa-sort fa-sm"></i></a></th>
                <!-- tambah kolom orang tua-->
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <!-- tambah kolom orang tua-->
                <th>Pendidikan</th>
                <th>Pekerjaan</th>
                <th>Alamat</th>
                <th>Dusun</th>
                <th>Status</th>
                <th>Tanggal Lapor</th>
                <th>Aksi</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($penduduks as $penduduk )
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $penduduk->nik}}</td>
              <td>{{ $penduduk->nama }}</td>
              <td>{{ $penduduk->nokk }}</td>
              <td>{{ $penduduk->namaAyah }}</td>
              <td>{{ $penduduk->namaIbu }}</td>
              <td>
                <?php
                $apa=[
                    'Tidak Belum sekolah',
                    'Belum Tamat SD',
                    'apa hayo',
                    'Tidak Belum sekolah',
                    'Tidak Belum sekolah',
                    'Tidak Belum sekolah',
                    'Tidak Belum sekolah',
                    ''
                ];
                echo $apa[$penduduk->pendidikan-1];
                ?>


              </td>
              <td>{{ $penduduk->pekerjaan }}</td>
              <td>{{ $penduduk->alamat }}</td>
              <td>{{ $penduduk->dusun }}</td>
              <td>{{ $penduduk->statuskawin }}</td>
              <td>{{ $penduduk->tgl_lapor }}</td>
              <td></td>

              <td>
                <a href="/dashboard/penduduks/{{ $penduduk->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
                <a href="/dashboard/penduduks/{{ $penduduk->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                <form action="/dashboard/penduduks/{{ $penduduk->slug }}" method="penduduk" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Hapus data sekarang ?')"><span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{ $penduduks->links() }}

    @endsection
