<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultadosBusqueda extends Model
{
    public $posturas = [];
    public $morfemas = [];
    use HasFactory;
    public function __construct()
    {
    }
}
?>
