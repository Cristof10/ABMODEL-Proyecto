<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morfema extends Model
{
    use HasFactory;
    protected $table = 'morfema';
    public $timestamps = false; // Disable timestamps

    protected $fillable = [
        'morfemaSanskrit',
        'morfemaSpanish',
        'morfemaEnglish',
    ];


    // Define la relación muchos a muchos con el modelo Postura
    public function posturas()
    {
        return $this->belongsToMany(Postura::class, 'relacion_postura_morfema', 'morfemaID', 'terminoID');
    }
    public function createMorfema(array $morfemaData)
    {
        $morfema = Morfema::create($morfemaData); // Mass assignment
    }

    public function updateMorfema(array $morfemaData)
    {
        $morfema = Morfema::find($morfemaData['id']);
        $morfema->update($morfemaData);
    }

    public function deleteMorfema($id)
    {
        $morfema = Morfema::find($id);
        $morfema->delete();
    }

    public function getMorfema($id)
    {
        $morfema = Morfema::find($id);
        return $morfema;
    }
    public function getAllMorfemas()
    {
        $morfemas = Morfema::all();
        return $morfemas;
    }

    public function getMorfemasByPostura($posturaID)
    {
        $morfemas = Postura::find($posturaID)->morfemas;
        return $morfemas;
    }

    public function getMorfemasByTermino($terminoID)
    {
        $morfemas = Morfema::where('terminoID', $terminoID)->get();
        return $morfemas;
    }

    public function getIdAttribute()
    {
        return $this->morfemaID; // Assuming morfemaID is the primary key
    }

    public function getMorfemaCompletoAttribute()
    {
        return $this->morfemaSanskrit . ' / ' . $this->morfemaSpanish . ' / ' . $this->morfemaEnglish;
    }

    public function getMorfemaSanskrit()
    {
        return ucfirst($this->morfemaSanskrit);
    }

    public function setMorfemaSanskrit($value)
    {
        $this->attributes['morfemaSanskrit'] = ucfirst($value);
    }

    public function getMorfemaSpanish()
    {
        return ucfirst($this->morfemaSpanish);
    }

    public function setMorfemaSpanish($value)
    {
        $this->attributes['morfemaSpanish'] = ucfirst($value);
    }

    public function getMorfemaEnglish()
    {
        return ucfirst($this->morfemaEnglish);
    }

    public function setMorfemaEnglish($value)
    {
        $this->attributes['morfemaEnglish'] = ucfirst($value);
    }
    

    




}
