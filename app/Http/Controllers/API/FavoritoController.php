<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Favorito;
use App\Http\Resources\Favorito as FavoritoResource;
   
class FavoritoController extends BaseController
{
    public function index(Request $request)
    {
        $user_id = $request->input('user_id');
        $cerveza_id = $request->input('cerveza_id');
        $favoritos = Favorito::when($user_id, function ($query, $user_id) {
                                        $query->where('user_id', $user_id);
                                    })
                                    ->when($cerveza_id, function ($query, $cerveza_id) {
                                        $query->where('cerveza_id', $cerveza_id);
                                    })
                                    ->get();
        return $this->sendResponse(FavoritoResource::collection($favoritos), 'Favoritos obtenidos.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' => 'required',
            'cerveza_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $favorito = Favorito::create($input);
        return $this->sendResponse(new FavoritoResource($favorito), 'Favorito creado.');
    }
   
    public function show($id)
    {
        $favorito = Favorito::find($id);
        if (is_null($favorito)) {
            return $this->sendError('El Favorito no existe.');
        }
        return $this->sendResponse(new FavoritoResource($favorito), 'Favorito obtenido.');
    }
    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'user_id' => 'sometimes|required',
            'cerveza_id' => 'sometimes|required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $favorito = Favorito::find($id);
        $favorito->update($input);
        
        return $this->sendResponse(new FavoritoResource($favorito), 'Favorito actualizado.');
    }
   
    public function destroy(Favorito $favorito)
    {
        $favorito->delete();
        return $this->sendResponse([], 'Favorito eliminado.');
    }
}