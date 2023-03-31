<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Cerveza;
use App\Http\Resources\Cerveza as CervezaResource;
   
class CervezaController extends BaseController
{
    public function index(Request $request)
    {
        $productor_id = $request->input('productor_id');
        $cerveceria_id = $request->input('cerveceria_id');
        $nombre = $request->input('nombre');
        $abv_min = $request->input('abv_min');
        $abv_max = $request->input('abv_max');
        $ibu_min = $request->input('ibu_min');
        $ibu_max = $request->input('ibu_max');
        $srm_min = $request->input('srm_min');
        $srm_max = $request->input('srm_max');
        $og_min = $request->input('og_min');
        $og_max = $request->input('og_max');
        
        $cervezas = Cerveza::distinct()
                            ->leftJoin('punto_venta', 'cerveza.id', '=', 'punto_venta.cerveza_id')
                            ->select('cerveza.*')
                            ->when($productor_id, function ($query, $productor_id) {$query->where('productor_id', $productor_id);})
                            ->when($nombre, function ($query, $nombre) {$query->where('nombre', 'like', "%$nombre%");})
                            ->when($abv_min, function ($query, $abv_min) {$query->where('abv', '>=', $abv_min);})
                            ->when($abv_max, function ($query, $abv_max) {$query->where('abv', '<=', $abv_max);})
                            ->when($ibu_min, function ($query, $ibu_min) {$query->where('ibu', '>=', $ibu_min);})
                            ->when($ibu_max, function ($query, $ibu_max) {$query->where('ibu', '<=', $ibu_max);})
                            ->when($srm_min, function ($query, $srm_min) {$query->where('srm', '>=', $srm_min);})
                            ->when($srm_max, function ($query, $srm_max) {$query->where('srm', '<=', $srm_max);})
                            ->when($og_min, function ($query, $og_min) {$query->where('og', '>=', $og_min);})
                            ->when($og_max, function ($query, $og_max) {$query->where('og', '<=', $og_max);})
                            ->when($cerveceria_id, function ($query, $cerveceria_id) {$query->where('punto_venta.cerveceria_id', '=', $cerveceria_id);})
                            ->get();

        return $this->sendResponse(CervezaResource::collection($cervezas), 'Cervezas obtenidas.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'required',
            'abv' => 'required',
            'ibu' => 'required',
            'srm',
            'og',
            'productor_id' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $cerveza = Cerveza::create($input);
        return $this->sendResponse(new CervezaResource($cerveza), 'Cerveza creada.');
    }
   
    public function show($id)
    {
        $cerveza = Cerveza::find($id);
        if (is_null($cerveza)) {
            return $this->sendError('La cerveza no existe.');
        }
        return $this->sendResponse(new CervezaResource($cerveza), 'Cerveza obtenida.');
    }
    
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nombre' => 'sometimes|required',
            'abv' => 'sometimes|required',
            'ibu' => 'sometimes|required',
            'srm',
            'og',
            'productor_id' => 'sometimes|required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $cerveza = Cerveza::find($id);
        $cerveza->update($input);
        
        return $this->sendResponse(new CervezaResource($cerveza), 'Cerveza actualizada.');
    }
   
    public function destroy(Cerveza $cerveza)
    {
        $cerveza->delete();
        return $this->sendResponse([], 'Cerveza eliminada.');
    }
}