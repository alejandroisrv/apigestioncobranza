<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosEntregadas extends Model
{

    protected $fillable = [
        'vendedor_id',
        'bodega_id',
        'comentario',
        'estado'
    ];

    public function productos(){
        return $this->hasMany(ProductosVendedores::class,'detalle');
    }

}
