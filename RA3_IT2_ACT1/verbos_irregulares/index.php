<?php
/**
 * Ejercicio verbos irregulares unidad 3, actividad evaluable
 * 
 * @author LauraL
 * @category Excersises
 * @fecha 02/11/2023 
**/

include("config/config.php");
include("lib/function.php");

$submit = "submit";
$numVerbosInput = "";
$numVerbosInputErr = "";

$lprocesaFormulario = false;
$lerror = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $lprocesaFormulario = true;
        if (empty($_POST['numVerbosInput']) || $_POST['numVerbosInput'] <= 0 || $_POST['numVerbosInput'] > LENGHT) {
            $numVerbosInputErr = "* El campo no puede estar vacío o ser cero";
            $lerror = true;
        } else {
            $numVerbosInput = test_input($_POST['numVerbosInput']);
            $dificultad = $_POST['dificultad'];
            $numUsuario = $numVerbosInput; // numero que indica el usuario
            $verbosElegidos = []; 

            // Generación de números aleatorios segun lo que indique el usuario
            for ($i = 1; $i <= $numUsuario; $i++) {
                do {
                    $numRand = random_int(0, LENGHT-1);
                } while (in_array($numRand, array_keys($verbosElegidos))); // evitar que se repitan indices
                $verbosElegidos[$numRand] = [];


                for ($j = 1; $j <= $dificultad; $j++) {
                    do {
                        $numRandDif = random_int(1, 3);
                    } while (in_array($numRandDif, $verbosElegidos[$numRand]));
                    array_push($verbosElegidos[$numRand], $numRandDif);
                }
            }

            $cabeceras = array_keys($verbosIrregulares[0]); // cabeceras
            $submit = "comprobar";
        }
    }
    


    if (isset($_POST['comprobar']) || isset($_POST['solucion'])) {
        $lprocesaFormulario = true;
        $verbosElegidos = [];
        $cabeceras = array_keys($verbosIrregulares[0]); // cabeceras
        $acierto = 0;
        foreach($_POST['verbo'] as $key => $value) {
            $verbosElegidos[$key] = array_keys($value);
            foreach($value as $indice => $respuesta) {
                if ($verbosIrregulares[$key][$cabeceras[$indice]] == $respuesta) {
                    $acierto++;
                };
            }
            
        }
        
    }
}


if ($lerror && isset($_POST['submit'])) {
    $lprocesaFormulario = false;
}
else if (isset($_POST['comprobar']) || isset($_POST['solucion'])) {
    $lprocesaFormulario = true;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA3_IT2_ACT1 Laura Luque Bravo</title>
    <style>
        .verde {
            color: green;
        }

        .rojo {
            color: red;
        }
    </style>
</head>
<body>
    <form action="index.php" method="post">
<?php
    if (!$lprocesaFormulario) { ?>
        Indica el número de verbos que quieres prácticar:
        <input type="number" name="numVerbosInput" value=""><br>
        <span class="error"><?php echo $numVerbosInputErr;?></span><br/>

        Indica el nivel de dificultad:
        <select name="dificultad">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select><br/>
        
    <?php
    } else {
        echo "<table text-align:center; border=1>";

            // Creamos  la fila primera de la tabla
            echo "<tr>";
            foreach ($cabeceras as $cabecera) {
                echo "<th>" . $cabecera . "</th>";
            }
            ;
            echo "</tr>";

            echo "<tr>";
            foreach ($verbosElegidos as $indice => $celdaVacia) {
                echo "<tr>";
                $contador = 0; // se pone a 0 porque el array de dentro de verbo es asociativo y hay que sustituirlo por un número
                foreach ($verbosIrregulares[$indice] as $key => $valor) {
                    if (in_array($contador, $celdaVacia) && !isset($_POST['solucion'])) {
                        $respuesta = "";
                        $color = "";
                        if (isset($_POST['verbo'][$indice][$contador])) {
                            $respuesta = $_POST['verbo'][$indice][$contador];
                            if ($respuesta == $valor) {
                                $color = 'verde';
                            }
                            else {
                                $color = 'rojo';
                            }
                        }
                        echo '<td><input class="'.$color.'" type="text" name="verbo['.$indice.']['.$contador.']" value="'.$respuesta.'"/></td>';
                        
                    } else {
                        echo "<td>". $valor ."</td>";
                    }
                    $contador++;
                }
                echo "</tr>";
            }
            echo "</table>";

            echo '<a href="index.php"><button>Volver</button></a>';
        }
        ?>
        <input type="submit" name="<?php echo $submit; ?>" value="Enviar">
        <?php if (isset($acierto)) {
            echo "Total aciertos: ".$acierto."<br>";
            echo '<input type="submit" name="solucion" value="Solución">';

        }?>
    </form>

</body>
</html>