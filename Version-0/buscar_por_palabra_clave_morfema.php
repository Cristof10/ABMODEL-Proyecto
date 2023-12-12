<?php 

include("db_connection.php");
// construir la consulta SQL para obtener la información del morfema 
$sql = "SELECT m.morfemaID, m.morfemaSanskrit, m.morfemaSpanish ";
$sql .= "FROM morfema m ";
$sql .= "WHERE m.morfemaSanskrit LIKE '%$user_keyword%' OR m.morfemaSpanish LIKE '%$user_keyword%'";
// Ejecutar la consulta
$resultado = mysqli_query($connection, $sql) or die(mysqli_error($connection));
// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    $morfemas = array();
    // Iterar sobre los resultados y organizar la información por morfema
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $morfemaID = $fila['morfemaID'];
        $morfemaSanskrit = $fila['morfemaSanskrit'];
        $morfemaSpanish = $fila['morfemaSpanish'];
        // Organizar la información por morfema
        if (!isset($morfemas[$morfemaID])) {
            $morfemas[$morfemaID] = array(
                'morfemaID' => $morfemaID,
                'morfemaSanskrit' => $morfemaSanskrit,
                'morfemaSpanish' => $morfemaSpanish,
            );
        }
    }
}


?>