<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosVendedores extends Model
{
    protected $table = 'productos_vendedores';
    protected $fillable= [
        'producto_id',
        'detalle',
        'cantidad',
        'estado',
        'comentario'
    ];

    public function producto(){
        return $this->belongsTo(Productos::class,'producto_id');
    }
}
