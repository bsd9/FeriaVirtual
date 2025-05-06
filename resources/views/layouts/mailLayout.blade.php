<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fair 360 | Confirmación Exitosa - Iniciar Sesión</title>
    <meta name="description" content="¡Bienvenido a Fair 360! Confirmación exitosa para iniciar sesión en la plataforma. ¡Únete ahora y descubre un mundo de experiencias virtuales!">

    <!-- Agrega más metaetiquetas según sea necesario para SEO -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireStyles
</head>

<body class="bg-gradient-to-br from-blue-500 to-green-500 min-h-screen flex items-center justify-center">

<div class="max-w-md mx-auto p-8 bg-white shadow-md rounded-lg text-gray-800 h-400">

    @yield('header')
    @yield('content')
    <script>

        function formatConfirmationCode(input) {

            let cleanedInput = input.value.replace(/[^A-Za-z0-9]/g, '');

            // Limitar la longitud a 40 caracteres
            cleanedInput = cleanedInput.slice(0, 40);

            // Dividir en grupos de 10 con "-"
            let formattedCode = cleanedInput.match(/.{1,10}/g).join('-');

            // Establecer el valor formateado en el campo de entrada
            input.value = formattedCode;
        }

        document.addEventListener('livewire:load', function () {
            Livewire.on('existLogin', function () {
                Swal.fire({
                    title: "Acceso no permitido",
                    text: "Ya has iniciado sesión anteriormente en otro dispositivo. No se permite iniciar sesión múltiple.",
                    icon: "error"
                });
            });
            Livewire.on('showAlert', function () {
                Swal.fire({
                    title: "Mensaje enviado.",
                    text: "Se envió un email al correo electrónico para la verificación:",
                    icon: "success"
                }).then(function () {
                    window.location.href = "{{ route('feriafair360') }}";
                });
            });
        });
    </script>

</div>

@livewireScripts

</body>

</html>
