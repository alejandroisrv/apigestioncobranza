<?php


namespace App\Http\Controllers\V1\Strategy;


use Illuminate\Support\Facades\Auth;

class BaseStrategy
{
    public $sucursal;
    /**
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public $user;

    /**
     * BaseStrategy constructor.
     */
    public function __construct(){
        if(Auth::check()){
            $this->user = Auth::user();
            $this->sucursal = $this->user->sucursal_id;
        }
    }
}
