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
    <style>
        body {
            font-family: 'Karla', sans-serif;
            background-color: #f7f7f7;
        }
        .login-section-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            position: relative;
        }
        .back-icon {
            font-size: 24px;
            color: #03774A;
            margin-right: 10px;
        }
        .login-wrapper {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .login-title {
            font-size: 24px;
            color: #03774A;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        .form-control {
            border-color: #03774A;
        }
        .input-group-text {
            background-color: #03774A;
            color: #ffffff;
            border: none;
        }
        .btn.login-btn {
            background-color: #03774A;
            color: #ffffff;
            border: none;
            transition: background-color 0.3s;
        }
        .btn.login-btn:hover {
            background-color: #025d3a;
        }
        .alert {
            border-left: 4px solid #03774A;
        }
        .login-img-wrapper {
            display: none;
        }
        @media (min-width: 768px) {
            .login-section-wrapper {
                flex-direction: row;
            }
            .login-wrapper {
                margin: 0 30px;
            }
            .login-img-wrapper {
                display: block;
                flex: 1;
                background-image: url('{{ asset('asset/images/page-login.jpg') }}');
                background-size: cover;
                background-position: center;
                border-radius: 8px;
                position: relative;
            }
            .login-img-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(3, 119, 74, 0.7);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                color: #ffffff;
                border-radius: 8px;
            }
            .login-img-overlay h2 {
                font-size: 3rem;
                margin-bottom: 0.5rem;
            }
            .login-img-overlay p {
                font-size: 1.5rem;
            }
        }
        .show-password {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-sm-6 login-section-wrapper">
                    <div class="login-wrapper">
                        <h1 class="login-title">
                            <a href="{{ route('home') }}" class="mdi mdi-arrow-left back-icon"></a>
                            Sign in
                        </h1>
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
                                <label for="nik" class="label">NIK atau Nama</label>
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
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required autocomplete="current-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text show-password" onclick="togglePassword()">
                                            <i class="mdi mdi-eye-off" id="toggleIcon"></i>
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
                    </div>
                </div>
                <div class="col-sm-6 login-img-wrapper">
                    {{-- <div class="login-img-overlay">
                        <h2>SIRUWA</h2>
                        <p>A place where you belong</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('mdi-eye-off');
                toggleIcon.classList.add('mdi-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('mdi-eye');
                toggleIcon.classList.add('mdi-eye-off');
            }
        }
    </script>
</body>
</html>
