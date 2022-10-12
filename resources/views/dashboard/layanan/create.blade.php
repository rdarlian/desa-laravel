@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Layanan Baru</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/layanan" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Layanan</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">

        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
    <label for="">Pilih Syarat Surat</label>
    @foreach ($syaratsurat as $item)
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="{{ $item->name }}" name="syaratdokumen[]"id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          {{ $item->name }}
        </label>
    </div>
    @endforeach
        {{-- @error('layanan')
             <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror --}}
    </div>

    <button type="submit" class="btn btn-primary">Create Post</button>
</form>
</div>

@endsection
