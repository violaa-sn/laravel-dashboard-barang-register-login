<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital@1&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
</head>


<body class="py-5">
    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    <h4 class="mb-0">

                        Login User

                    </h4>

                </div>

                <div class="card-body">

                    <form method="POST" action="{{ route('login.process') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">

                                Email

                            </label>

                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Password
                            </label>

                            <div class="input-group">

                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">

                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">

                                    <i class="bi bi-eye"></i>

                                </button>

                            </div>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        <button class="btn btn-success w-100">
                            Login
                        </button>

                    </form>
                    <hr>

                    <p class="text-center">

                        Belum punya akun?

                        <a href="{{ route('register') }}">

                            Register

                        </a>

                    </p>

                </div>

            </div>

        </div>

    </div>
</body>

</html>