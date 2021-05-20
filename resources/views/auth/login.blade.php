<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BB365 - Brand Builder 365</title>
    <link rel="shortcut icon" href="{{ asset('/uploads/site-icon.png') }}">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">


    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <style>
    body {
        background: url('public/uploads/veg2.jpg') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    .middle-box {
        background:#ffffffa1;
        margin-top: 100px;
       /* border: 2px solid white !important;*/
    }
    </style>
</head>

<body class="md-skin">

    <div class="middle-box text-center loginscreen animated fadeInDown">

        <div>

            <h1 class="logo-name"></h1>
               <div class="pad" style="padding-bottom:20px;">
            <img src="{{url('public/uploads/logo.jpg')}}" width="200">
        </div>
        </div>
        <h5>{{ __('Login') }}</h5>

        <p></p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row">
                <label for="email" class="col-md-1 col-form-label text-md-right"></label>

                <div class="col-md-10">
                    <input id="email" style="border-color:#ed8f26" type="email" placeholder="Email Address"
                        class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-1 col-form-label text-md-right"></label>

                <div class="col-md-10">
                    <input id="password" style="border-color:#ed8f26" type="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">

                <div class="col-md-10">
                    <div class="form-check">
                        <input class="form-check-input" style="border-color:#ed8f26" type="checkbox" name="remember"
                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <button type="submit" style="background:#ed8f26;border-color:#ed8f26"
                        class="btn btn-primary block full-width m-b">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') 

}}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </form>


    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>

</body>

</html>