<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Localidad\BulkDestroyLocalidad;
use App\Http\Requests\Admin\Localidad\DestroyLocalidad;
use App\Http\Requests\Admin\Localidad\IndexLocalidad;
use App\Http\Requests\Admin\Localidad\StoreLocalidad;
use App\Http\Requests\Admin\Localidad\UpdateLocalidad;
use App\Models\Localidad;
use App\Models\Provincium;
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

class LocalidadController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLocalidad $request
     * @return array|Factory|View
     */
    public function index(IndexLocalidad $request)
    {
        $data = AdminListing::create(Localidad::class)->processRequestAndGet(
            $request,

            // set columns to query
            ['id', 'provincia_id', 'nombre'],

            // set columns to searchIn
            ['id', 'nombre', 'provincia.nombre'],

            function ($query) use ($request)
            {
                $query->with(['provincia']);
    
                $query->join('provincia', 'provincia.id', '=', 'localidad.provincia_id');
    
                if($request->has('provincia')){
                    $query->whereIn('provincia_id', $request->get('provincia'));
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

        return view('admin.localidad.index', [
            'data' => $data,
            'provincias' => Provincium::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.localidad.create');

        return view('admin.localidad.create', ['provincias' => Provincium::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLocalidad $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLocalidad $request)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $sanitized['provincia_id'] = $request->provincia_id;

        // Store the Localidad
        $localidad = Localidad::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/localidads'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/localidads');
    }

    /**
     * Display the specified resource.
     *
     * @param Localidad $localidad
     * @throws AuthorizationException
     * @return void
     */
    public function show(Localidad $localidad)
    {
        $this->authorize('admin.localidad.show', $localidad);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Localidad $localidad
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Localidad $localidad)
    {
        $this->authorize('admin.localidad.edit', $localidad);

        $localidad->load('provincia');

        return view('admin.localidad.edit', [
            'localidad' => $localidad,
            'provincias' => Provincium::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLocalidad $request
     * @param Localidad $localidad
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLocalidad $request, Localidad $localidad)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $sanitized['provincia_id'] = $request->provincia_id;

        // Update changed values Localidad
        $localidad->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/localidads'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/localidads');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLocalidad $request
     * @param Localidad $localidad
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLocalidad $request, Localidad $localidad)
    {
        $localidad->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLocalidad $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLocalidad $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Localidad::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
