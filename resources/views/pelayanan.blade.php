@extends('layouts.main')

@section('container')

    <div class="section">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $pelayanan->nama_pelayanan }}</h2>

                @if ($pelayanan->image)
                    <div style="max-height: 200px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $pelayanan->image) }}" class="img-fluid mt-3">
                    </div>


                @endif


                <article class="my-3 fs-5">
                    {!! $pelayanan->body !!}
                </article>



            </div>
        </div>
    </div>

@endsection
