<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Morfema;

class MorfemaController extends Controller
{
    //
    public function create()
    {
        return view('morfema');
    }
    public function store(Request $request)
    {
        $morfema = new Morfema();
        $morfema->morfemaEnglish = $request->input('morfemaEnglish');
        $morfema->morfemaSanskrit = $request->input('morfemaSanskrit');
        $morfema->morfemaSpanish = $request->input('morfemaSpanish');
        $morfema->save();

        return redirect()->route('diccionario.index');
    }
}
