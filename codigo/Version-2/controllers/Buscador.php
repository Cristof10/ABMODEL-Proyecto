<?php

require_once("functions/buscar_por_palabra_clave_postura.php");
require_once("functions/buscar_por_palabra_clave_morfema.php");
require_once("functions/buscar_todas_las_posturas.php");
require_once("functions/buscar_todos_los_morfemas.php");
require_once('models/ResultadosBusqueda.php');
class Buscador
{
    public function buscar($keyword, $filter)
    {
        
        $resultados = new ResultadosBusqueda();

        if ($filter == "postura") {
            //Si keyword es vacío, entonces se muestran todas las posturas
            if ($keyword == "") {
                $resultados->posturas = buscar_todas_las_posturas();
            } else {
                $resultados->posturas = buscar_por_palabra_clave_postura($keyword);
            }
            
        } else if ($filter == "morfema") {
            //Si keyword es vacío, entonces se muestran todas las posturas
            if ($keyword == "") {
                $resultados->morfemas = buscar_todos_los_morfemas();
            } else {
                $resultados->morfemas = buscar_por_palabra_clave_morfema($keyword);
            }
        }

        return $resultados;
    }
    public function buscarPorId($id, $filter)
    {
        $resultados = new ResultadosBusqueda();

        if ($filter == "postura") {
            //Si keyword es vacío, entonces se muestran todas las posturas
            if ($id == "") {
                $resultados->posturas = buscar_todas_las_posturas();
            } else {
                $resultados->posturas = buscar_por_palabra_clave_postura($id);
            }
            
        } else if ($filter == "morfema") {
            //Si keyword es vacío, entonces se muestran todas las posturas
            if ($id == "") {
                $resultados->morfemas = buscar_todos_los_morfemas();
            } else {
                $resultados->morfemas = buscar_por_palabra_clave_morfema($id);
            }
        }

        return $resultados;
    }
}

?>