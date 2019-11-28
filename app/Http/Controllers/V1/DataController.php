<?php


namespace App\Http\Controllers\V1;


use App\Http\Controllers\Controller;
use App\Http\Controllers\V1\Strategy\{
    ClienteStrategy,
    ProductoStrategy,
    RutaStrategy,
    VentaStrategy,
    CobrosStrategy
};

use Illuminate\Http\Request;


class DataController extends Controller {

    public $estrategias = [
        'CL' => ClienteStrategy::class,
        'RT' => RutaStrategy::class,
        'VT' => VentaStrategy::class,
        'PD' => ProductoStrategy::class,
        'CB' => CobrosStrategy::class
    ];

    function getData(Request $request){
        try{

            $ClientesStrategy = new $this->estrategias['CL'];
            $RutaStrategy = new $this->estrategias['RT'];
            $VentaStrategy = new $this->estrategias['VT'];
            $ProductoStrategy = new $this->estrategias['PD'];
            $CobrosStrategy = new $this->estrategias['CB'];

            return response()->json([
                'productos' => $ProductoStrategy->getItems($request),
                'rutas' => $RutaStrategy->getItems($request),
                'ventas' => $VentaStrategy->getItems($request),
                'cobros' => $CobrosStrategy->getItems($request),
                'clientes' => $ClientesStrategy->getItems($request),
            ]);

        }catch (\Exception $e){
            return response()->json(['error'=>true,'message'=> $e->getMessage()]);
        }
    }

    function getItems(Request $request){

        try{

            $strategy = new $this->estrategias[$request->entidad];
            $items = $strategy->getItems($request);

            return response()->json([$request->entidad => $items],201);

        }catch (\Exception $e){
            return response()->json(['error'=>true,'message'=> $e->getMessage()]);
        }
    }

    function addItem(Request $request){
        try{

            $strategy = new $this->estrategias[$request->entidad];
            $items = $strategy->addItems($request);

            return response()->json($items);

        }catch (\Exception $e){
            return response()->json(['error'=>true,'message'=> $e->getMessage()]);
        }

    }
}
