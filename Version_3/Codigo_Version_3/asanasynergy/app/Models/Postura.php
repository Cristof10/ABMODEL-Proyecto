<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postura extends Model
{
    use HasFactory;
    protected $table = 'postura';
    public $timestamps = false; // Disable timestamps

    protected $fillable = [
        'terminoEnglish',
        'terminoSanskrit',
        'terminoSpanish',
        'imagenURL',
        'videoURL',
    ];

    // Define la relación muchos a muchos con el modelo Morfema
    public function morfemas()
    {
        return $this->belongsToMany(Morfema::class, 'relacion_postura_morfema', 'terminoID', 'morfemaID');
    }
    public function createPostura(array $postData)
    {
        $postura = Postura::create($postData); // Mass assignment
    }

    public function updatePostura(array $postData)
    {
        $postura = Postura::find($postData['id']);
        $postura->update($postData);
    }

    public function deletePostura($id)
    {
        $postura = Postura::find($id);
        $postura->delete();
    }

    public function getPosturaById($id)
    {
        $postura = Postura::find($id);
        return $postura;
    }
    public function getAllPosturas()
    {
        $posturas = Postura::all();
        return $posturas;
    }

    public function getPosturasByMorfema($morfemaID)
    {
        $posturas = Morfema::find($morfemaID)->posturas;
        return $posturas;
    }

    public function getPosturasByTermino($terminoID)
    {
        $posturas = Postura::where('terminoID', $terminoID)->get();
        return $posturas;
    }

    public function getPosturasByTerminoEnglish($terminoEnglish)
    {
        $posturas = Postura::where('terminoEnglish', $terminoEnglish)->get();
        return $posturas;
    }

    public function getPosturasByTerminoSanskrit($terminoSanskrit)
    {
        $posturas = Postura::where('terminoSanskrit', $terminoSanskrit)->get();
        return $posturas;
    }

    public function getPosturasByTerminoSpanish($terminoSpanish)
    {
        $posturas = Postura::where('terminoSpanish', $terminoSpanish)->get();
        return $posturas;
    }

    public function getPosturasByCoincidencia($termino)
    {
        $posturas = Postura::where('terminoID', 'like', '%' . $termino . '%')
            ->orWhere('terminoEnglish', 'like', '%' . $termino . '%')
            ->orWhere('terminoSanskrit', 'like', '%' . $termino . '%')
            ->orWhere('terminoSpanish', 'like', '%' . $termino . '%')
            ->get();
        return $posturas;
    }

    public function getTerminoID()
    {
        return $this->id; // Assuming terminoID is the primary key
    }

    public function getTerminoCompletoAttribute()
    {
        return $this->terminoEnglish . ' / ' . $this->terminoSanskrit . ' / ' . $this->terminoSpanish;
    }

    public function getTerminoEnglish()
    {
        return $this->terminoEnglish;
    }

    public function setTerminoEnglish($value)
    {
        $this->attributes['terminoEnglish'] = ucfirst($value);
    }

    public function getTerminoSanskrit()
    {
        return $this->terminoSanskrit;
    }

    public function setTerminoSanskrit($value)
    {
        $this->attributes['terminoSanskrit'] = ucfirst($value);
    }

    public function getTerminoSpanish()
    {
        return $this->terminoSpanish;
    }

    public function setTerminoSpanish($value)
    {
        $this->attributes['terminoSpanish'] = ucfirst($value);
    }

    public function getImagenURL()
    {
        return $this->imagenURL;
    }

    public function setImagenURL($value)
    {
        $this->attributes['imagenURL'] = ucfirst($value);
    }

    public function getVideoURL()
    {
        return $this->videoURL;
    }

    public function setVideoURL($value)
    {
        $this->attributes['videoURL'] = ucfirst($value);
    }


    
}
