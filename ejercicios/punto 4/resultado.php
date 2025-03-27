<?php
$contenido = file_exists("resultado.html") ? file_get_contents("resultado.html") : "<h3>Error: No se encontraron resultados.</h3><a href='index.html'><button>Volver</button></a>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
</head>
<body>
    <?php echo $contenido; ?>
</body>
</html>