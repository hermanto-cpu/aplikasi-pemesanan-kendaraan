@extends('main')
@section('container')
<main class="form-registration w-100 m-auto">
    <h1 class="h3 mb-3 fw-normal text-center">Sign up</h1>
    <form action="/register" method="post">
        @csrf
      <div class="form-floating">
        <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" placeholder="Nama" autofocus required value="{{ old('name') }}">
        <label for="name">Nama</label>
        @error ('name')
        <div class="invalid-feedback">
          <p>{{ $message }}</p>
        </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username') }}" name="username">
        <label for="username">Username</label>
        @error ('username')
        <div class="invalid-feedback">
          <p>{{ $message }}</p>
        </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email adress" required value="{{ old('email') }}">
        <label for="email">Email address</label>
        @error ('email')
        <div class="invalid-feedback">
          <p>{{ $message }}</p>
        </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
        <label for="password">Password</label>
        @error ('password')
        <div class="invalid-feedback">
          <p>{{ $message }}</p>
        </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="role"><b>Role</b></label>
        <div class="input-group mt-1">
            <select class="form-control" id="role" name="role">
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>
                    Member/Driver
                </option>
                <option value="supervisor" {{ old('role') == 'supervisor' ? 'selected' : '' }}>
                    Leader/Approver
                </option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                    Admin
                </option>
            </select>
        </div>
      </div>
    
      <button class="mt-3 btn btn-primary w-100 py-2" type="submit">Sign up</button>
      <small class="d-block text-center mt-3">Sudah punya akun? <a href="/">Kembali ke halaman login!</a></small>
    </form>
  </main>
@endsection