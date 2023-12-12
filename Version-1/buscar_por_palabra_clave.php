<?php
// Construir la consulta SQL para obtener la información de la postura y sus morfemas asociados
$sql = "SELECT pd.terminoID, pd.terminoEnglish, pd.terminoSanskrit, pd.terminoSpanish, pd.imagenURL, m.morfemaSanskrit AS traduccionMorfemaSanskrit, m.morfemaSpanish AS traduccionMorfemaSpanish ";
$sql .= "FROM postura pd ";
$sql .= "LEFT JOIN relacion_postura_morfema rpm ON pd.terminoID = rpm.terminoID ";
$sql .= "LEFT JOIN morfema m ON rpm.morfemaID = m.morfemaID ";
$sql .= "WHERE pd.terminoEnglish LIKE '%$user_keyword%' OR pd.terminoSanskrit LIKE '%$user_keyword%' OR pd.terminoSpanish LIKE '%$user_keyword%'";

// Ejecutar la consulta

$resultado = mysqli_query($connection, $sql) or die(mysqli_error($connection));

/// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    $posturas = array();

    // Iterar sobre los resultados y organizar la información por postura
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $terminoID = $fila['terminoID'];
        $terminoEnglish = $fila['terminoEnglish'];
        $terminoSanskrit = $fila['terminoSanskrit'];
        $terminoSpanish = $fila['terminoSpanish'];
        $imagenURL = $fila['imagenURL'];

        // Organizar la información por postura
        if (!isset($posturas[$terminoID])) {
            $posturas[$terminoID] = array(
                'terminoID' => $terminoID,
                'terminoEnglish' => $terminoEnglish,
                'terminoSanskrit' => $terminoSanskrit,
                'terminoSpanish' => $terminoSpanish,
                'imagenURL' => $imagenURL,
                // Agregar información de morfemas a la postura
                'morfemas' => array()
            );
        }

        // Verificar si hay morfemas relacionados antes de agregar la información de morfemas
        if (!empty($fila['traduccionMorfemaSanskrit']) || !empty($fila['traduccionMorfemaSpanish'])) {
            // Agregar información de morfemas a la postura
            $traduccionMorfemaSanskrit = $fila['traduccionMorfemaSanskrit'];
            $traduccionMorfemaSpanish = $fila['traduccionMorfemaSpanish'];

            $posturas[$terminoID]['morfemas'][] = array(
                'traduccionMorfemaSanskrit' => $traduccionMorfemaSanskrit,
                'traduccionMorfemaSpanish' => $traduccionMorfemaSpanish,
            );
        }
    }
}
    /*
    // Mostrar la información en la interfaz de usuario
    foreach ($posturas as $postura) {
        echo "Término ID: " . $postura['terminoID'] . "<br>";
        echo "English: " . $postura['terminoEnglish'] . "<br>";
        echo "Sanskrit: " . $postura['terminoSanskrit'] . "<br>";
        echo "Spanish: " . $postura['terminoSpanish'] . "<br>";

        // Mostrar la descomposición en morfemas si hay morfemas relacionados
        if (!empty($postura['morfemas'])) {
            echo "Descomposición en Morfemas:<br>";
            foreach ($postura['morfemas'] as $morfemaInfo) {
                echo "- Traducción (Sanskrit): " . $morfemaInfo['traduccionMorfemaSanskrit'] . "<br>";
                echo "- Traducción (Spanish): " . $morfemaInfo['traduccionMorfemaSpanish'] . "<br>";
            }
        } else {
            echo "No hay morfemas relacionados.<br>";
        }

        echo "<br>";
        //imprimir el array en consola 
        echo "<script> console.log(" . json_encode($postura) . ") </script>";
    }
    */
    
 else {
    echo "No se encontraron resultados.";
}
?>