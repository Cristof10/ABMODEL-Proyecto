<?php

include("db_connection.php");
// Supongamos que ya tienes una conexión a la base de datos llamada $connection

// Obtener la palabra proporcionada por el usuario desde la página web

//echo "<br>";

// Obtener el filtro proporcionado por el usuario desde la página web
// Verifica si la variable GET 'filterOptions' está definida
if (isset($_GET['filterOptions'])) {
    // Si está definida, realiza la búsqueda
    $user_filter = $_GET['filterOptions'];
    if ($user_filter == "postura") {
        // Verifica si la variable GET 'keyword' está definida
        if (isset($_GET['keyword'])) {
            // Si está definida, realiza la búsqueda
            $user_keyword = $_GET['keyword'];
            $user_keyword = mysqli_real_escape_string($connection, $user_keyword);
            include("buscar_por_palabra_clave.php");
        } 
    } else if ($user_filter == "morfema") {
        // Verifica si la variable GET 'keyword' está definida
        if (isset($_GET['keyword'])) {
            // Si está definida, realiza la búsqueda
            $user_keyword = $_GET['keyword'];
            $user_keyword = mysqli_real_escape_string($connection, $user_keyword);
            include("buscar_por_palabra_clave_morfema.php");
        } else {
            include("buscar_todos_los_morfemas.php");
        }

    } else {
        $user_filter = "";
    }
} else {
    $user_filter = "";
}
$user_filter = mysqli_real_escape_string($connection, $user_filter);


include("header.php");
include("barra_de_busqueda.php");
if ($user_filter == "postura") {
    include("resultados_posturas.php");
} else if ($user_filter == "morfema") {
    include("resultados_morfemas.php");
} else {
    header("Location: pagina_inicial.php");
}
include("footer.php");

?>