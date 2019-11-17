<?php


namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Laravel\Lumen\Http\Request;

class VentasController extends Controller {
    private $user;
    private $sucursal;

    /**
     * VentasController constructor.
     * @param $auth
     */
    public function __construct(){
        $this->user = Auth::user();
        $this->sucursal = $this->user->sucursal_id;
    }



}
