<?php
include 'Fibonacci.php';
include 'Factorial.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];
    $operation = $_POST['operation'];

    if (filter_var($number, FILTER_VALIDATE_INT) !== false && intval($number) > 0) {
        $number = intval($number);

        if ($operation == 'fibonacci') {
            $calculator = new Fibonacci($number);
            $result = $calculator->calculate();
            $resultString = implode(', ', $result);
            echo "<h1>Sucesión de Fibonacci:</h1>";
            echo "<p>$resultString</p>";
        } elseif ($operation == 'factorial') {
            $calculator = new Factorial($number);
            list($result, $procedure) = $calculator->calculate();
            echo "<h1>Factorial:</h1>";
            echo "<p>$number! = $procedure = $result</p>";
        }
    } else {
        echo "<h1>El valor ingresado es inválido, debe ingresar únicamente números enteros positivos.</h1>";
    }

    echo '<button onclick="window.location.href=\'index.html\'">Regresar</button>';
}
?>