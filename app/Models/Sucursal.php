<?php

namespace App\Models;

use App\Bodega;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table="sucursales";
    protected $fillable = ['encargado_id','direccion','municipio_id','telefono'];

    public function bodegas(){
        return $this->hasMany(Bodega::class);
    }
    public function productos(){
        return $this->hasMany(Productos::class);
    }
    public function clientes(){
        return $this->hasMany(Cliente::class);
    }
    public function municipio(){
        return $this->belongsTo(Municipio::class);
    }
}
