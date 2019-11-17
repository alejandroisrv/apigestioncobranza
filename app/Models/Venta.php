<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{

    protected $fillable=['cod','cliente_id','user_id','tipo_venta','total','subtotal','abono'];

    public function vendedor(){

        return $this->belongsTo(User::class,'user_id','id');

    }

    public function abonos(){
        return $this->hasMany(PagoCliente::class, 'venta_id');
    }

    public function acuerdo_pago(){
        return $this->hasOne(AcuerdoPago::class);

    }

    public function productos_venta(){

        return $this->hasMany(ProductosVenta::class);
    }

    public function tipos_ventas(){

        return $this->belongsTo(TipoVenta::class,'tipo_venta','id');
    }
    public function comisiones(){
        return $this->hasMany(ComisionVenta::class);
    }
    public function persona(){
        return $this->belongsTo(Cliente::class,'cliente_id','id');
    }
}

