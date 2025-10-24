<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fair 360 | Confirmación - Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gradient-to-br from-blue-700 to-green-500 min-h-screen flex items-center justify-center">

<div class="max-w-md w-full p-8 bg-white shadow-md rounded-lg text-gray-800">
    <div class="flex items-center justify-center mb-4">
        <img src="{{asset('img/Logos/logoFair360.png')}}" alt="Imagen Redonda" class="w-20 h-20 rounded-full">
    </div>
    <div class="text-center mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-10 w-10 text-red-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm-1.07 13.07a.75.75 0 01-1.06-1.06l4.25-4.25a.75.75 0 011.06 1.06l-4.25 4.25a.75.75 0 01-1.06 0z" clip-rule="evenodd"/>
        </svg>
        <h2 class="text-3xl font-bold">¡Código Inválido o Expirado!</h2>
        <p class="text-lg">El código de confirmación proporcionado es inválido o ha expirado. Por favor, verifica o solicita uno nuevo.</p>
    </div>

    <div>
        <form action="{{ route('confirmationCodeResend') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold mb-2">Correo Electrónico</label>
                <div class="flex items-center border border-gray-300 rounded">
                    <span class="text-gray-600 p-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2z"/>
                        </svg>
                    </span>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="w-full p-3 bg-transparent rounded-r focus:outline-none"
                        required
                    >
                </div>
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-gradient-to-br from-blue-700 to-green-500 text-white py-3 px-6 rounded-full hover:from-blue-600 hover:to-green-400 transition duration-300">Reenviar Código</button>
            </div>
        </form>
    </div>
</div>



</body>
</html>
