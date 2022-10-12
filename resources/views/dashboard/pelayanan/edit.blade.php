@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit post</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/pelayanan/{{ $pelayanan->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
        <div class="mb-3">
          <label for="nama_pelayanan" class="form-label">Nama Pelayanan</label>
          <input type="text" class="form-control @error('nama_pelayanan') is-invalid @enderror" id="nama_pelayanan" name="nama_pelayanan" required autofocus value="{{ old('nama_pelayanan', $pelayanan->nama_pelayanan) }}" disabled>

          @error('nama_pelayanan')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>


        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input type="hidden" name="oldImage" value="{{ $pelayanan->image }}">
            @if ($pelayanan->image)
                <img src="{{ asset('storage/' . $pelayanan->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
                <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif

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
          <input id="body" type="hidden" name="body" value="{{ old('body', $pelayanan->body) }}">
          <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
</form>
</div>

<script>


document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
})

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
