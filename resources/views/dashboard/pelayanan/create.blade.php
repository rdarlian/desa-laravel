@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new post</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/pelayanan" class="mb-5" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
          <label for="nama_pelayanan" class="form-label @error('nama_pelayanan') is-invalid @enderror">Kategori Pelayanan</label>
          <select name="nama_pelayanan" id="nama_pelayanan">
              <option value="KTP" {{ old('nama_pelayanan') == 'KTP' ? 'selected' : '' }}>KTP</option>
              <option value="KK" {{ old('nama_pelayanan') == 'KK' ? 'selected' : '' }}>KK</option>
              <option value="Akte Kelahiran" {{ old('nama_pelayanan') == 'Akte Kelahiran' ? 'selected' : '' }}>Akte Kelahiran</option>
              <option value="Akte Kematian" {{ old('nama_pelayanan') == 'Akte Kematian' ? 'selected' : '' }}>Akte Kematian</option>
              <option value="lainnya" {{ old('nama_pelayanan') == 'lainnya' ? 'selected' : '' }}>lainnya</option>
          </select>

          @error('nama_pelayanan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
          @enderror
          </div>

        <div class="mb-3">
          <label for="body" class="form-label">Body</label>
          @error('body')
             <p class="text-danger">{{ $message }}</p>
          @enderror
          <input id="body" type="hidden" name="body" value="{{ old('body') }}">
          <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
</form>
</div>

<script>

function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'blok';

    const oFReader = new FileReader();

    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endsection
