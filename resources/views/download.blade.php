@extends('layouts.main')

@section('container')

<h1 class="mb-5">Download</h1>

<div class="container">
    <div class="row">
        <div class="table-responsive col-lg-8">
            <table class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($download as $data )
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->title }}</td>
                    <td>
                        <form action="/downloadfile/{{ $data->id }}" method="get" class="d-inline small">
                            @csrf
                            <button class="badge bg-success border-0"><span data-feather="download"></span></button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
