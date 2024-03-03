<?php

use App\Http\Controllers\DiccionarioController;
use App\Models\Postura;
use App\Models\Morfema;
use App\Models\ResultadosBusqueda;
use Pest\Http\TestResponse;

it('returns the diccionario view with all postures and morfemas', function () {
    $posturas = Postura::factory()->count(3)->create();
    $morfemas = Morfema::factory()->count(5)->create();

    $response = $this->get(route('diccionario.index'));

    expect($response->status())->toBe(200);
    expect($response->view())->toBe('diccionario');

    $resultados = $response->viewData('resultados');
    expect($resultados)->toBeInstanceOf(ResultadosBusqueda::class);
    expect($resultados->posturas)->toEqualCollection($posturas);
    expect($resultados->morfemas)->toEqualCollection($morfemas);
});
