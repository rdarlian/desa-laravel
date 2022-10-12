@extends('layouts.main')
@section('container')

<main id="main">
    <section>
    <!-- ======= Portfolio Section ======= -->
    <section id="galery" class="galery">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h3>Galery Desa Kepulungan</h3>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

        @foreach ($galeries as $galery)

        <div class="col-lg-4 col-md-6 portfolio-item mt-3">
            <img src="{{ asset('images/' . $galery->inputFotoGalery) }}" class="img-fluid" alt="">
        </div>
        @endforeach

        </div>

      </div>
    </section><!-- End Portfolio Section -->
    {{ $galeries->links() }}
  </main><!-- End #main -->

@endsection

