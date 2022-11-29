<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\PuntoVentum;
use App\Http\Resources\PuntoVentum as PuntoVentumResource;
   
class PuntoVentumController extends BaseController
{
    public function index(Request $request)
    {
        $cerveceria_id = $request->input('cerveceria_id');
        $cerveza_id = $request->input('cerveza_id');
        $puntosventa = PuntoVentum::when($cerveceria_id, function ($query, $cerveceria_id) {
                                        $query->where('cerveceria_id', $cerveceria_id);
                                    })
                                    ->when($cerveza_id, function ($query, $cerveza_id) {
                                        $query->where('cerveza_id', $cerveza_id);
                                    })
                                    ->get();
        return $this->sendResponse(PuntoVentumResource::collection($puntosventa), 'Puntos de venta obtenidos.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'cerveceria_id' => 'required',
            'cerveza_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $puntoventa = PuntoVentum::create($input);
        return $this->sendResponse(new PuntoVentumResource($puntoventa), 'Punto de venta creado.');
    }
   
    public function show($id)
    {
        $puntoventa = PuntoVentum::find($id);
        if (is_null($puntoventa)) {
            return $this->sendError('El punto de venta no existe.');
        }
        return $this->sendResponse(new PuntoVentumResource($puntoventa), 'Punto de venta obtenido.');
    }
    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'cerveceria_id' => 'sometimes|required',
            'cerveza_id' => 'sometimes|required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $puntoventa = PuntoVentum::find($id);
        $puntoventa->update($input);
        
        return $this->sendResponse(new PuntoVentumResource($puntoventa), 'Punto de venta actualizado.');
    }
   
    public function destroy(PuntoVentum $puntoventa)
    {
        $puntoventa->delete();
        return $this->sendResponse([], 'Punto de venta eliminado.');
    }
}