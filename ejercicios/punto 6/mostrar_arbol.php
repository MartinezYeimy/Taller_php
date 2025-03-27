<?php
session_start();
include 'Arbol.php'; 

if (!isset($_SESSION['arbol'])) {
    echo "<h3>No hay árbol para mostrar.</h3>";
    echo "<a href='index.html'><button>Volver</button></a>";
    exit();
}

$arbol = unserialize($_SESSION['arbol']);

function generarEstructuraArbol($nodo) {
    if ($nodo == null) return "";

    $html = "<li><div class='nodo'>{$nodo->valor}</div>";
    if ($nodo->izquierdo || $nodo->derecho) {
        $html .= "<ul class='hijos'>";
        if ($nodo->izquierdo) {
            $html .= generarEstructuraArbol($nodo->izquierdo);
        } else {
            $html .= "<li class='espacio-vacio'></li>"; 
        }
        if ($nodo->derecho) {
            $html .= generarEstructuraArbol($nodo->derecho);
        } else {
            $html .= "<li class='espacio-vacio'></li>"; 
        }
        $html .= "</ul>";
    }
    $html .= "</li>";

    return $html;
}

$estructuraArbol = "<ul class='arbol'>" . generarEstructuraArbol($arbol->raiz) . "</ul>";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Árbol Binario</title>
    <style>
       .arbol {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 0;
}

ul {
    list-style-type: none;
    padding: 0;
    position: relative;
    text-align: center;
}

ul.hijos {
    display: flex;
    justify-content: center;
    padding-top: 20px;
    position: relative;
}

.nodo {
    display: inline-block;
    padding: 10px;
    border-radius: 10px;
    background: lightblue;
    border: 1px solid black;
    margin: 5px;
    position: relative;
}


.hijos::before {
    content: "";
    position: absolute;
    top: 0;
    left: 1%;
    width: 0;
    height: 30px;
    border-left: 0px solid black;
}


.hijos li::before, .hijos li::after {
    content: "";
    position: absolute;
    top: 1px;
    width: 70%;
    height: 35px;
    border-top: 1px solid black;
}

.hijos li::before {
    left: 0;
    border-right: 1px solid black;
}

.hijos li::after {
    right: 0;
    border-left: 1px solid black;
}

.hijos li::after, .hijos li::before {
    top: -10px;
}

.hijos li:first-child::before {
    display: none;
}

.hijos li:last-child::after {
    display: none;
}


.espacio-vacio {
    visibility: hidden;
    width: 50px; 
}

button {
    margin-top: 20px;
    padding: 10px;
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <h2>Árbol Binario</h2>
    <div><?php echo $estructuraArbol; ?></div>
    <a href="index.html"><button>Volver</button></a>
</body>
</html>