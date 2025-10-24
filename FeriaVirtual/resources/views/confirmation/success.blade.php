<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fair 360 | Confirmación Exitosa - Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    @livewireStyles
</head>

<body class="bg-gradient-to-br from-blue-500 to-green-500 min-h-screen flex items-center justify-center">

<div class="max-w-md w-full lg:max-w-md p-8 bg-white shadow-md rounded-lg text-gray-800 h-500">
    <div class="text-center mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 lg:h-10 lg:w-10 text-green-500 mb-4" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm-1.07 13.07a.75.75 0 01-1.06-1.06l4.25-4.25a.75.75 0 011.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0z" clip-rule="evenodd"/>
        </svg>
        <h2 class="text-xl lg:text-2xl font-bold mb-2">¡Confirmación Exitosa!</h2>
        <p class="text-sm lg:text-base">Tu registro ha sido confirmado satisfactoriamente. Por favor, inicia sesión para acceder a tu cuenta.</p>
    </div>

    @livewire('mail.mail-confirmation')
</div>

@livewireScripts

</body>

</html>
