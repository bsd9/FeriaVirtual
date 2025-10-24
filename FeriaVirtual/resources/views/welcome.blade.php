<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu aplicación Laravel</title>
</head>
<body>

<!-- Contenido de tu aplicación Laravel -->

<script>
    // Verificar el tamaño de la pantalla
    function checkScreenSize() {
        if (window.matchMedia("(max-width: 768px)").matches) {
            alert("Por favor, gire su dispositivo para una mejor experiencia.");
        }
    }

    // Ejecutar la función al cargar la página
    window.onload = checkScreenSize;

    // También puedes ejecutar la función en eventos como 'resize'
    window.addEventListener('resize', checkScreenSize);
</script>
</body>
</html>
