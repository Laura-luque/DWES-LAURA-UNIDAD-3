<?php
/**
* Ejercicios de clase de la Unidad 3
* Carga fecha de nacimiento en variables y calcula la edad
*
* @author LauraL
* @category Excersises
**/
$dia = 29; // Inicializamos variables
$mes = 9;
$anio = 2000;

$diahoy = date("d"); # Sólo obtienes el día
$meshoy = date("m"); # Sólo obtienes el mes, numerico
$aniohoy = date("Y"); # Sólo obtienes el año

$edad = $aniohoy - $anio;
if($meshoy < $mes || ($meshoy == $mes and $diahoy < $dia)){ # Se analiza si el cumpleaños ya ha ocurrido analizando el mes y el día actual con el del cumpleaños.
    $edad--;
}

// VISTA

echo 'La persona con '. $edad;
?>