<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Postura;
use App\Models\Morfema;
use App\Models\ResultadosBusqueda;
class DiccionarioController extends Controller
{
    public function index()
    {

        $resultados = new ResultadosBusqueda();
        $resultados->posturas = Postura::all();
        $resultados->morfemas = Morfema::all();
        return view('diccionario')->with('resultados', $resultados );
    }
    public function buscar(Request $request)
    {
        $filtro = $request->input('filterOptions');
        $palabraClave = $request->input('keyword');


        $resultadosBusqueda = new ResultadosBusqueda();

        if ($filtro === 'postura') {
            $resultadosBusqueda->posturas = Postura::where('terminoEnglish', 'LIKE', "%$palabraClave%")
                ->orWhere('terminoSanskrit', 'LIKE', "%$palabraClave%")
                ->orWhere('terminoSpanish', 'LIKE', "%$palabraClave%")
                ->get();
        } 
        if ($filtro === 'morfema') {
            $resultadosBusqueda->morfemas = Morfema::where('morfemaSanskrit', 'LIKE', "%$palabraClave%")
                ->orWhere('morfemaSpanish', 'LIKE', "%$palabraClave%")
                ->orWhere('morfemaEnglish', 'LIKE', "%$palabraClave%")
                ->get();
        } 

        return view('resultados_busqueda')->with('resultados', $resultadosBusqueda);
    }
    
}
