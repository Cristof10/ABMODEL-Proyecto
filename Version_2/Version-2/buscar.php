<?php
// Incluir el controlador
include("controllers/Buscador.php");
// Crear una instancia del controlador
$controlador = new Buscador();
// Obtener los parámetros de la búsqueda
$filter = isset($_GET['filterOptions']) ? $_GET['filterOptions'] : "";
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : "";



// Realizar la búsqueda
$resultados = $controlador->buscar($keyword, $filter);



// Incluir la vista y pasarle los resultados
require "pagina_inicial.php";
