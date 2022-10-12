@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Layanan Mandiri</h1>
</div>

<form action="">

    <div class="col-lg-8">
        @csrf
        <div class="mb-3">
            <label for="layanan_id" class="form-label">Pilih Layanan</label>
            <select class="form-select" name="layanan_id" id="plhlayanan">
                @foreach ($layanan as $data)
                @if (old('layanan_id') == $data->id)
                <option value="{{ $data->id }}" selected>{{ $data->name }}</option>
                @else
                <option value="{{ $data->id }}">{{ $data->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-danger">Submit</button>
</form>



@if ($syarat != '[]')
<form method="post" action="/dashboard/layananmandiri" class="mb-5" enctype="multipart/form-data">
@csrf
    <div class="col-lg-8">
        <div class='mt-3'>
            <div class="form-group subtitle_head">
                <label class="text-right"><strong>Scan dokumen yang harus diupload</strong></label>
            </div>
            
            @foreach(explode(',', $syarat[0]->syaratdokumen) as $info)
            - {{$info}}<br>
            @endforeach

            <br>
            <input type="text" name="layanan_id" value="{{ $data->id }}" class="form-control mb-3" hidden>
            <input type="file" class="form-control @error('filenames') is-invalid @enderror" value="{{ old('filenames') }}" name="filenames">
            @error('filenames')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
            <button type="submit" class="btn btn-primary">Submit</button>
            @else
            @endif
        </div>
    </div>



</form>
</div>


@endsection