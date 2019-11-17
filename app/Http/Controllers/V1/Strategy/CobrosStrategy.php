<?php


namespace App\Http\Controllers\V1\Strategy;


use App\Models\Cobro;
use Laravel\Lumen\Http\Request;

class CobrosStrategy extends BaseStrategy implements Strategy {

    public function getItems(Request $request)
    {

        $cobros = Cobro::with('items')->where('user_id',$this->user->id);

        return $cobros;

    }

    public function addItem(Request $request)
    {
        // TODO: Implement addItem() method.
    }
}
