@extends('main')
@section('container')

@if(session()->has('succees')) 
   <div class="alert alert-dark alert-dismissible fade show" role="alert">
     <h6>{{ session('succees') }}</h6>
   </div>
 @endif

 
 <main class="form-signin w-100 m-auto">
   @if(session()->has('success'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('success') }}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('error')) 
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
      </div>
       @endif
    <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
    <form action="/" method="post">
        @csrf
      <div class="form-floating">
        <input type="email" class="form-control @error('email') is-ivalid @enderror" id="email" name="email" placeholder="Email adress" autofocus required value="{{ old('email') }}">
        <label for="email">Email address</label>
        @error ('email')
        <div class="invalid-feedback">
          <h6>{{ $message }}</h6>
        </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
      <p class="mt-3 mb-3 text-body-secondary">&copy;Hermanto Prastyawan November 2023</p>
    </form>
    <small class="d-block text-center mt-3">Not reegistered? <a href="/register">Register Now!</a></small>
  </main>
@endsection