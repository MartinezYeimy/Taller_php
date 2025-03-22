<?php
include 'conversion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $converter = new conversion($number);

    if ($converter->isValidInteger()) {
        $binary = $converter->convertToBinary();
        echo "<h1>Resultado: $binary</h1>";
    } else {
        echo "<h1>El valor ingresado es inválido, debe ingresar únicamente números enteros.</h1>";
    }
}
?>