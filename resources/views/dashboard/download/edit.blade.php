@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Edit Data Download</h2>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/download/{{ $data->id }}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $data->title) }}">

          @error('title')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>
       <div class="mb-3">
        <label for="fileup">File</label>
        {{ $data->fileup }}
        <input type="file" class="form-control-form" name="fileup">
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
</script>
@endsection
