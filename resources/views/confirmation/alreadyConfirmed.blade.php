<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fair 360 | Confirmación - Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gradient-to-br from-blue-700 to-green-500 min-h-screen flex items-center justify-center">
<div class="max-w-md w-full p-8 bg-white shadow-md rounded-lg text-gray-800 relative">
    <!-- Agregado: Imagen redonda -->
    <div class="flex items-center justify-center mb-4">
        <img src="{{asset('img/Logos/logoFair360.png')}}"  title="logo fair360" alt="Imagen Redonda" class="w-20 h-20 rounded-full">
    </div>
    <!-- Fin del agregado -->

    <div class="text-center mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-red-500 mb-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm-1.07 13.07a.75.75 0 01-1.06-1.06l4.25-4.25a.75.75 0 011.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0z"
                  clip-rule="evenodd" />
        </svg>
        <h2 class="text-3xl font-bold mb-2">¡Correo Electrónico Verificado!</h2>
        <p class="text-lg">Tu correo electrónico ya ha sido verificado. Por favor, vuelve a la página de inicio de la aplicación y procede a iniciar sesión.</p>
    </div>
    <div class="flex justify-end">
        <a href="{{route('principal')}}" class="bg-gradient-to-br from-blue-700 to-green-500 text-white py-3 px-6 rounded-full hover:from-blue-600 hover:to-green-400 transition duration-300">Ir a Inicio</a>
    </div>
</div>
</body>

</html>
