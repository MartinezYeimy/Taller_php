<?php
require_once "Conjunto.php";
require_once "ConjuntoOperaciones.php";

function limpiarEntrada(string $input): array {
    $elementos = array_map('trim', explode(',', $input));
    $elementosValidos = array_filter($elementos, fn($item) => preg_match('/^[a-zA-Z0-9]+$/', $item));
    return array_values($elementosValidos);
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

    $contenido = "<h2>Resultados de las Operaciones</h2>";
    $contenido .= "<p><strong>Unión (A ∪ B):</strong> { " . $resultados['union'] . " }</p>";
    $contenido .= "<p><strong>Intersección (A ∩ B):</strong> { " . $resultados['interseccion'] . " }</p>";
    $contenido .= "<p><strong>Diferencia (A - B):</strong> { " . $resultados['diferencia_ab'] . " }</p>";
    $contenido .= "<p><strong>Diferencia (B - A):</strong> { " . $resultados['diferencia_ba'] . " }</p>";
    $contenido .= "<br><a href='index.html'><button>Volver</button></a>";

    file_put_contents("resultado.html", $contenido);
    header("Location: resultado.php");
    exit();
}
?>