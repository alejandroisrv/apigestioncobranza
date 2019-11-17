<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcuerdoPago extends Model
{
        protected $table="acuerdos_pagos";
        protected $fillable=['cliente_id','venta_id','periodo_pago','cuotas','coutas_pagadas','monto','estado','finished_at'];

        public function venta(){
            return $this->belongsTo(Venta::class);
        }

        public function productos(){
            return $this->hasMany(Productos::class);
        }

        public function cliente(){
            return $this->belongsTo(Cliente::class);
        }

        public function abonos(){
            return $this->hasMany(PagoCliente::class);
        }

}
