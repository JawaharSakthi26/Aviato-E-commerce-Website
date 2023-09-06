@extends('layouts.first')
@section('content')
<body class="hold-transition login-page">
<title>Sumanas Tech | Log in</title>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>SUMANAS</b>&nbsp;tech</a>
  </div>
  @if(count($errors) > 0)
          @foreach( $errors->all() as $message )
            <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>{{ $message }}</span>
            </div>
          @endforeach
        @endif
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="authenticate" method="post" id="loginValidate">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="col-12 mx-auto">
          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        </div>
      </form>
      <div class="text-center">
        <p>- OR -</p>
      </div>
      <p class="mx-auto">
        <a href="register" class="text-center">Register a new membership</a>
      </p>
    </div>
  </div>
</div>
</body>
@endsection