<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="../css/login.css" />
    </head>

<div class="container" >

<body class="background"></body>
<div class="app-logo-container center">
            <div class="login-div">
                <div class="card sizeCard " style="border-radius: 20px;">
                    <div class="card-content ">
                        <div class="login-div-content">
                            <div class="logo-container">
                                <img src="{{url('/assets/parking.png')}}" />
                            </div>
                            <p class="welcome-text" style="margin-top: 10px">Welcome, Admin.</p>
                            <br>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix formIcon">account_circle</i>
                                        <label for="email">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror validate" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        
                                        @error('email')
                                            <span class="helper-text">{{ $message }}</span>
                                            <!-- <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> -->
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix formIcon">lock</i>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror validate" name="password" required autocomplete="current-password">
                                        <label for="password">{{ __('Password') }}</label>

                                        @error('password')
                                            <span class="helper-text">{{ $message }}</span>
                                            <!-- <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span> -->
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
                                @endif -->
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

</html>
