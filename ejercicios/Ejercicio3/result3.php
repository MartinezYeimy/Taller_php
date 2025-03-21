<?php
include 'calculos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numbers = explode(',', $_POST['numbers']);
    $numbers = array_map('floatval', $numbers);
    $calculator = new calculos($numbers);

    if ($calculator->isValidNumbers()) {
        $average = $calculator->calculateAverage();
        $median = $calculator->calculateMedian();
        $modeArray = $calculator->calculateMode();

        echo "<h1>Resultados:</h1>";
        echo "<p>Promedio: $average</p>";
        echo "<p>Media: $median</p>";

        if (count($modeArray) == count($numbers)) {
            echo "<p>Moda: No hay moda (todos los valores son únicos)</p>";
        } else {
            $mode = implode(', ', $modeArray);
            echo "<p>Moda: $mode</p>";
        }

        echo '<button onclick="window.location.href=\'index.html\'">Regresar</button>';
    } else {
        echo "<h1>El valor ingresado es inválido, debe ingresar únicamente números reales.</h1>";
        echo '<button onclick="window.location.href=\'index.html\'">Regresar</button>';
    }
}
?>
       