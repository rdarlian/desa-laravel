@extends('dashboard.layouts.main')


@section('container')
<div class="section">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-3">{{ $pelayanan->nama_pelayanan }}</h2>

            <a href="/dashboard/pelayanan" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my pelayanan</a>
            <a href="/dashboard/pelayanan/{{ $pelayanan->nama_pelayanan }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/pelayanan/{{ $pelayanan->nama_pelayanan }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Hapus data sekarang ?')"><span data-feather="x-circle"></span> Delete</button>
            </form>

            @if ($pelayanan->image)
            <div style="max-height: 350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $pelayanan->image) }}"  class="img-fluid mt-3">
            </div>


            @endif


            <article class="my-3 fs-5">
                {!! $pelayanan->body !!}
            </article>



        </div>
    </div>
</div>

@endsection
