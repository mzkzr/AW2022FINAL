<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Productor;
use App\Http\Resources\Productor as ProductorResource;
   
class ProductorController extends BaseController
{
    public function index(Request $request)
    {
        $provincia_id = $request->input('provincia_id');
        $localidad_id = $request->input('localidad_id');
        $nombre = $request->input('nombre');
        $productores = Productor::when($provincia_id, function ($query, $provincia_id) {
                                        $query->where('provincia_id', $provincia_id);
                                    })
                                    ->when($localidad_id, function ($query, $localidad_id) {
                                        $query->where('localidad_id', $localidad_id);
                                    })
                                    ->when($nombre, function ($query, $nombre) {
                                        $query->where('nombre', 'like', "%$nombre%");
                                    })
                                    ->get();
        return $this->sendResponse(ProductorResource::collection($productores), 'Productores obtenidos.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'domicilio' => 'required',
            'provincia_id' => 'required',
            'localidad_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $productor = Productor::create($input);
        return $this->sendResponse(new ProductorResource($productor), 'Productor creado.');
    }
   
    public function show($id)
    {
        $productor = Productor::find($id);
        if (is_null($productor)) {
            return $this->sendError('El productor no existe.');
        }
        return $this->sendResponse(new ProductorResource($productor), 'Productor obtenido.');
    }
    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'sometimes|required',
            'domicilio' => 'sometimes|required',
            'provincia_id' => 'sometimes|required',
            'localidad_id' => 'sometimes|required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $productor = Productor::find($id);
        $productor->update($input);
        
        return $this->sendResponse(new ProductorResource($productor), 'Productor actualizado.');
    }
   
    public function destroy(Productor $productor)
    {
        $productor->delete();
        return $this->sendResponse([], 'Productor eliminado.');
    }
}