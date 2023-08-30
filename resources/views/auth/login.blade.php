@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
    <script src="assets/plugins/nprogress/nprogress.js"></script>
  </head>
  <body class="card-body" id="body">
    <div class="container d-flex align-items-center justify-content-center vh-100">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-10">
          <div class="card">
            <div class="card-header bg-primary">
              <div class="app-brand">
                <a href="/index.html">
                  <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33"
                    viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                      <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                      <path class="logo-fill-white" fill="#ffff" d="M11 4v25l8 4V0z" />
                    </g>
                  </svg>
                  <span class="brand-name text-center">Sleek Dashboard</span>
                </a>
              </div>
            </div>

            <div class="card-body p-5">
              <h4 class="text-dark mb-5 text-center">{{ __('Sign in') }}</h4>
              
              <form method="POST" action="{{ route('login') }}">
                 @csrf
                <div class="row">
                <div class="form-group col-md-12 ">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group col-md-12 ">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

                    <div class="form-group">
                    <div class="col-md-8 offset-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">
                {{ __('Login') }}
            </button>
                

        </div>
    <div class="form-group mb-4">
    <div class="col-md-12">

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        </div>
        <p>
          Copyright &copy; <span id="copy-year"></span> a template by <a class="text-primary" href="https://themefisher.com" target="_blank">AgungSuseno</a>.
        </p>
    </div>
    <style>
         p{
            text-align: center;
            padding: 1rem;
            margin: auto;
            display: flex;
            position: relative;
         }
        </style>
</form>
</div>
@endsection