@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dokumen Persyaratan Surat</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/syaratsurat" class="mb-5">
    @csrf
    <div class="mb-4">
        <label for="name" class="form-label">Nama Dokumen</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">

        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

        <a type="button" href="/dashboard/syaratsurat/" class="btn btn-danger me-3 px-4">Batal</a>
        <button type="submit" class="btn btn-primary">Create Post</button>
</form>
</div>


@endsection
