<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table="clientes";
    protected $fillable=['sucursal_id',
                          'cod',
                          'nombre',
                          'cedula',
                          'telefono',
                          'direccion',
                          'adicional',
                          'municipio_id',
                          'email',
                          'ruta'
                        ];

    public function sucursal(){
      return $this->belongsTo(Sucursal::class);
    }

    public function ventas() {
        return $this->hasMany(Venta::class);
    }

    public function municipio(){
      return $this->belongsTo(Municipio::class);
    }

    public function acuerdos_pagos(){
      return $this->hasMany(AcuerdoPago::class);
    }

    public function pagos_clientes(){
      return $this->hasMany(PagoCliente::class);
    }
    public function ruta_items(){
      return $this->hasOne(RutaItem::class);
    }
    public function pagos(){
      return $this->hasMany(PagoCliente::class);
    }
}
