<?php


namespace App\Http\Controllers\V1\Strategy;


use App\Models\Ruta;
use Laravel\Lumen\Http\Request;

class RutaStrategy extends BaseStrategy implements Strategy
{

    public function getItems(Request $request)
    {
        $rutas = Ruta::with('items')->where('sucursal_id',$this->sucursal);
        return $rutas;
    }

    public function addItem(Request $request)
    {
        // TODO: Implement addItem() method.
    }
}
