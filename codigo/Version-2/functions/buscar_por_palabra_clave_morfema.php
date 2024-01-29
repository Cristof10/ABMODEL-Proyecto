<?php 

function buscar_por_palabra_clave_morfema($user_keyword): array {
    // Obtener la conexión a la base de datos
    include("db_connection.php");
    require_once("models/Postura.php");
    require_once("models/Morfema.php");

    $user_keyword = mysqli_real_escape_string($connection, trim($user_keyword));
  
    // Crear la consulta
    $sql = "SELECT m.morfemaID, m.morfemaSanskrit, m.morfemaSpanish, m.morfemaEnglish ";
    $sql .= "FROM morfema m ";
    $sql .= "WHERE m.morfemaSanskrit LIKE '%$user_keyword%' OR m.morfemaSpanish LIKE '%$user_keyword%' OR m.morfemaEnglish LIKE '%$user_keyword%'";
  
    // Ejecutar la consulta
    $resultado = mysqli_query($connection, $sql) or die(mysqli_error($connection));
  
    // Crear un array de objetos Morfema
    $morfemas = [];
  
    // Iterar sobre los resultados y crear objetos Morfema
    while ($fila = mysqli_fetch_assoc($resultado)) {
      $morfemaID = $fila['morfemaID'];
  
      if (!isset($morfemas[$morfemaID])) {
        $morfema = new Morfema($fila);
        $morfemas[$morfemaID] = $morfema;
      }
    }
  
    // Cerrar la conexión a la base de datos
    mysqli_close($connection);
  
    // Devolver el array de objetos Morfema
    return array_values($morfemas);
  }
  

?>