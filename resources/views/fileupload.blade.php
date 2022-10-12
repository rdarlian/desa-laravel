@extends('dashboard.layouts.main')
@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Upload File</h1>
</div>

<div class="col-lg-8">
<form action="/dashboard/download" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus">

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fileup" class="form-label">Upload File</label>
        <input class="form-control @error('fileup') is-invalid @enderror" type="file" id="fileup" name="fileup">
        @error('fileup')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>

</form>
</div>
@endsection
