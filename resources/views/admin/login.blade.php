@extends('layouts.admin')

@section('title', 'Giriş Yap')
@section('body-class', 'login-page bg-body-secondary')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('home') }}"><img src="{{ asset('images/logo.png') }}" id="ftco-logo" width="300px" ></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Giriş Yap</p>
      
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

      <form action="{{ route('admin.login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required/>
          <div class="input-group-text"><span class="bi bi-envelope"></span></div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required/>
          <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
        </div>
        <!--begin::Row-->
        <div class="row">
          <div class="col-8">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault" />
              <label class="form-check-label" for="flexCheckDefault"> Beni Hatırla </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">Giriş Yap</button>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!--end::Row-->
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection
