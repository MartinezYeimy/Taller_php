<?php
session_start();
require_once 'Arbol.php';

if (!isset($_SESSION['arbol'])) {
    echo "No hay árbol para mostrar.";
    exit();
}

$arbol = unserialize($_SESSION['arbol']);

function mostrarRecorrido($nodo) {
    if ($nodo == null) {
        return;
    }
    
    echo "<li>";
    echo "<div class='nodo'>" . $nodo->valor . "</div>";
    
    if ($nodo->izquierdo || $nodo->derecho) {
        echo "<ul>";
        if ($nodo->izquierdo) {
            mostrarRecorrido($nodo->izquierdo);
        }
        if ($nodo->derecho) {
            mostrarRecorrido($nodo->derecho);
        }
        echo "</ul>";
    }
    
    echo "</li>";
}

echo "<h2>Árbol Binario</h2>";
echo "<div class='contenedor-arbol'>";
echo "<ul class='arbol'>";
mostrarRecorrido($arbol->raiz);
echo "</ul>";
echo "</div>";
?>
<style>
    .contenedor-arbol {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .arbol {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 0;
        list-style-type: none;
    }

    .arbol ul {
        display: flex;
        justify-content: center;
        padding: 0;
        list-style-type: none;
    }

    .arbol li {
        position: relative;
        text-align: center;
        list-style-type: none;
        padding: 20px;
    }

    .nodo {
        display: inline-block;
        padding: 10px;
        border-radius: 10px;
        border: 2px solid black;
        background-color: lightblue;
        font-weight: bold;
        min-width: 30px;
    }

    .arbol li::before, .arbol li::after {
        content: "";
        position: absolute;
        top: -2px;
        width: 50%;
        height: 20px;
        border-top: 2px solid black;
    }

    .arbol li::before {
        right: 50%;
        border-right: 2px solid black;
    }

    .arbol li::after {
        left: 50%;
        border-left: 2px solid black;
    }

    .arbol li:first-child::before,
    .arbol li:last-child::after {
        display: none;
    }
</style>