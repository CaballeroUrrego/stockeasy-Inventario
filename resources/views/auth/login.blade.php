<x-guest-layout>

    <head>
        <title>StockEase - Iniciar Sesión</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
        <link rel="icon" href="/assents/logo/LogoStockEase.svg" />
        <!-- CSS personalizado -->
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>

    <body>
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div class="p-4 shadow-lg card login-card">

                <h1 class="mb-4 text-center login-title">StockEase</h1>

                <!-- Formulario -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Correo Electrónico -->
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope"></i> Correo Electrónico
                        </label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Ingresa tu correo electrónico" value="{{ old('email') }}" required
                            autofocus />
                        @error('email')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Contraseña -->
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="fas fa-lock"></i> Contraseña
                        </label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Ingresa tu contraseña" required />
                        @error('password')
                            <div class="mt-2 text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Recordarme -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" id="remember_me" name="remember" class="form-check-input" />
                        <label for="remember_me" class="form-check-label">Recuérdame</label>
                    </div>

                    <!-- Botón Iniciar Sesión -->
                    <div class="mb-3">
                        <button type="submit" class="py-2 btn btn-primary w-100 btn-login">Inicia sesión</button>
                    </div>

                    <!-- Enlace de contraseña olvidada -->
                    @if (Route::has('password.request'))
                        <div class="text-center">
                            <a href="{{ route('password.request') }}" class="text-decoration-none text-muted">¿Olvidaste
                                tu contraseña?</a>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</x-guest-layout>
