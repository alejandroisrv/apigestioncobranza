<?php

namespace App\Models;

use App\Bodega;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{

    protected $table = "productos";
    protected $fillable=['cod','sucursal_id','bodega_id','nombre','descripcion','tipo_id','precio_costo','precio_contado','precio_credito','comision','cantidad','imagen'];


    public function bodega(){
        return $this->belongsTo(Bodega::class);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

    public function tipo(){
        return $this->belongsTo(TipoProducto::clearBootedModels());
    }

    public function productos_venta(){
        return $this->hasMany(ProductosVenta::class);
    }
}
