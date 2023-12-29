<?php

include("db_connection.php");

$path_buscar_todas_las_posturas = "functions\buscar_todas_las_posturas.php";
$path_buscar_por_palabra_clave_postura = "functions\buscar_por_palabra_clave_postura.php";
$path_buscar_todos_los_morfemas = "functions\buscar_todos_los_morfemas.php";
$path_buscar_por_palabra_clave_morfema = "functions\buscar_por_palabra_clave_morfema.php";


$user_filter = isset($_GET['filterOptions']) ? $_GET['filterOptions'] : "";
$user_keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";

$user_filter = mysqli_real_escape_string($connection, trim($user_filter));
$user_keyword = mysqli_real_escape_string($connection, trim($user_keyword));

switch ($user_filter) {
    case "postura":
        if ($user_keyword != "") {
            include($path_buscar_por_palabra_clave_postura);
        }
        break;
    case "morfema":
        if ($user_keyword != "") {
            include($path_buscar_por_palabra_clave_morfema);
        } else {
            include($path_buscar_todos_los_morfemas);
        }
        break;
    default:
        $user_filter = "";
        break;
}

include("header.php");
include("barra_de_busqueda.php");
// indicar que hay resultados para la palabra clave ingresada
if ($user_filter != "" && $user_keyword != "") {
    echo "<h4 class='text-center'>Resultados para la palabra clave: " . $user_keyword . "</h4>";
}
switch ($user_filter) {
    case "postura":
        include("resultados_posturas.php");
        break;
    case "morfema":
        include("resultados_morfemas.php");
        break;
    default:
        header("Location: pagina_inicial.php");
        break;
}

include("footer.php");

?>
