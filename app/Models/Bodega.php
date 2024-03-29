<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $fillable = ['telefono','direccion','municipio_id'];

    public function sucursal(){
        return $this->belongsTo('App\Sucursal');
    }

    public function productos(){
            return $this->hasMany('App\Productos');
    }

    public function municipio(){
        return $this->belongsTo('App\Municipio');
    }
}
