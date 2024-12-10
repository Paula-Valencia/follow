<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="logo-icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <title>Etapa Productiva</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #009e00;
            color: white;
            padding: 8px 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 40px;
            height: auto;
            margin-right: 10px;
        }

        .logo-sena {
            width: 80px;
            height: auto;
        }

        h1 {
            font: 'DM Sans';
            font-size: 1.2em;
            margin: 0;
        }

        body {
            overflow: hidden;
            /* Elimina cualquier desplazamiento */
            margin: 0;
            /* Asegura que no haya márgenes que causen scroll */
        }

        main {
            width: 100%;
            height: 100vh;
            /* Ocupa exactamente toda la ventana */
            background-image: url('{{ asset('img/login/image.png') }}');
            background-size: 40%;
            background-position: left top;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            /* Centra el contenido dentro de main */
        }

        .content {
            position: absolute;
            z-index: 2;
            text-align: center;
            color: white;
            max-width: 600px;
            width: 100%;
        }

        .welcome-text {
            position: absolute;
            top: -300px;
            left: 80%;
            text-align: center;
            z-index: 12;
            font-size: 2.5rem;
            white-space: nowrap;
            margin: 0;
            padding: 0;
        }

        .etapa-productiva {
            font-size: 3.5rem;
            font-weight: bold;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Centra los elementos de manera horizontal */
            text-align: center;
            /* Asegura que el texto esté centrado */
            margin-top: -50px;
            /* Ajusta el valor según lo necesario */
        }

        .etapa-productiva .etapa {
            color: #009e00;
            /* Se eliminó padding-left para evitar desplazamientos */
        }

        .etapa-productiva .productiva {
            color: #003366;
        }


        .login-container {
            position: absolute;
            top: 73%;
            left: 74%;
            transform: translate(-50%, -50%);
            z-index: 2;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(240, 240, 240, 0.9));
            padding: 30px 25px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            max-width: 350px;
            width: 100%;
        }

        h3 {
            font-family: 'DM Sans', sans-serif;
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.3em;
            color: #003366;
        }

        .input-group {
            display: flex;
            align-items: center;
            background-color: white;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 8px 10px;
            border: 1px solid #ddd;
        }

        .input-icon {
            width: 22px;
            height: 22px;
            margin-right: 10px;
            opacity: 0.6;
        }

        input {
            border: none;
            padding: 10px;
            width: 100%;
            font-size: 1em;
            color: #333;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #009e00;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #007a00;
        }

        .register-link {
            display: block;
            text-align: center;
            color: #003366;
            font-size: 0.9em;
            margin-top: 15px;
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
</head>

<body class="font-['Arial',sans-serif] bg-white m-0 flex flex-col min-h-screen">

    @include('partials.header')

    <div class="h-14 bg-[#009e00]">
    </div>
    <main>
        <div class="content">
            <div class="welcome-text">
                <div class="etapa-productiva">
                    <div class="etapa">ETAPA</div>
                    <div class="productiva">PRODUCTIVA</div>
                </div>
            </div>
        </div>

        <div class="login-container">
            <h3>USUARIO</h3>
            <form id="loginform" method="POST" action="{{ route('login_authentication') }}">
                @csrf
                <div class="input-group">
                    <img src="{{ asset('img/mail.png.png') }}" alt="Usuario" class="input-icon">
                    <input type="email" name="email" placeholder="Correo electrónico" required>
                </div>
                <div class="input-group">
                    <img src="{{ asset('img/lock-icon.png') }}" alt="Contraseña" class="input-icon">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </form>
            <a href="{{ route('reset-password') }}" class="register-link">¿Olvidaste la contraseña?</a>

        </div>
    </main>
</body>

</html>
