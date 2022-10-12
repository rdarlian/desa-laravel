@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Foto</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/galery" class="mb-5" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
          <label for="inputNamaFotoGalery" class="form-label">Nama Foto</label>
          <input type="text" class="form-control @error('inputNamaFotoGalery') is-invalid @enderror" id="inputNamaFotoGalery" name="inputNamaFotoGalery" required autofocus value="{{ old('inputNamaFotoGalery') }}">

          @error('inputNamaFotoGalery')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="inputFotoGalery" class="form-label">Post Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control @error('inputFotoGalery') is-invalid @enderror" type="file" id="inputFotoGalery" name="inputFotoGalery" onchange="previewImage()">
            @error('inputFotoGalery')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
          @enderror
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
