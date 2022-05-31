<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "aqui va ir el catalogo de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccionar categorias y marcas
        $marcas = Marca::all();
        $categorias = Categoria::all();

        return view("productos.new")
               ->with("marcas",$marcas)
               ->with("categorias",$categorias);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //Reglas de Validacion
        $reglas=[
            "nombre"=>'required|alpha|unique:productos,nombre',
            "descripcion"=>'required|min:10|max:50',
            "precio"=>'required|numeric',
            "marca"=>'required',
            "categoria"=>'required',
            "imagen" => 'required|image'
        ];
        //mensajes personalizados por regla
        $mensajes=[
            "required"=>"Campo Obligatorio",
            "numeric"=>"Solo se Aceptan valores numericos",
            "alpha"=>"Solo se Aceptan letras",
            "min"=>"Se debe escribir minimo 10 caracteres",
            "max"=>"Se debe escribir máximo 50 caracteres",
            "unique"=>"Producto repetido"
        ];
        //crear el objeto
        $v = Validator::make($r->all(),$reglas,$mensajes);
        
        //validar datos: metodo fails
        if ($v->fails()){
            //validacion fallida
            //mostrar mensajes de validación
            return redirect('productos/create')
            ->withErrors($v)
            ->withInput();
        }else{

            //asignar a una variable nombre_archivo 
            $nombre_archivo = $r->imagen->getClientOriginalName();
            $archivo = $r->imagen;
            //mover el archivo en la carpeta public 
            $ruta = public_path().'/img';
            $archivo->move($ruta, $nombre_archivo);

            //crear entidad producto
            $p = new Producto;
            //asignar valores a atributos de nuevo producto
            $p->nombre = $r->nombre;
            $p->descripcion = $r->descripcion;
            $p->precio = $r->precio;
            $p->imagen = $nombre_archivo; 
            $p->marca_id = $r->marca;
            $p->categoria_id = $r->categoria;
            $p->save();
            //redireccionar a la ruta : create  

            //llevando datos de sesión
            return redirect('productos/create')
            ->with('mensaje','Producto Registrado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aqui va la información del producto cuyo id es: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va el formulario de actualizacion de producto cuyo id: $producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}