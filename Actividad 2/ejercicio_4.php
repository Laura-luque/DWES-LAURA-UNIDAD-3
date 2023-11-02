<?php
/**
* Ejercicios de clase bucles de la Unidad 3
* 
* Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor
* hexadecimal que le corresponde. Cada celda será un enlace a una página que
* mostrará un fondo de pantalla con el color seleccionado. ¿Puedes hacerlo con los
* conocimientos que tienes?
* 
* @author LauraL
* @category Excersises
**/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Paleta de Colores</title>
</head>
<body>
    <h1>Paleta de Colores</h1>
    <table border="1">
        <tr>
            <th>Color y su valor hexadecimal</th>
        </tr>
        <?php
        // Generar filas de la tabla con gamas de colores
        for ($r = 0; $r <= 255; $r += 20) {
            for ($g = 0; $g <= 255; $g += 20) {
                for ($b = 0; $b <= 255; $b += 20) {
                    $colorRGB = "rgb($r, $g, $b)";
                    $colorHex = rgbToHex($r, $g, $b);
                    echo '<tr>';
                    echo '<td style="background-color:' . $colorRGB . '; text-align:center;"><a href="?color=' . $colorRGB . '">'. $colorHex. '</a></td>';
                    echo '</tr>';
                }
            }
        }

        // Función para convertir RGB a hexadecimal
        function rgbToHex($r, $g, $b) {
            $hexR = str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
            $hexG = str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
            $hexB = str_pad(dechex($b), 2, "0", STR_PAD_LEFT);
            return "#" . $hexR . $hexG . $hexB;
        }

        // Coloca la elección del usuario como fondo de color en la propia página
        if (isset($_GET['color'])) {
            $colorSeleccionado = $_GET['color'];
            echo '<style>body { background-color: ' . $colorSeleccionado . '; }</style>';
        }
        ?>
    </table>
</body>
</html>
