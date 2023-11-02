<?php
/**
* Ejercicios de clase bucles de la Unidad 3
* 
* Tablas de multiplicar del 1 al 10. Aplicar estilos en filas/columnas
* 
* @author LauraL
* @category Excersises
**/

// Inicializamos las variables
$multiplicando;
$multiplicador;

// Comenzamos creando una tabla con estilo
echo "<table text-align:center; border=5>";
// Creamos  la fila primera de la tabla
echo "<tr>";

// Creamos la celda vacía de la esquina
echo "<td></td>";

// Creamos con un bucle for el resto de columnas de la tabla
for ($tabla=1; $tabla<=10  ; $tabla++) { 
	echo "<td>$tabla </td>";
}
echo "</tr>";

// Creamos la siguiente fila de la tabla
echo "<tr>";

// Creamos mediante dos bucles for el relleno de la tabla
for ($multiplicador=1; $multiplicador <=10 ; $multiplicador++) { 
    // Creamos las celdas con los número del 1 al 10
    echo "<td>$multiplicador</td>";
	for ($multiplicando=1; $multiplicando <=10 ; $multiplicando++) { 
        $resultado = $multiplicando*$multiplicador;
		echo "<td>$resultado</td>";
	}
	echo "</tr>";
}
echo "</table>";

