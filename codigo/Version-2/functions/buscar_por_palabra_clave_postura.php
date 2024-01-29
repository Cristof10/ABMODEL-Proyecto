<?php
function buscar_por_palabra_clave_postura($user_keyword): array {
    // Obtener la conexión a la base de datos
    include("db_connection.php");
    require_once("models/Postura.php");
    require_once("models/Morfema.php");

    
    $user_keyword = mysqli_real_escape_string($connection, trim($user_keyword));
  
    // Construir la consulta SQL
    $sql = "SELECT pd.terminoID, pd.terminoEnglish, pd.terminoSanskrit, pd.terminoSpanish, pd.imagenURL, pd.videoURL, m.morfemaID, m.morfemaSanskrit, m.morfemaSpanish, m.morfemaEnglish ";
    $sql .= "FROM postura pd ";
    $sql .= "LEFT JOIN relacion_postura_morfema rpm ON pd.terminoID = rpm.terminoID ";
    $sql .= "LEFT JOIN morfema m ON rpm.morfemaID = m.morfemaID ";
    $sql .= "WHERE pd.terminoEnglish LIKE '%$user_keyword%' OR pd.terminoSanskrit LIKE '%$user_keyword%' OR pd.terminoSpanish LIKE '%$user_keyword%'";
  
    // Ejecutar la consulta
    $resultado = mysqli_query($connection, $sql) or die(mysqli_error($connection));
  
    // Crear un array de objetos Postura
    $posturas = [];
  
    // Iterar sobre los resultados y crear objetos Postura
    while ($fila = mysqli_fetch_assoc($resultado)) {
      $terminoID = $fila['terminoID'];
  
      if (!isset($posturas[$terminoID])) {
        $postura = new Postura($fila);
        $posturas[$terminoID] = $postura;
      }
  
      // Crear un objeto Morfema y agregarlo a la postura
      $morfema = new Morfema([
        'morfemaID' => $fila['morfemaID'],
        'morfemaSanskrit' => $fila['morfemaSanskrit'],
        'morfemaSpanish' => $fila['morfemaSpanish'],
        'morfemaEnglish' => $fila['morfemaEnglish']
      ]);
  
      $posturas[$terminoID]->agregarMorfema($morfema);
    }
  
    // Cerrar la conexión a la base de datos
    mysqli_close($connection);
  
    // Devolver el array de objetos Postura
    return array_values($posturas);
  }
  

?>