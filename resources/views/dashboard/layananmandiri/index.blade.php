@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Layanan Mandiri</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>

@endif

  <div class="table-responsive col-lg-8">
      <a href="/dashboard/layananmandiri/create" class="btn btn-primary mb-3">Upload Data Layanan Mandiri</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr class="table-light">
          <th scope="col">No</th>
          <th scope="col">Kebutuhan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($layananmandiri as $data )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $layanan[$data->layanan_id-1]->name }}</td>
          <td>
            <a href="/dashboard/layananmandiri/{{ $data->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/layananmandiri/{{ $data->id }}" method="post" class="d-inline">
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
  {{-- {{ $galeries->links() }} --}}

@endsection
