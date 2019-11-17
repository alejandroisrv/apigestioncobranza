<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoVenta extends Model
{
    protected $table="tipos_ventas";
    protected $fillable=['descripcion'];

    public function ventas(){
        return $this->hasMany(Venta::class,'tipos_ventas');
    }
}
