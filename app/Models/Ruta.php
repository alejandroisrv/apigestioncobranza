<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    //
    protected $cascadeDeletes = ['items'];

    protected $fillable= ['sucursal_id','municipio_id','nombre'];

    public function items() {
        return $this->hasMany(RutaItem::class);
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }

    public function cobros (){
        return $this->hasMany(Cobro::class);

    }
}
