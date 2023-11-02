<?php
/**
 * Ejercicio test autoescuela unidad 3, actividad evaluable
 * 
 * @author LauraL
 * @category Excersises
 * @fecha 02/11/2023 
**/

include("./config/tests_cnf.php");

$procesaFormulario = false;


if (isset($_POST['testElegido'])) {
    $procesaFormulario = true;
}
else if (isset($_POST['comprobarTest'])) {
    $procesaFormulario = true;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RA3_IT2_ACT1 Laura Luque Bravo</title>
</head>

<body>
    <h1>Test de conducir</h1>
    <form action="index.php" method="post">
    <?php
        if (!$procesaFormulario) { ?>
        <label for="test">Selecciona un test:</label>
        <select name="test" id="">
            <?php
            foreach ($aTests as $test) {
                echo '<option value="' . $test["idTest"] . '">Id: ' . $test["idTest"] . '-Permiso: ' . $test["Permiso"] . '-Categoría: ' . $test["Categoria"] . '</option>';
            }
            ?>
        </select><br>
        <input type="submit" name="testElegido" value="Comenzar test">
        <?php
        } else {
            if (isset($_POST["testElegido"]) || isset($_POST["comprobarTest"])) {
                $numTest = intval($_POST['test']) - 1;
                
                if (isset($_POST["comprobarTest"])) {
                    $aciertos = 0;
                    $fallos = 0;
                    foreach ($aTests[$numTest]["Corrector"] as $indiceCorrecta => $opcionCorrecta) {
                        if ($_POST['respuesta'][$indiceCorrecta] == $opcionCorrecta) {
                            $aciertos++;
                        } else {
                            $fallos++;
                        }
                    }
                    
                    if ($fallos <3) {
                        echo '<h2>😊 Has superado el test con '.$aciertos.' aciertos de un total de '.$indiceCorrecta + 1 .' preguntas 😊</h2>';
                    } else {
                        echo '<h2>Has tenido un total de '.$fallos.' fallos.</h2>'; 
                        echo '<h2>☹️ No has superado el test ☹️</h2>';
                    }
                }

                foreach ($aTests[$numTest]["Preguntas"] as $id => $pregunta) {
                    echo $pregunta["Pregunta"] . "<br>";
                    $rutaImagen = 'dir_img_test' . $numTest + 1 . '/img' . $id + 1 . '.jpg';
    
                    if (file_exists($rutaImagen)) {
                        echo '<img src="' . $rutaImagen . '"><br/>';
                    }
                    foreach ($pregunta["respuestas"] as $indice => $value) {
                        switch ($indice) {
                            case 0:
                                $valor = "a";
                                break;
                            case 1:
                                $valor = "b";
                                break;
                            case 2:
                                $valor = "c";
                                break;
                            default:
                                $valor = "";
                                break;

                        }
                        $seleccionado = '';
                        if (isset($_POST['respuesta'][$id])) {
                            if ($_POST['respuesta'][$id] == $valor) {
                                $seleccionado = 'checked';
                            }
                        }
                        echo '<input type="radio" name="respuesta[' . $id . ']" value="' . $valor . '" '.$seleccionado.'>' . $value . '</br>';
                    }
                }
                echo '<input type="submit" name="comprobarTest" value="Evaluar test">';
                echo '<input type="hidden" name="test" value="'. $_POST['test'] .'">';

                
            }
            
        }?>
    </form>
</body>

</html>

<?php
?>