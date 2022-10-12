@extends('dashboard.layouts.main')


@section('container')
<div class="section">
    <div class="row my-3">
        <div class="col-lg-8">
            <a href="/dashboard/layananmandiri" class="btn btn-success"><span data-feather="arrow-left"></span> Back Surat Masuk</a>
            <form action="/dashboard/layananmandiri/{{ $layanan->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Hapus data sekarang ?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            <h2 class="mb-3">{{ $layanan}}</h2>

            @if ($layanan->filename)
            <div style="max-height: 350px; overflow:hidden;">
                <file src="{{ asset('file/' . $layanan->filename) }}" >
            </div>

            @endif

        </div>
    </div>
</div>

@endsection
