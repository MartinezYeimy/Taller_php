<?php
include 'Arbol.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $preorden = isset($_POST['preorden']) ? explode(',', str_replace(' ', '', $_POST['preorden'])) : [];
    $inorden = isset($_POST['inorden']) ? explode(',', str_replace(' ', '', $_POST['inorden'])) : [];

    if (count($preorden) > 0 && count($inorden) > 0) {
        $arbol = new Arbol();
        $arbol->raiz = $arbol->construirDesdePreInorden($preorden, $inorden);
        session_start();
        $_SESSION['arbol'] = serialize($arbol);
        header("Location: mostrar_arbol.php");
        exit();
    } else {
        echo "Por favor ingrese al menos dos recorridos.";
    }
}
?>