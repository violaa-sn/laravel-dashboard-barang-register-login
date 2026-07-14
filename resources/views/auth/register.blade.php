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
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">
                        Register User
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">
                                Nama
                            </label>
                            <input type="text" name="nama_user"
                                class="form-control @error('nama_user') is-invalid @enderror"
                                value="{{ old('nama_user') }}">

                            @error('nama_user')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
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
                                Nomor Telepon
                            </label>
                            <input type="text" name="nomor_telepon"
                                class="form-control @error('nomor_telepon') is-invalid @enderror"
                                value="{{ old('nomor_telepon') }}">

                            @error('nomor_telepon')
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

                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid
                                @enderror" autocomplete="new-password">


                                <button class="btn btn-outline-secondary" type="button" id="togglePassword">

                                    <i class="bi bi-eye"></i>
                                </button>


                            </div>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Konfirmasi Password
                            </label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                        <button class="btn btn-primary w-100">
                            Register
                        </button>

                        <p class="text-center mt-3">
                            Sudah punya akun?
                            <a href="{{ route('login') }}">
                                Login
                            </a>
                        </p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
