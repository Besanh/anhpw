<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ __('Page Login') }}">
    <meta name="author" content="{{ config('app.seo_author') }}">

    <title>{{ config('app.name') }} {{ __('Login') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/admin/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/admin/sb-admin-2.min.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('userfiles/images/logo/home-2.png') }}">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Welcome Back!') }}</h1>
                                    </div>
                                    <form class="user" action="{{ route('post-admin-login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="passwrod" placeholder="Password" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" name="remember" class="custom-control-input"
                                                    id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            {{ __('Login') }}
                                        </button>
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> {{ __('Login with Google') }}
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> {{ __('Login with Facebook') }}
                                        </a>
                                    </form>
                                    <hr>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                        <div class="text-center">
                                            <a class="small" href="{{ route('password.request') }}">
                                                {{ __('Forgot Password?') }}
                                            </a>
                                        </div>
                                    @endif
                                    @if (Route::has('admin-register'))
                                        <div class="text-center">
                                            <a class="small" href="{{ route('admin-register') }}">
                                                {{ __('Create an Account!') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/admin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/admin/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/admin/sb-admin-2.min.js') }}"></script>

</body>

</html>
