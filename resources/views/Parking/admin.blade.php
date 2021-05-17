@extends('layouts.app')

@section('content')
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/login.css" />
    </head>

<div class="container" >

<body class="background"></body>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card sizeCard blue lighten-5 ">
                <h3 class="card-header, center">{{ __('Login') }}</h3>
                <img class="center" src="{{url('/assets/parking.png')}}" /><br>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            
                            <label for="email"><i class="medium material-icons">__account_circle</i></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="password">  <i  class="medium material-icons">__lock</i></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div> -->
                        <!-- </div> -->

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                           
                                <button type="submit" class="btn btn-large dark blue">
                                    {{ __('Login') }}
                                </button>
<br><br>
                                <!-- @if (Route::has('password.request'))
                                    <a class="btn btn-link, center" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
      -->
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>
<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../js/loginscript.js"></script>

@endsection
