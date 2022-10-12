@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Perangkat Desa</h1>
  </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>

@endif

  <div class="table-responsive col-lg-10">
      <a href="/dashboard/perangkat/create" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Jabatan</th>
          <th scope="col">No. Telp</th>
          <th scope="col">Alamat</th>
          <th scope="col">Email</th>
          <th scope="col">Foto</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($perangkats as $perangkat )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $perangkat->nama }}</td>
          <td>{{ $perangkat->jabatan }}</td>
          <td>{{ $perangkat->notelp }}</td>
          <td>{{ $perangkat->alamat }}</td>
          <td>{{ $perangkat->email }}</td>
          <td><img src="{{ asset('perangkat-images/' . $perangkat->foto) }}" width="100" alt=""></td>
          <td>
            <a href="/dashboard/perangkat/{{ $perangkat->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/perangkat/{{ $perangkat->id }}" method="post" class="d-inline">
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
  {{ $perangkats->links() }}

@endsection
