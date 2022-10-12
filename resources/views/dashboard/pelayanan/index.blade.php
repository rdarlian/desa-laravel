@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pelayanan</h1>
  </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>

@endif

  <div class="table-responsive col-lg-8">
      <a href="/dashboard/pelayanan/create" class="btn btn-primary mb-3">Buat Surat</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pelayanans as $pelayanan )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pelayanan->nama_pelayanan }}</td>
          <td>
            <a href="/dashboard/pelayanan/{{ $pelayanan->nama_pelayanan }}" class="badge bg-info"><span data-feather="eye"></span></a>
            <a href="/dashboard/pelayanan/{{ $pelayanan->nama_pelayanan }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/pelayanan/{{ $pelayanan->nama_pelayanan }}" method="post" class="d-inline">
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

@endsection
