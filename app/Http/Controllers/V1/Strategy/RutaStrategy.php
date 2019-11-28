<?php


namespace App\Http\Controllers\V1\Strategy;


use App\Models\Ruta;
use Laravel\Lumen\Http\Request;

class RutaStrategy extends BaseStrategy implements Strategy
{

    public function getItems(Request $request)
    {
        $rutas = Ruta::with(['items.cliente'])->where('sucursal_id',$this->sucursal)->get();

        $rutas->map(function ($ruta) {

            foreach($ruta->items as $item){
                $item->clienteNombre = $item->cliente->nombre;
                $item->clienteDireccion = $item->cliente->direccion;
                unset($item->cliente);
            }

        });
        return $rutas;
    }

    public function addItem(Request $request)
    {
        // TODO: Implement addItem() method.
    }
}
