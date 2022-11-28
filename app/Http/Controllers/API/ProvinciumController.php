<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Provincium;
use App\Http\Resources\Provincium as ProvinciumResource;
   
class ProvinciumController extends BaseController
{
    public function index()
    {
        $provincias = Provincium::all();
        return $this->sendResponse(ProvinciumResource::collection($provincias), 'Provincias obtenidas.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $provincia = Provincium::create($input);
        return $this->sendResponse(new ProvinciumResource($provincia), 'Provincia creada');
    }
   
    public function show($id)
    {
        $provincia = Provincium::find($id);
        if (is_null($provincia)) {
            return $this->sendError('La provincia no existe.');
        }
        return $this->sendResponse(new ProvinciumResource($provincia), 'Provincia obtenida.');
    }
    
    public function update(Request $request, Provincium $provincia)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $provincia->nombre = $input['nombre'];
        $provincia->save();
        
        return $this->sendResponse(new ProvinciumResource($provincia), 'Provincia actualizada.');
    }
   
    public function destroy(Provincium $provincia)
    {
        $provincia->delete();
        return $this->sendResponse([], 'Provincia eliminada.');
    }
}