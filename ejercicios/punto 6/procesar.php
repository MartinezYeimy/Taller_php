<?php
include 'Arbol.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $preorden = isset($_POST['preorden']) ? explode(',', str_replace(' ', '', $_POST['preorden'])) : [];
    $inorden = isset($_POST['inorden']) ? explode(',', str_replace(' ', '', $_POST['inorden'])) : [];

    if (empty($preorden) || empty($inorden)) {
        echo "<h3>Error: Debe ingresar ambos recorridos.</h3>";
        echo "<a href='index.html'><button>Volver</button></a>";
        exit();
    }

    $arbol = new Arbol();
    $arbol->raiz = $arbol->construirDesdePreInorden($preorden, $inorden);
    session_start();
    $_SESSION['arbol'] = serialize($arbol);
    header("Location: mostrar_arbol.php");
    exit();
}
?>