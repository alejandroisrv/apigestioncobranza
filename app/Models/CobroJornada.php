<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CobroJornada extends Model{

    public $timestamps = false;
    protected $table = 'cobros_jornada';
    protected $fillable = ['cobro_id', 'ruta_item_id','acuerdo_pago_id','monto','comision','estado','observacion','fecha_culminacion'];

    public function ruta_items(){
        return $this->belongsTo(RutaItem::class,'ruta_item_id');
    }

    public function cliente(){
        return $this->hasOneThrough(Cliente::class,RutaItem::class,'cliente_id',);
    }

    public function acuerdospagos(){
        return $this->belongsTo(AcuerdoPago::class,'acuerdo_pago_id');
    }

}
