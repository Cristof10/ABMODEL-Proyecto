
    <?php

    // Obtén la ruta de la solicitud
    $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

    // Verifica si la ruta de la solicitud es la raíz
    if ($request_uri[0] == '/') {
        // En este caso, envía el archivo HTML inicial
        require 'pagina_inicial.php';
    } else {
        // Para todas las demás rutas, muestra un error 404
        header('HTTP/1.0 404 Not Found');
        echo 'Página no encontrada!';
    }


    ?>
    






