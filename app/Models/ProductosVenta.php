<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosVenta extends Model
{
    protected $table="productos_ventas";

    protected $fillable=['venta_id','producto_id','producto','cantidad'];

    public function venta(){
        return $this->belongsTo(Venta::class);
    }

    public function producto(){
        return $this->belongsTo(Productos::class);
    }
}
