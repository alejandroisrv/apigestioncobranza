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

    protected $appends =  ['deuda'];

    public function getDeudaAttribute(){
        $deuda = 0;
        $pagos = 0;
        $this->ventas()->map(function($venta) use ($deuda) {
            $deuda += round($venta->total);
        });

        $this->abonos()->map(function($abono) use ($pagos) {
            $pagos += round($abono->monto);
        });

        return $deuda - $pagos;
    }


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
