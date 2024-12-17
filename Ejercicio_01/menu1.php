<?php
// Función para calcular el factorial
function factorial($num) {
    $fact = 1;
    for ($i = 1; $i <= $num; $i++) {
        $fact *= $i;
    }
    return $fact;
}

// Función para verificar si un número es primo
function esPrimo($num) {
    if ($num <= 1) return false;
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

// Función para calcular la serie matemática
function serieMatematica($num) {
    $resultado = 0.0;
    for ($i = 1; $i <= $num; $i++) {
        $termino = pow($i, 2) / factorial($i);
        if ($i % 2 == 0) {
            $resultado -= $termino;
        } else {
            $resultado += $termino;
        }
    }
    return $resultado;
}

// Validación y ejecución de la opción seleccionada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcion = $_POST["opcion"];
    $numero = isset($_POST["numero"]) ? $_POST["numero"] : null;
    
    // Verificar si la opción es "S" para salir
    if (strtoupper($opcion) == "S") {
        echo "¡Has salido del programa!<br>";
        exit; // Finaliza el script
    }

    // Validar el número solo si no se seleccionó "S"
    if ($numero !== null && ($numero < 0 || $numero > 10)) {
        echo "El número debe estar entre 0 y 10.<br>";
    }

    // Acción según la opción elegida
    switch ($opcion) {
        case '1':
            echo "Factorial de $numero es: " . factorial($numero) . "<br>";
            break;

        case '2':
            if (esPrimo($numero)) {
                echo "$numero es primo.<br>";
            } else {
                echo "$numero no es primo.<br>";
            }
            break;

        case '3':
            echo "Serie Matemática con $numero términos: " . serieMatematica($numero) . "<br>";
            break;

        default:
            echo "Opción no válida.<br>";
            break;
    }
}
?>

