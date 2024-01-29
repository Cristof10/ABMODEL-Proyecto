<?php 

function buscar_todos_los_morfemas(): array {
    // Obtener la conexión a la base de datos
    include("db_connection.php");
    require_once("models/Postura.php");
    require_once("models/Morfema.php");
  
    // Crear la consulta
    $sql = "SELECT m.morfemaID, m.morfemaSanskrit, m.morfemaSpanish, m.morfemaEnglish ";
    $sql .= "FROM morfema m ";
  
    // Ejecutar la consulta
    $resultado = mysqli_query($connection, $sql) or die(mysqli_error($connection));
  
    // Crear un array de objetos Morfema
    $morfemas = [];
  
    // Iterar sobre los resultados y crear objetos Morfema
    while ($fila = mysqli_fetch_assoc($resultado)) {
      $morfema = new Morfema($fila);
      $morfemas[$morfema->getMorfemaID()] = $morfema;
    }
  
    // Cerrar la conexión a la base de datos
    mysqli_close($connection);
  
    // Devolver el array de objetos Morfema
    return array_values($morfemas);
  }
  


?>