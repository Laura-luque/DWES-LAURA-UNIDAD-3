<?php
/**
* Ejercicios de clase bucles de la Unidad 3
* 
* Sumar los 3 primeros números pares
* 
* @author LauraL
* @category Excersises
**/

$resultado = 0;
$contador = 1;

while ($contador<=2) {
    $par = $contador * 2;
    $resultado += $par;
    $contador++;

}
echo $resultado;

?>