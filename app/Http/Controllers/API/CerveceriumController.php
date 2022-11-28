<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Cervecerium;
use App\Http\Resources\Cervecerium as CerveceriumResource;
   
class CerveceriumController extends BaseController
{
    public function index(Request $request)
    {
        $provincia_id = $request->input('provincia_id');
        $localidad_id = $request->input('localidad_id');
        $nombre = $request->input('nombre');
        $cervecerias = Cervecerium::when($provincia_id, function ($query, $provincia_id) {
                                        $query->where('provincia_id', $provincia_id);
                                    })
                                    ->when($localidad_id, function ($query, $localidad_id) {
                                        $query->where('localidad_id', $localidad_id);
                                    })
                                    ->when($nombre, function ($query, $nombre) {
                                        $query->where('nombre', 'like', "%$nombre%");
                                    })
                                    ->get();
        return $this->sendResponse(CerveceriumResource::collection($cervecerias), 'Cervecerías obtenidas.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'cuit' => 'required',
            'domicilio' => 'required',
            'provincia_id' => 'required',
            'localidad_id' => 'required',
            'horario_atencion'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $cerveceria = Cervecerium::create($input);
        return $this->sendResponse(new CerveceriumResource($cerveceria), 'Cervecería creada.');
    }
   
    public function show($id)
    {
        $cerveceria = Cervecerium::find($id);
        if (is_null($cerveceria)) {
            return $this->sendError('La cervecería no existe.');
        }
        return $this->sendResponse(new CerveceriumResource($cerveceria), 'Cervecería obtenida.');
    }
    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'sometimes|required',
            'cuit' => 'sometimes|required',
            'domicilio' => 'sometimes|required',
            'provincia_id' => 'sometimes|required',
            'localidad_id' => 'sometimes|required',
            'horario_atencion' => 'sometimes',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $cerveceria = Cervecerium::find($id);
        $cerveceria->update($input);
        
        return $this->sendResponse(new CerveceriumResource($cerveceria), 'Cervecería actualizada.');
    }
   
    public function destroy(Cervecerium $cerveceria)
    {
        $cerveceria->delete();
        return $this->sendResponse([], 'Cervecería eliminada.');
    }
}