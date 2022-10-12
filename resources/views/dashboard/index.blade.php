@extends('dashboard.layouts.main')


@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
    <h1 class="h2">Welcome Back, {{ auth()->user()->name }}</h1>
</div>


@endsection
