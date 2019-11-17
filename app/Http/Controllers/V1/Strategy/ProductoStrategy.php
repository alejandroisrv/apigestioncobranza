<?php


namespace App\Http\Controllers\V1\Strategy;

use App\Models\ProductosEntregadas;
use App\Models\ProductosVenta;
use Laravel\Lumen\Http\Request;

class ProductoStrategy extends BaseStrategy implements Strategy
{

    public function getItems(Request $request)
    {

        $productos = ProductosEntregadas::with('productos.producto')->where('vendedor_id',$this->user->id);

        return $productos;

    }

    public function addItem(Request $request)
    {
        // TODO: Implement addItem() method.
    }
}
