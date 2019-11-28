<?php


namespace App\Http\Controllers\V1\Strategy;


use App\Models\Cobro;
use Laravel\Lumen\Http\Request;

class CobrosStrategy extends BaseStrategy implements Strategy {

    public function getItems(Request $request)
    {

        $cobros = Cobro::with(['items.ruta_items.cliente'])->where('user_id',$this->user->id)->get();

        return $cobros;

    }

    public function addItem(Request $request)
    {
        // TODO: Implement addItem() method.
    }
}
