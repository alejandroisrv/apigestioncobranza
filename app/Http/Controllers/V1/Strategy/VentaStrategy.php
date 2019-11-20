<?php


namespace App\Http\Controllers\V1\Strategy;


use App\Models\Venta;
use Laravel\Lumen\Http\Request;

class VentaStrategy extends BaseStrategy implements Strategy
{

    public function getItems(Request $request)
    {
        $ventas = Venta::with(['productos_venta','acuerdo_pago','abonos'])->whereHas('vendedor',function($q){
            return $q->where('sucursal_id',$this->sucursal);
        });

        return $ventas;
    }

    public function addItem(Request $request)
    {
        // TODO: Implement addItem() method.
    }
}
