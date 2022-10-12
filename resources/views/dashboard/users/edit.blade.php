@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit User</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/user/{{ $user->id }}" method="POST">
        @method('put')
        @csrf
      <div class="form-floating">
        <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name', $user->name) }}">
        <label for="name">Name</label>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-floating mt-2">
        <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username', $user->username) }}">
        <label for="username">Username</label>
        @error('username')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-floating mt-2 ">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" required value="{{ old('email', $user->email) }}" >
        <label for="floatingInput">Email address</label>
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}

        </div>
        @enderror
      </div>

      <div class="form-floating mt-2">
          <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" placeholder="Password" required>
          <label for="password">Password</label>
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
      </div>

      <button class="w-100 btn btn-lg btn-primary mt-2" type="submit">Register</button>
    </form>
</div>

@endsection
