<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipo_productos';
    protected $fillable= [
        'label',
        'alias'
    ];
    public $timestamps = false;
    public function productos(){
        return $this->hasMany(Productos::class,'tipo_id');
    }

}
