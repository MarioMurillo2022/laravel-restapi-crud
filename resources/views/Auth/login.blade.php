@extends('layouts.app')

@section('content')
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <div class="container" id="container">
        <!-- Formulario de Registro -->
        <div class="form-container sign-up">
            <form id="loginForm" method="POST" action="{{ route('register') }}">
                @csrf
                <h2>Crear Cuenta</h2>                
                <input type="text" name="name" placeholder="Nombre" required />
                <input type="text" name="lastname" placeholder="Apellido" required />
                <input type="email" name="email" placeholder="Correo Electrónico" required />
                <input type="date" name="birthdate" placeholder="Fecha de nacimiento" class="form-control" required>
                <input type="password" name="password" placeholder="Contraseña" required />
                <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required />
                <button type="submit">Registrarse</button>
            </form>
        </div>

        <!-- Formulario de Inicio de Sesión -->
        <div class="form-container sign-in">
            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <h2>Iniciar Sesión</h2>
                <span>Utiliza tu correo y contraseña</span>
                <input type="email" name="email" placeholder="Correo Electrónico" required />
                <input type="password" name="password" placeholder="Contraseña" required />
                <button type="submit">Iniciar Sesión</button>
            </form>
        </div>

        <!-- Panel de Alternancia -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>¡Bienvenido!</h1>
                    <img src="{{ asset ('img/icon_TeleP.png') }}" alt="Telematica" class="img-fluid rounded">
                    <button class="hidden" id="login">Iniciar Sesión</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>¡Bienvenido!</h1>
                    <img src="{{ asset ('img/icon_SGDp.png') }}" alt="Paisaje" class="img-fluid rounded">
                    <p>Regístrate con tus datos personales para usar todas las funciones</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
    <script src="{{ asset('js/script2.js') }}"></script>
@endsection
