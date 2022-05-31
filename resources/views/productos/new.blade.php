@extends('layouts.menu')
@section('contenido')
        @if(session('mensaje'))
        <div class="row">
            {{session('mensaje')}}
        </div>
        @endif
<div class="row">
    <h1 class="teal-text text-darken-1">
        Nuevo Producto
    </h1>
</div>

<div class="row">
    <form class="col s8" method="POST" action="{{url('productos')}}"enctype="multipart/form-data">        
    @csrf        
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Nombre de Producto" type="text" id="nombre" name="nombre" value="{{old('nombre')}}">
                <label for="name">Nombre de Producto</label>
                <span>{{$errors->first('nombre')}}</span>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s8">
                <textarea class="materialize-textarea" id="descripcion" name="descripcion">{{old('descripcion')}}</textarea>
                <label for="descripcion">Descripcion</label>            
                <span>{{$errors->first('descripcion')}}</span>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s8">
                <input placeholder="Precio del Producto" type="number" id="precio" name="precio"value="{{old('precio')}}">
                <label for="precio ">Precio del Producto</label>
                <span>{{$errors->first('precio')}}</span>
            </div>
        </div>

        <div class="row">
            <div class="col s8 input-field">
            <select name="marca" id="marca">                                
                <option value="">Elija Marca</option>
                @foreach($marcas as $marca)
                <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                @endforeach                            
            </select>
            <label for="marca">Marca</label>
            <span>{{$errors->first('marca')}}</span>
            </div>
        </div>

        <div class="row">
            <div class="col s8 input-field">
            <select name="categoria" id="categoria"> 
            <option value="">Elija Categoria</option>                               
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                @endforeach                            
            </select>
            <label for="categoria">Categoria</label>
            <span>{{$errors->first('categoria')}}</span>
            </div>
        </div>


        <div class="row">
            <div class="file-field input-field col s8">
            <div class="btn light-blue darken-4">
            <span>Imagen...</span>
            <input type="file" name="imagen" name="imagen">
        </div>

        <div class="file-path-wrapper">
        <input class="file-path validate" type="text">

      </div>
      <span>{{ $errors->first('imagen') }}</span>
    </div>
    </div>



        <div class="row">
        <div class="input-field col s8">
        <button class="btn light-blue darken-4" type="submit" name="action">Guardar</button>
        </div>
       </div>
       
       
    </form>
</div>
@endsection