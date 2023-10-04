<?php
/**
* Ejercicios de clase de la Unidad 3
* Script que muestre una lista de enlaces en función del perfil de usuario: 
* Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4 
* Perfil Usuario: Pagina1, Pagina2
*
* @author LauraL
* @category Excersises
**/

// Inicializamos las variables
$perfil = "administrador";

// Creamos los arrays para cada tipo de usuario
$enlace_admin = array("Página 1", "Página 2", "Página 3");
$enlace_usuario = array("Página 1", "Página 2");

// Mediante condiciones, modificamos el nombre introducido a minúsculas con strtolower() y según el usuario introducido
// se muestra una lista de sus enlaces
if (strtolower($perfil) === "administrador") {
    echo "<h2>Enlaces para Administrador:</h2>";
    echo "<ul>";
    foreach ($enlace_admin as $enlace) {
        echo '<li><a href="' . $enlace . '.php">' . $enlace . '</a></li>';
    }
    echo '</ul>';
} elseif (strtolower($perfil) === "usuario") {
    echo "<h2>Enlaces para Usuario:</h2>";
    echo "<ul>";
    foreach ($enlace_usuario as $enlace) {
        echo '<li><a href="' . $enlace . '.php">' . $enlace . '</a></li>';
    }
    echo '</ul>';
} else {
    echo 'Perfil de usuario no válido';
}

?>