<?php

namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'sucursal_id',
        'bodega_id',
        'name',
        'cedula',
        'direccion',
        'telefono',
        'email',
        'correo',
        'role',
        'password',
        'api_token',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function ventas() {
        return $this->hasMany(Venta::class);
    }

    public function sucursal(){
        return $this->belongsTo(Sucursal::class);
    }

    public function bodega(){
        return $this->belongsTo(Bodega::class);
    }

    public function rol(){
        return $this->belongsTo(Role::class,'role');
    }

    public function comisiones(){
        return $this->hasMany(ComisionVenta::class);
    }

    public function cobros(){
        return $this->hasMany(Cobro::class);
    }

    public function isAdmin (){
        if($this->role == 1 ){
            return true;
        }
        return false;
    }

    public function isAdminBodega (){
        if($this->role == 1 || $this->role == 2){
            return true;
        }
        return false;
    }

    public function isCobrador (){
        if($this->role == 1 || $this->role == 3){
            return true;
        }
        return false;
    }

    public function isVendedor(){
        if($this->role == 1 || $this->role == 4){
            return true;
        }
        return false;
    }
}
