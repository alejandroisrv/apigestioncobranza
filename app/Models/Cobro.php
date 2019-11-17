<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
    protected $fillable = ['user_id','ruta_id','estado','comision','fecha_inicio','fecha_culminacion'];

    public function ruta () {
        return $this->belongsTo(Ruta::class);
    }

    public function cobrador () {
        return $this->belongsTo(User::class,'user_id');
    }

    public function items() {
        return $this->hasMany(CobroJornada::class);
    }

}
