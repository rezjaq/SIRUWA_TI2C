<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="shortcut icon" href="{{ asset('assets/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <title>Page Login</title>
</head>
<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 login-section-wrapper">
                    <div class="brand-wrapper">
                        {{-- logo --}}
                        {{-- <img src="assets/images/logo.svg" alt="logo" class="logo"> --}}
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Sign in</h1>
                        @if (session('warning'))
                            <div class="alert alert-warning">
                                {{ session('warning') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if ($errors->has('login_gagal'))
                            <div class="alert alert-danger">
                                {{ $errors->first('login_gagal') }}
                            </div>
                        @endif
                        <form action="{{ url('proses_login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="label">Username</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password" class="label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="mdi mdi-check-circle-outline"></i>
                                        </span>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block login-btn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                        <a href="#!" class="forgot-password-link">Forgot password?</a>
                        <p class="login-wrapper-footer-text">Don't have an account? <a href="{{ route('registrasi.index') }}" class="text-reset">Register here</a></p>
                    </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block login-img-wrapper">
                    <div class="login-img-overlay">
                        <h2>SIRUWA</h2>
                        <p>A place where you belong</p>
                    </div>
                    <img src="{{ asset('asset/images/page-login.jpg') }}" alt="login image" class="login-img">
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
