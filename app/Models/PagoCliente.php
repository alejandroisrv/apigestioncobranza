<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagoCliente extends Model
{
    protected $table='pagos_clientes';
    protected $fillable=['cliente_id','acuerdo_pago_id','venta_id','saldo','monto','fecha'];

    public function venta(){
        return $this->belongsTo(Venta::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function acuerdos_pago(){
        return $this->belongasTo(AcuerdoPago::class);
    }
}
