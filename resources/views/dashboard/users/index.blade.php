@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">User</h2>
  </div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>

@endif

  <div class="table-responsive col-lg-8">
      <a href="/dashboard/register" class="btn btn-primary mb-3">Register User Baru</a>
    <table class="table table-warning">
      <thead>
        <tr>
          <th scope="col">No. </th>
          <th scope="col">Nama</th>
          <th scope="col">E-mail</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datas as $data )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $data->name }}</td>
          <td>{{ $data->email }}</td>
          <td>
            <a href="/dashboard/user/{{ $data->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/user/{{ $data->id }}" method="post" class="d-inline">
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
