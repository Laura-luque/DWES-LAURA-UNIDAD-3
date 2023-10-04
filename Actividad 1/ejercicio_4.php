<?php
/**
* Ejercicios de clase de la Unidad 3
* Modifica la página inicial realizada, incluyendo una imagen de cabecera en función de la estación del año en la que nos encontremos y un color de fondo en función de la hora del día.
*
* @author LauraL
* @category Excersises
**/

$colores = ["#FF0000", "#00FF00", "#0000FF", "#FFFF00", "#00FFFF", "#FF00FF", # Array con 24 colores
"#000000", "#FFFFFF", "#808080", "#C0C0C0", "#FFD700", "#FFA500",
"#00FF00", "#8A2BE2", "#FFC0CB", "#87CEEB", "#808000", "#000080",
"#40E0D0", "#FA8072", "#800080", "#FFFACD", "#008000", "#FFB6C1"];

$dia = date("j"); # Indica el dia actual en numero sin ceros
$mes = date("n"); # Inndica el mes actual en numero sin ceros

$estaciones = ""; # Iniciamos variable
if (($mes == 3 && $dia >= 20) || ($mes == 4 || $mes == 5) || ($mes == 6 && $dia < 21)) { # Condicional para filtrar según la fecha del sistema
    $estaciones = "imagenes/primavera.jpg";
} elseif (($mes == 6 && $dia >= 21) || ($mes == 7 || $mes == 8) || ($mes == 9 && $dia < 23)) {
    $estaciones = "imagenes/verano.jpg";
} elseif (($mes == 9 && $dia >= 23) || ($mes == 10 || $mes == 11) || ($mes == 12 && $dia < 21)) {
    $estaciones = "imagenes/fall.jpg";
} else {
    $estaciones = "imagenes/invierno.jpg";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 4</title>
	<style>
		* {
		box-sizing: border-box;
		font-family: Arial, Helvetica, sans-serif;
		}

		body {
		margin: 0;
		font-family: Arial, Helvetica, sans-serif;
		}

		.top {
		overflow: hidden;
		background-color: #333;
		color:white;
		text-align: center;
		}

		.content {
		background-color: #ddd;
		padding: 20px;
		text-align: left;
		height: 560px;
		}

		.footer {
		background-color: #f1f1f1;
		padding: 10px;
		text-align: center;
		}
    
        .fondo {
        background-color: <?php echo $colores[date("G")]; ?>; /* Se crea la clase fondo y en backgroung-color incluimos el codigo PHP para los colores según la hora del sistema*/ 
        } 
        
	</style>
</head>
<body>
	<div class="top fondo">
		<h1>Laura Luque Bravo</h1>
        <img src="<?php echo $estaciones;?>" content="estacion"> <!-- Incluye la imagen en el div del body y en src incluimos el codigo PHP para cambiar la imagen según la fecha del sistema-->
	</div>

	<div class="content">
  		<h2>Mis datos</h2>
  		<p>Nombre: Laura Luque Bravo</p>
		<p>Edad: 32 años</p>
		<p>Formación:
			<ul>
				<li>Máster Bioinformática y bioestadística</li>
				<li>Grado Biología</li>
				<li>Técnico superior de laboratorio de diagnóstico clínico</li>
			</ul>
		</p>
	</div>

	<div class="footer">
  		<p>Más info: https://www.linkedin.com/in/laura-luquebravo-897568106</p>
	</div>
	
</body>
</html>
