<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RutaItem extends Model
{
    protected $fillable= ['ruta_id','cliente_id','orden'];
    public $timestamps = false;


    public function ruta(){
        return $this->belongsTo(Ruta::class,'ruta_id');
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
