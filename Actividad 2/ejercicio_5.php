<?php
/**
* Ejercicios de clase bucles de la Unidad 3
* 
* Dado el mes y año almacenados en variables, escribir un programa que muestre el calendario mensual correspondiente. Marcar el día actual en verde y los festivos en rojo.
* 
* @author LauraL
* @category Excersises
**/
echo "<table border='1'>";
echo "<tr><th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th><th>Vie</th><th>Sab</th><th>Dom</th></tr>";

$num = 7;
$fila = 4;

for ($i=0; $i < $fila; $i++) {
     echo "<tr>";  
    for ($j=0; $j < $num ; $j++) { 
      echo "<td>-------------------------</td>";   
    }
    echo "</tr>";
}


?>