@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Galery Kepulungan</h1>
  </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>

@endif

  <div class="table-responsive col-lg-8">
      <a href="/dashboard/galery/create" class="btn btn-primary mb-3">Upload Foto</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Foto</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($galeries as $galery )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $galery->inputNamaFotoGalery }}</td>
          <td><img src="{{ asset('images/' . $galery->inputFotoGalery) }}" width="200" alt=""></td>
          <td>
            <a href="/dashboard/galery/{{ $galery->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/galery/{{ $galery->id }}" method="post" class="d-inline">
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
  {{ $galeries->links() }}

@endsection
