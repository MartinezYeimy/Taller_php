<?php
session_start();

if (!isset($_SESSION['arbol'])) {
    echo "Árbol vacío.";
} else {
    echo "<pre>";
    echo $_SESSION['arbol']->mostrarArbol($_SESSION['arbol']->raiz);
    echo "</pre>";
}
?>