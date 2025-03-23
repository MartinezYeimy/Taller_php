<?php

class acronimo {
    public static function convertir($frase) {
        $frase = preg_replace('/[^a-zA-Z0-9\s-]/', '', $frase); 
        $palabras = preg_split('/[\s-]+/', $frase);
        $acronimo = strtoupper(implode('', array_map(fn($palabra) => $palabra[0], $palabras)));
        return $acronimo;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST['frase'] ?? '';
    $resultado = acronimo::convertir($frase);
    echo "<h2>Resultado: $resultado</h2>";
}
?>