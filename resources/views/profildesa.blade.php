@extends('layouts.main')

@section('container')

    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h3>{{ $post->title }}</h3>
            <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> <a href="/blogs?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>
          </div>

          <div class="row justify-content-center mb-5">
            <div class="col-lg-8" data-aos="zoom-out" data-aos-delay="100">


                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('post-images/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                    </div>

                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">

                @endif

                <article class="my-3 fs-8">
                    {!! $post->body !!}
                </article>

            </div>

          </div>

        </div>
      </section><!-- End About Section -->

@endsection
