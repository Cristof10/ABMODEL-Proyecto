<?php

function buscar_todas_las_posturas(): array {
    // Obtener la conexión a la base de datos
    include("db_connection.php");
    require_once("models/Postura.php");
    require_once("models/Morfema.php");
  
    // Crear la consulta
    $sql = "SELECT pd.terminoID, pd.terminoEnglish, pd.terminoSanskrit, pd.terminoSpanish, pd.imagenURL, pd.videoURL, m.morfemaID, m.morfemaSanskrit, m.morfemaSpanish, m.morfemaEnglish ";
    $sql .= "FROM postura pd ";
    $sql .= "LEFT JOIN relacion_postura_morfema rpm ON pd.terminoID = rpm.terminoID ";
    $sql .= "LEFT JOIN morfema m ON rpm.morfemaID = m.morfemaID ";
  
    // Ejecutar la consulta
    $resultado = mysqli_query($connection, $sql) or die(mysqli_error($connection));
  
    // Crear un array de objetos Postura
    $posturas = [];
  
    // Iterar sobre los resultados y crear objetos Postura
    while ($fila = mysqli_fetch_assoc($resultado)) {
      $postura = new Postura($fila);
      $posturas[$postura->getTerminoID()] = $postura;
  
      // Crear un objeto Morfema y agregarlo a la postura
      $morfema = new Morfema([
        'morfemaID' => $fila['morfemaID'],
        'morfemaSanskrit' => $fila['morfemaSanskrit'],
        'morfemaSpanish' => $fila['morfemaSpanish'],
        'morfemaEnglish' => $fila['morfemaEnglish']
      ]);
  
      $posturas[$postura->getTerminoID()]->agregarMorfema($morfema);
    }
  
    // Cerrar la conexión a la base de datos
    mysqli_close($connection);
  
    // Devolver el array de objetos Postura
    return array_values($posturas);
  }
  
  

?>