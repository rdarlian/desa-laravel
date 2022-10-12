@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Dokumen Persyaratan</h1>
  </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
    {{ session('success') }}
</div>

@endif

  <div class="table-responsive col-lg-6">
      <a href="/dashboard/syaratsurat/create" class="btn btn-primary mb-3">Tambah Persyaratan</a>
    <table class="table table-sm">
      <thead>
        <tr class="table-light">
          <th scope="col">No.</th>
          <th scope="col">Nama Dokumen</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($surat as $syarat)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $syarat->name }}</td>
          <td>
            <a href="/dashboard/syaratsurat/{{ $syarat->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/syaratsurat/{{ $syarat->id }}" method="post" class="d-inline">
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
