@extends('layouts.main')
@section('container')
<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title mb-4">

      <h3>Perangkat Desa <span>Kepulungan</span></h3>
      <p>Desa Kepulungan sendiri memiliki beberapa perangkat desa antara lain</p>
    </div>
    @foreach($perangkat as $item)
    <hr class="mb-3">
    <div class="row">
      <div class="col-lg-3">
        <img src="{{ asset('perangkat-images/' . $item->foto) }}" class="rounded" alt="" width="200">
      </div>

      <div class="col-lg-8">
        <h5>{{ $item->nama }}</h5>
        <ul>
          <li>Jabatan : {{ $item->jabatan }}</li>
          <li>Alamat : {{ $item->alamat }}</li>
          <li>E-mail : {{ $item->email }}</li>
          <li>No Telp : {{ $item->notelp }}</li>
        </ul>

      </div>
    </div>
    
    @endforeach

  </div>


</section><!-- End Team Section -->
@endsection