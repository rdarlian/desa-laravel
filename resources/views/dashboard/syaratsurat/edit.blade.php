@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Dokumen</h1>
</div>

<div class="col-lg-8">
<form method="post" action="/dashboard/syaratsurat/{{ $syaratsurat->id }}" class="mb-5">
    @method('put')
    @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $syaratsurat->name) }}">

          @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
          @enderror
        </div>

        <a type="button" href="/dashboard/syaratsurat/" class="btn btn-danger me-3 px-4">Batal</a>
        <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

</script>
@endsection
