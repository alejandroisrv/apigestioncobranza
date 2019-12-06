<?php


namespace App\Http\Controllers\V1\Strategy;


use App\Models\Cliente;
use App\Models\Municipio;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Http\Request;

class ClienteStrategy extends BaseStrategy implements Strategy
{

    public function getItems(Request $request)
    {
        $data = $request->all();

        $nombre = isset($data['buscar']) ? $data['buscar'] : null ;
        $codigo = isset($data['buscar']) ? $data['buscar'] : null ;

        $clientes = Cliente::withCount('pagos_clientes')
            ->with(['pagos_clientes','municipio'])
            ->where('sucursal_id', $this->sucursal )->get();

        $clientes = DB::table("clientes")->select('id')->whereNotIn('id', [1, 2, 3])->toSql();

        return $clientes;
    }

    public function addItem(Request $request){
        try {

            $cliente = Cliente::create([
                'sucursal_id' =>$this->sucursal,
                'nombre' => $request->nombre,
                'cedula' => $request->cedula,
                'direccion' => $request->direccion,
                'adicional' => $request->adicional,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'municipio_id' => $request->municipio,
                'ruta_id' => $request->ruta
            ]);

            $cliente->cod = "0{$this->sucursal}0{$cliente->id}";
            $cliente->save();

            if(!$cliente){
                return response()->json(['error'=> true ,'message'=> 'No se ha podido crear el cliente'],422);
            }

            return response()->json(['cliente'],201);

        } catch (\Exception $exception){

            return response()->json(['error'=> true,'message'=> $exception->getMessage()],422);
        }
    }
}
