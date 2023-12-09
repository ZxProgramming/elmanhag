

@extends('layouts/layoutLogin')


@section('content')
@if (auth()->check())
Already Logged In {{auth()->user()->name}} | <a href="{{route('login.destroy')}} " class='byn btn-primar'>Logout</a>
{{-- <a href="{{route('teacherDashboard')}} " class='byn btn-primar'>dashboard</a> --}}
  
@else
<div class="authentication-wrapper authentication-cover">
<div class="authentication-inner row m-0">
<!-- /Left Text -->
<div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center">
<div class="flex-row text-center mx-auto">
<img
src="../../assets/img/pages/elmanhag.png"
alt="Auth Cover Bg color"
width="520"
class="img-fluid authentication-cover-img"
data-app-light-img="pages/login-light.png"
data-app-dark-img="pages/login-dark.png" />

</div>

</div>
<!-- /Left Text -->

<!-- Login -->
<div class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4">
<div class="w-px-400 mx-auto">
<!-- Logo -->

<!-- /Logo -->
<p class="mb-4">Please sign-in to your account and start the adventure</p>
@if(session()->has('succes'))
{{session()->get('succes')}}
@endif

@error('error')
<span style='color:red;'>{{$message}}</span>
@enderror
<form id="formAuthentication" action="{{route('login.store')}}" class="mb-3"  method="POST" enctype="multipart/form-data">
@csrf
<div class="mb-3">
<label for="email" class="form-label">Email or Username</label>
<input
  type="text"
  class="form-control"
  id="email"
  name="email"
  value = 'ziadm57@yahoo.com'
  placeholder="Enter your email or username"
  autofocus />
    @error('email')
      <span>{{$message}}</span>
    @enderror
</div>
<div class="mb-3 form-password-toggle">
<div class="d-flex justify-content-between">
  <label class="form-label" for="password">Password</label>
  <a href="auth-forgot-password-cover.html">
    <small>Forgot Password?</small>
  </a>
</div>
<div class="input-group input-group-merge">
  <input
    type="password"
    id="password"
    class="form-control"
    name="password"
    value ="Makemesmile123"
    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
    aria-describedby="password" />
    @error('password')
      <span>{{$message}}</span>
    @enderror
  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
</div>
</div>
<div class="mb-3">
<div class="form-check">
  <input class="form-check-input" type="checkbox" id="remember-me" />
  <label class="form-check-label" for="remember-me"> Remember Me </label>
</div>
</div>
<button class="btn btn-primary d-grid w-100">Sign in</button>
</form>

<p class="text-center">
<span>New on our platform?</span>
<a href="auth-register-cover.html">
<span>Create an account</span>
</a>
</p>

<div class="divider my-4">
<div class="divider-text">or</div>
</div>

<div class="d-flex justify-content-center">
<a href="javascript:;" class="btn btn-icon btn-label-facebook me-3">
<i class="tf-icons bx bxl-facebook"></i>
</a>

<a href="javascript:;" class="btn btn-icon btn-label-google-plus me-3">
<i class="tf-icons bx bxl-google-plus"></i>
</a>

<a href="javascript:;" class="btn btn-icon btn-label-twitter">
<i class="tf-icons bx bxl-twitter"></i>
</a>
</div>
</div>
</div>
<!-- /Login -->
</div>
</div>
@endif

<!-- / Content -->
  
@endsection