<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    //Relacionassr marca con producto
    public function productos(){
        return $this->hasMany(Producto::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
