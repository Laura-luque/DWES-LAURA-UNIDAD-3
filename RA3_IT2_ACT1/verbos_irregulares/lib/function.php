<?php
/**
* Ejercicio test autoescuela unidad 3, actividad evaluable
* 
* @author LauraL
* @category Excersises
* @fecha 02/11/2023 
**/


/**
 * Funcion para limpiar datos de entrada
 * parametro: cadena procedente de un formulario
 * return: cadena limpia
 */
 function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
 ?>