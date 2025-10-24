<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAIR360 | Términos y Condiciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gradient-to-br from-blue-700 to-green-500 min-h-screen flex items-center justify-center">
<div class="max-w-4xl w-full p-8 bg-white shadow-md rounded-lg text-gray-800 overflow-auto" style="border-left: 10px solid #10B981;">
    <div class="flex items-center justify-center mb-4">
        <img src="{{ asset('img/Logos/logoFair360.png') }}" alt="Imagen Redonda" class="w-20 h-20 rounded-full">
    </div>
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold">Términos y Condiciones</h2>
        <p class="text-lg">Bienvenido a FAIR360, la feria virtual líder en...</p>
    </div>

    <div class="mb-8">
        <!-- Agregamos un contenedor con altura máxima y overflow-auto para permitir el scroll -->
        <div class="max-h-80 overflow-auto">
            <h3 class="text-xl font-semibold mb-2">1. Protección de Datos</h3>
            <p class="mb-4">En FAIR360, nos comprometemos a proteger tus datos personales. Consulta nuestra política de privacidad para obtener detalles sobre cómo manejamos la información.</p>

            <h3 class="text-xl font-semibold mb-2">2. Propiedad Intelectual</h3>
            <p class="mb-4">Todos los derechos de propiedad intelectual, incluidos logos y contenidos, son propiedad exclusiva de FAIR360. No se permite la reproducción no autorizada.</p>

            <h3 class="text-xl font-semibold mb-2">3. Uso del Servicio</h3>
            <p class="mb-4">El uso de FAIR360 está sujeto a estos términos. No se permite el acceso no autorizado o el uso indebido del servicio.</p>

            <h3 class="text-xl font-semibold mb-2">4. Contenido del Usuario</h3>
            <p class="mb-4">Los usuarios son responsables del contenido que comparten en FAIR360. No se permite el envío de contenido ilegal o que viole los derechos de terceros.</p>

            <h3 class="text-xl font-semibold mb-2">5. Responsabilidad</h3>
            <p class="mb-4">FAIR360 no se hace responsable de pérdidas o daños causados por el uso del servicio. Se recomienda precaución al interactuar con otros usuarios y expositores.</p>

            <h3 class="text-xl font-semibold mb-2">6. Cancelación y Reembolsos</h3>
            <p class="mb-4">Las políticas de cancelación y reembolso están sujetas a las condiciones específicas de cada expositor. Consulta las políticas individuales antes de realizar una compra.</p>

        </div>
    </div>

    <div>
        <p class="mb-4">Estos términos y condiciones rigen el uso de nuestro servicio. Al acceder y utilizar FAIR360, aceptas cumplir con estos términos y condiciones. Si no estás de acuerdo con alguno de estos términos, por favor, no uses nuestro servicio.</p>

        <!-- Aplicamos clases de texto más pequeñas al botón -->
        <div class="flex justify-end">
            <a href="{{ route('principal') }}" class="text-sm bg-gradient-to-br from-blue-700 to-green-500 text-white py-2 px-4 rounded-full hover:from-blue-600 hover:to-green-400 transition duration-300">Volver a Inicio</a>
        </div>
    </div>
</div>

</body>
</html>
