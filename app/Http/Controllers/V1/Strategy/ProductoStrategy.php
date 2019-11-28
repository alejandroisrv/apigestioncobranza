<?php


namespace App\Http\Controllers\V1\Strategy;

use App\Models\ProductosEntregadas;
use App\Models\ProductosVenta;
use Laravel\Lumen\Http\Request;

class ProductoStrategy extends BaseStrategy implements Strategy
{

    public function getItems(Request $request)
    {

        $productos = ProductosEntregadas::where('vendedor_id',$this->user->id)->get();

        $productos->load(['productos.producto']);

        return $productos;

    }

    public function addItem(Request $request)
    {
        // TODO: Implement addItem() method.
    }
}
