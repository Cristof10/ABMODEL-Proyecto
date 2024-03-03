<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postura;

use function Pest\Laravel\get;
use App\Models\Morfema;

class PosturaController extends Controller
{
    public function create($id)
    {
        $morfemas = Morfema::all(); // Fetch all morfemas

        return view('diccionario', compact('morfemas')); // Pass data to the view
    }

    public function store(Request $request)
    {
        $morfema_ids = $request->input('morfema_ids', []);

        $postura = Postura::create($request->except('morfema_ids'));

        $postura->morfemas()->attach($morfema_ids);

        return redirect()->route('posturas.index');
    }

    public function detalle($id)
    {
        $postura = Postura::find($id);

        return view('detalle_postura', compact('postura'));
    }
}
