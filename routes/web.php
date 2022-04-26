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
// primer ruta
// get moostra ruta por el navegador
// parametros: 1 nombre ruta
Route::get("Hola", 
    function(){
        echo "Hi mi primera ruta en PHP";
    }
);

Route::get('paises', function(){
    $paises=[
        "Colombia"=> [
            'Capital' => "Bogotá", 
            'Moneda'=> "Peso", 
            'Poblacion' => 51.6, 
            'Cuidades' => [
                "Bogota",
                "Cali"
            ]],

    "Peru" => [
        'Capital' => "Lima", 
        'Moneda'=> "Sol", 
        'Poblacion' => 32.97,
        'Cuidades' => [
            "Lima",
            "Cusco"
        ]],

    "Paraguay" =>[
        'Capital' => "Asuncion", 
        'Moneda'=> "Guaraní paraguayo", 
        'Poblacion' => 7.133,
        'Cuidades' => [
            "Filadelfia",
            "Encarnacion"
        ]]
];

// echo "<pre>";
// var_dump($paises);
// echo "</pre>";

    // mostrar la vista de paises
    return view('paises')
        ->with("paises", $paises);
});