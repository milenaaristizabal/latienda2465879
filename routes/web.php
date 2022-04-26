<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//primer ruta
// get: mostrar por el navegador
//parametros: 1. nombre de la ruta
Route::get("Hola", function(){
 echo "Hola mi primera ruta en PHP";
}
);

//Ruta Paises
Route::get('paises', function() {
    $paises=["Colombia" => ["Capital" => "Bogotá",
            "Moneda" => "Peso",
            "Población" => 51.6, 
            "ciudades"=>"medellin",
            "cali",
             "barranquilla"],
            
            "Peru" => ["Capital" => "Lima",
            "Moneda" => "Sol",
            "Población" => 32,97,
            "ciudades"=>"cusco",
            "piura"],

            "Paraguay"=> ["Capital" => "Asunción",
            "Moneda" => "Guaraní",
            "Población" => 7,133,
            "filadelfia"=>"limpio"],];
    //mostrar la vista de paises
    return view('paises')
        ->with("paises", $paises);
});