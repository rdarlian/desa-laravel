@extends('dashboard.layouts.main')


@section('container')

    <h3>{{ $data->title }}</h3>
   <iframe src="/storage/{{ $data->fileup }}" frameborder="0" height="500" width="100%"></iframe>


@endsection
