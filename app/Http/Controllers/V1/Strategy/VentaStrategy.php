<?php


namespace App\Http\Controllers\V1\Strategy;


use App\Models\Venta;
use Laravel\Lumen\Http\Request;

class VentaStrategy extends BaseStrategy implements Strategy
{

    public function getItems(Request $request)
    {
        $ventasApi = Venta::with(['productos_venta','vendedor','tipos_ventas','acuerdo_pago','abonos'])->whereHas('vendedor', function($q) {
            return $q->where('sucursal_id',$this->sucursal);
        })->get();


        $ventasApi->map(function ($venta) {

            $venta->tipo_venta = $venta->tipos_ventas->descripcion;
            $venta->cuotas = $venta->acuerdo_pago->cuotas;
            $venta->periodo_pago = $venta->acuerdo_pago->periodo_pago;
            $venta->nombre_vendedor = $venta->vendedor->name;
            unset($venta->vendedor);
            unset($venta->acuerdo_pago);
            unset($venta->tipos_ventas);

        });

        return $ventasApi;
    }

    public function addItem(Request $request)
    {
        // TODO: Implement addItem() method.
    }
}
