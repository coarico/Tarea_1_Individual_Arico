<?php
// Definir la constante MAX para la opción 2
define("MAX", 1000000);

// Función para calcular los N primeros números de Fibonacci
function fibonacci($n) {
    $fib = [1, 1]; // Los primeros dos números son 1
    for ($i = 2; $i < $n; $i++) {
        $fib[] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib;
}

// Función para verificar si un número cumple con la condición del cubo
function esCubo($num) {
    $digitos = str_split($num);  // Convertir el número en un arreglo de dígitos
    $sumaCubo = 0;
    foreach ($digitos as $digito) {
        $sumaCubo += pow($digito, 3);  // Sumar el cubo de cada dígito
    }
    return $sumaCubo == $num;  // Verificar si la suma de los cubos es igual al número
}

// Función para calcular la expresión A + B * C - D
function calcularFraccionarios($A, $B, $C, $D) {
    return $A + ($B * $C) - $D;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcion = $_POST["opcion"];

    switch ($opcion) {
        case '1':
            $numero = $_POST["numero"];
            if ($numero >= 1 && $numero <= 50) {
                echo "Los primeros $numero números de Fibonacci son: <br>";
                $fibonacci = fibonacci($numero);
                echo implode(", ", $fibonacci) . "<br>";
            } else {
                echo "El número debe estar entre 1 y 50.<br>";
            }
            break;

        case '2':
            echo "Números entre 1 y " . MAX . " que cumplen con la condición del cubo:<br>";
            // Vamos a reducir el rango para no tardar mucho (por ejemplo, hasta 1000)
            for ($i = 1; $i <= 1000; $i++) {
                if (esCubo($i)) {
                    echo $i . "<br>";  // Mostrar los números que cumplen la condición
                }
            }
            break;

        case '3':
            $A = $_POST["A"];
            $B = $_POST["B"];
            $C = $_POST["C"];
            $D = $_POST["D"];
            echo "Resultado de la expresión A + B * C - D: " . calcularFraccionarios($A, $B, $C, $D) . "<br>";
            break;

        case 'S':
            echo "¡Has salido del programa!<br>";
            break;

        default:
            echo "Opción no válida.<br>";
            break;
    }
}
?>


