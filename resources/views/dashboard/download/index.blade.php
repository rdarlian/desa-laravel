@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Download</h1>
  </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>

@endif

  <div class="table-responsive col-lg-8">
      <a href="/dashboard/download/upload" class="btn btn-primary mb-3">Upload</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Direktori</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($download as $data )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->title }}</td>
          <td>{{ $data->fileup }}</td>
          <td>
            <a href="{{ url('/dashboard/view', $data->id) }}" class="badge bg-info"><span data-feather="eye"></span></a>

            <a href="/dashboard/download/{{ $data->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>

            <form action="/downloadfile/{{ $data->id }}" method="get" class="d-inline">
                @csrf
                <button class="badge bg-success border-0"><span data-feather="download"></span></button>
            </form>
            <form action="/dashboard/download/{{ $data->id }}" method="post" class="d-inline">
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
