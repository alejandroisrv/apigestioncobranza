<?php


namespace App\Http\Controllers\V1\Strategy;


use App\Models\Ruta;
use Laravel\Lumen\Http\Request;

class RutaStrategy extends BaseStrategy implements Strategy
{

    public function getItems(Request $request)
    {
        $rutas = Ruta::with(['items.cliente'])->where('sucursal_id',$this->sucursal)->get();

        $rutasR = collect();

        $rutas->map(function ($ruta) use ($rutasR) {

            foreach($ruta->items as $item){
                $item->clienteNombre = $item->cliente->nombre;
                $item->clienteDireccion = $item->cliente->direccion;
                unset($item->cliente);
            }

            $rutasR->add($ruta);

        });

        $rutasR->add([
            'id' => 0,
            'nombre'=> 'Clientes sin rutas',
            'municipio_id' => 1,
        ]);

        return $rutasR;
    }

    public function addItem(Request $request)
    {
        // TODO: Implement addItem() method.
    }
}
