<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cervecerium\BulkDestroyCervecerium;
use App\Http\Requests\Admin\Cervecerium\DestroyCervecerium;
use App\Http\Requests\Admin\Cervecerium\IndexCervecerium;
use App\Http\Requests\Admin\Cervecerium\StoreCervecerium;
use App\Http\Requests\Admin\Cervecerium\UpdateCervecerium;
use App\Models\Cervecerium;
use App\Models\Provincium;
use App\Models\Localidad;
use App\Models\Productor;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CerveceriaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCervecerium $request
     * @return array|Factory|View
     */
    public function index(IndexCervecerium $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cervecerium::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['domicilio', 'email', 'facebook', 'horario_atencion', 'id', 'instagram', 'localidad_id', 'nombre', 'productor_id', 'provincia_id', 'telefono', 'youtube'],

            // set columns to searchIn
            ['domicilio', 'email', 'facebook', 'horario_atencion', 'id', 'instagram', 'nombre', 'telefono', 'youtube', 'provincia.nombre', 'localidad.nombre'],

            function ($query) use ($request) {
                $query->with(['provincia']);
                $query->join('provincia', 'provincia.id', '=', 'cerveceria.provincia_id');
    
                if($request->has('provincia')){
                    $query->whereIn('provincias_id', $request->get('provincia'));
                }

                $query->with(['localidad']);
                $query->join('localidad', 'localidad.id', '=', 'cerveceria.localidad_id');

                if($request->has('localidad')){
                    $query->whereIn('localidad_id', $request->get('localidad'));
                }

                $query->with(['productor']);
                $query->join('productor', 'productor.id', '=', 'cerveceria.productor_id');
    
                if($request->has('productor')){
                    $query->whereIn('productor_id', $request->get('productor'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.cervecerium.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cervecerium.create');

        return view('admin.cervecerium.create', [
            'cerveceria' => new Cervecerium(),
            'provincias' => Provincium::all(),
            'localidades' => Localidad::all(),
            'productores' => Productor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCervecerium $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCervecerium $request)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $sanitized['provincia_id'] = $request->getProvinciaId();
        $sanitized['localidad_id'] = $request->getLocalidadId();
        $sanitized['productor_id'] = $request->getProductorId();

        // Store the Cervecerium
        Cervecerium::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/cerveceria'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cerveceria');
    }

    /**
     * Display the specified resource.
     *
     * @param Cervecerium $cervecerium
     * @throws AuthorizationException
     * @return void
     */
    public function show(Cervecerium $cervecerium)
    {
        $this->authorize('admin.cervecerium.show', $cervecerium);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cervecerium $cervecerium
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Cervecerium $cervecerium)
    {
        $this->authorize('admin.cervecerium.edit', $cervecerium);

        $cervecerium->load('provincia');
        $cervecerium->load('localidad');
        $cervecerium->load('productor');

        return view('admin.cervecerium.edit', [
            'cervecerium' => $cervecerium,
            'provincias' => Provincium::all(),
            'localidades' => Localidad::all(),
            'productores' => Productor::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCervecerium $request
     * @param Cervecerium $cervecerium
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCervecerium $request, Cervecerium $cervecerium)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $sanitized['provincia_id'] = $request->getProvinciaId();
        $sanitized['localidad_id'] = $request->getLocalidadId();
        $sanitized['productor_id'] = $request->getProductorId();

        // Update changed values Cervecerium
        $cervecerium->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/cerveceria'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/cerveceria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCervecerium $request
     * @param Cervecerium $cervecerium
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCervecerium $request, Cervecerium $cervecerium)
    {
        $cervecerium->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCervecerium $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCervecerium $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Cervecerium::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
