<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public $user;
    public $sucursal;

    public function __construct(){
        if(Auth::check()) {
            $this->user = Auth::user();
            $this->sucursal = $this->user->sucursal_id;
        }
    }
}
