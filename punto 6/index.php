<?php include 'mostrar_arbol.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario en PHP</title>
</head>
<body>
    <h2>Insertar Nodo en el Árbol</h2>
    <form action="procesar.php" method="post">
        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="valor" required>
        <button type="submit">Insertar</button>
    </form>

    <h2>Representación del Árbol</h2>
    <div id="resultado">
        <?php include 'mostrar_arbol.php'; ?>
    </div>
</body>
</html>