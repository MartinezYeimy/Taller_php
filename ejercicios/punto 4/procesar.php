<?php
require_once "Conjunto.php";
require_once "ConjuntoOperaciones.php";

function limpiarEntrada(string $input): array {
    // Separar por comas y limpiar espacios
    $elementos = array_map('trim', explode(',', $input));

    // Filtrar solo números y letras (sin caracteres especiales)
    $elementosValidos = array_filter($elementos, function($item) {
        return preg_match('/^[a-zA-Z0-9]+$/', $item);
    });

    return array_values($elementosValidos); // Reindexar array
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = isset($_POST['conjunto_a']) ? limpiarEntrada($_POST['conjunto_a']) : [];
    $b = isset($_POST['conjunto_b']) ? limpiarEntrada($_POST['conjunto_b']) : [];

    $conjuntoA = new Conjunto($a);
    $conjuntoB = new Conjunto($b);

    $resultados = [
        'union' => implode(', ', ConjuntoOperaciones::union($conjuntoA, $conjuntoB)->getElementos()),
        'interseccion' => implode(', ', ConjuntoOperaciones::interseccion($conjuntoA, $conjuntoB)->getElementos()),
        'diferencia_ab' => implode(', ', ConjuntoOperaciones::diferencia($conjuntoA, $conjuntoB)->getElementos()),
        'diferencia_ba' => implode(', ', ConjuntoOperaciones::diferencia($conjuntoB, $conjuntoA)->getElementos())
    ];

    
    file_put_contents("resultados.json", json_encode($resultados));

    
    header("Location: resultado.html");
    exit();
}
?>