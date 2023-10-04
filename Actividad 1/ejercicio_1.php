<?php
/**
* Ejercicios de clase de la Unidad 3
*
* @author LauraL
* @category Excersises
**/

$num1 = 30; // Inicializamos variables
$num2 = 12;
$num3 = 10;

# Ordena de menor a mayor los 3 números:
if ($num1 <= $num2 and $num1 <= $num3) {
    if ($num2 <= $num3){
        echo $num1 . " " . $num2 . " " . $num3;
    } else {
        echo $num1 . " " . $num3 . " " . $num2;
    }
} elseif ($num2 <= $num1 and $num2 <= $num3) {
    if ($num1 <= $num3) {
        echo $num2 . " " . $num1 . " " . $num3;
    } else {
        echo $num2 . " " . $num3 . " " . $num1;
    }
} else {
    if ($num1 <= $num2) {
        echo $num3 . " " . $num1 . " " . $num2;
    } else {
        echo $num3 . " " . $num2 . " " . $num1;
    }
}

?>