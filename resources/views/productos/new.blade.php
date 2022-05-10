@extends('layouts.menu')

@section('contenido')
<div class="row">

    <h1 class="light-blue-text text-darken-4">
        Nuevo producto
    </h1>
</div>
<div class="row">
    <form class="col s8" methos="POST" action="">
        <div class="row">
            <div class="input-field col s8">

            <input placeholder="Nombre de producto" id="nombre" type="text" name="nombre">
          <label for="first_name">Nombre de producto</label>
            </div>

        </div>

        <div class="row">
                <div class="input-field col s8">
                    <textarea id="desc" class="materialize-textarea"></textarea>
                    <label for="desc">Descripción</label>
                </div>
    </div>

    <div class="row">
            <div class="input-field col s8">
            <input placeholder="Precio de producto" id="number" type="text" name="precio">
          <label for="first_name">Precio de producto</label>
            </div>

        </div>

        <div class="row">
        <div class="file-field input-field col s8">
      <div class="btn light-blue darken-4">
        <span>Imagen...</span>
        <input type="file" name="imagen">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">

      </div>
    </div>
    </div>

    <div class="row">
    <div class="input-field col s8">
    <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
  </button>
        
    </div>
</div>
    </form>
        </div>
@endsection