@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Layanan</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/layanan/{{ $layanan->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama Dokumen</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $layanan->name) }}">

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



        <button type="submit" class="btn btn-primary">Update Post</button>
</form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });


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