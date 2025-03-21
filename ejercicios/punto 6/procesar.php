<?php
include 'Arbol.php';

session_start();

if (!isset($_SESSION['arbol'])) {
    $_SESSION['arbol'] = new Arbol();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valor = intval($_POST['valor']);
    $_SESSION['arbol']->insertar($valor);
}

header("Location: index.php");
exit();
?>
