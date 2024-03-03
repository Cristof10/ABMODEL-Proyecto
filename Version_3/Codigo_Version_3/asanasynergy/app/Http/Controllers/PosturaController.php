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
    
        // Validate the request (optional but recommended)
        $this->validate($request, [
            'termino_sanskrit' => 'required|string',
            'termino_english' => 'required|string',
            'termino_spanish' => 'required|string',
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif' // Validation for image
        ]);
    
        // Handle image upload
        $imagen = $request->file('imagen');
        $imagenName = $request->input('termino_sanskrit') . '.' . $imagen->getClientOriginalExtension();
        //$imagen->storePubliclyAs('images', $imagenName); // Store in 'images' folder with unique filename
        $imagen->move(public_path('images'), $imagenName);
    
        $postura = Postura::create([
            'terminoSanskrit' => $request->input('termino_sanskrit'),
            'terminoEnglish' => $request->input('termino_english'),
            'terminoSpanish' => $request->input('termino_spanish'),
            'imagenURL' => $imagenName, // Store full image URL
            'videoURL' => $request->input('video'),
        ]);
    
        $postura->morfemas()->attach($morfema_ids);
    
        return redirect()->route('diccionario.index');
    }
    
    public function detalle($id)
    {
        $postura = Postura::find($id);

        return view('detalle_postura', compact('postura'));
    }
}
