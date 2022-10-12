@extends('dashboard.layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5 mt-5">

        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registrasi</h1>
            <form action="/dashboard/register" method="POST">
                @csrf
              <div class="form-floating">
                <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mt-2">
                <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
              </div>
              <div class="form-floating mt-2 ">
                <select class="form-select" name="email" id="floatingSelect" aria-label="Floating label select example">
                    <option value="">E-mail</option>
                    @foreach ($penduduks as $data)
                      @if (old('email') == $data->email)
                        <option value="{{ $data->email }}" selected>{{ $data->email }}</option>
                      @else
                        <option value="{{ $data->email }}">{{ $data->email }}</option>
                      @endif
                    @endforeach
                </select>
                <label for="floatingSelect">Pilih E-mail</label>
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
            {{-- <small class="d-block text-center mt-3">Sudah punya akun ? <a href="/login">Login</a></small> --}}
          </main>

    </div>
</div>
@endsection
