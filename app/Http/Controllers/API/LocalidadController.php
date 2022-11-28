<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Localidad;
use App\Http\Resources\Localidad as LocalidadResource;
use Illuminate\Support\Facades\DB;
   
class LocalidadController extends BaseController
{
    public function index(Request $request)
    {
        $provincia_id = $request->input('provincia_id');
        $localidades = Localidad::when($provincia_id, function ($query, $provincia_id) {
                                        $query->where('provincia_id', $provincia_id);
                                    })
                                    ->get();
        return $this->sendResponse(LocalidadResource::collection($localidades), 'Localidades obtenidas.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'provincia_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $localidad = Localidad::create($input);
        return $this->sendResponse(new LocalidadResource($localidad), 'Localidad creada.');
    }
   
    public function show($id)
    {
        $localidad = Localidad::find($id);
        if (is_null($localidad)) {
            return $this->sendError('La localidad no existe.');
        }
        return $this->sendResponse(new LocalidadResource($localidad), 'Localidad obtenida.');
    }
    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'sometimes|required|string',
            'provincia_id' => 'sometimes|required|integer'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        
        $localidad = Localidad::find($id);
        $localidad->update($input);
        
        return $this->sendResponse(new LocalidadResource($localidad), 'Localidad actualizada.');
    }
   
    public function destroy(Localidad $localidad)
    {
        $localidad->delete();
        return $this->sendResponse([], 'Localidad eliminada.');
    }
}