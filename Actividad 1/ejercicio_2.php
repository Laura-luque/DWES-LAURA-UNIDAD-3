<?php
/**
* Ejercicios de clase de la Unidad 3
*
* @author LauraL
* @category Excersises
**/
$mes = 12;
$anio = 2023;
$nDias = 31; // inicializamos a 31 para los meses enero...

switch ($mes) {
    case 2:
        $nDias = 28;
        # Sumamos 1 si es bisiesto
        if ($anio % 4 == 0 and ($anio % 100 != 0 or $anio % 400 ==0)) {
            $nDias++;
        }
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        $nDias = 30;
        break;
}
/**
 * VISTA
 */
echo 'El mes '. $mes . ' del año ' . $anio . ' tiene '. $nDias
?>