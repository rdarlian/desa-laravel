@extends('layouts.main')

@section('container')

    <div class="section">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <h2 class="mb-3">{{ $post->title }}</h2>

                <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> <a href="/blogs?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('post-images/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                    </div>

                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">

                @endif


                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/blogs" class="d-block mt-3">Back to Posts</a>

            </div>
        </div>
    </div>

@endsection
