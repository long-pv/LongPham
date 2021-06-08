@extends('admin.layouts.login')
@section('title', 'dangki')
@section('content')
<main class="form-signin">
  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <p>Đăng ký lỗi</p>
    </div>
  @endif
  <!-- return view('admin.products.create'); -->
  <form action="{{route('dangki.post')}}" method="post">
    @csrf
    <img class="mb-4" src="{{ asset('assets/img/bootstrap-logo.svg')}}" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <!-- name -->
    <div class="form-floating">
      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingPassword" placeholder="name">
      <label for="floatingPassword">name</label>
      @error('name')
     <div class="invalid-feedback">{{ $message }}</div>
     @enderror
    </div>
<!-- email -->
    <div class="form-floating">
      <input type="text" name="email" value="" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
        @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
<!-- pass -->
<div class="form-floating">
      <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
      @error('password')
     <div class="invalid-feedback">{{ $message }}</div>
     @enderror
    </div>
  
<!-- pass -->
<div class="form-floating">
      <input type="text" name="department_id" class="form-control @error('department_id') is-invalid @enderror" id="floatingPassword" placeholder="department_id">
      <label for="floatingPassword">department_id</label>
      @error('department_id')
     <div class="invalid-feedback">{{ $message }}</div>
     @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
  <a href="{{route('logout')}}">Đăng nhập</a>

</main>
@stop 