<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Productor\BulkDestroyProductor;
use App\Http\Requests\Admin\Productor\DestroyProductor;
use App\Http\Requests\Admin\Productor\IndexProductor;
use App\Http\Requests\Admin\Productor\StoreProductor;
use App\Http\Requests\Admin\Productor\UpdateProductor;
use App\Models\Productor;
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

class ProductorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexProductor $request
     * @return array|Factory|View
     */
    public function index(IndexProductor $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Productor::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['domicilio', 'email', 'facebook', 'id', 'instagram', 'localidad_id', 'nombre', 'provincia_id', 'telefono', 'youtube'],

            // set columns to searchIn
            ['domicilio', 'email', 'facebook', 'id', 'instagram', 'nombre', 'telefono', 'youtube', 'provincia.nombre', 'localidad.nombre'],

            function ($query) use ($request) {
                $query->with(['provincia']);
                $query->join('provincia', 'provincia.id', '=', 'productor.provincia_id');
    
                if($request->has('provincia')){
                    $query->whereIn('provincia_id', $request->get('provincia'));
                }

                $query->with(['localidad']);
                $query->join('localidad', 'localidad.id', '=', 'productor.localidad_id');

                if($request->has('localidad')){
                    $query->whereIn('localidad_id', $request->get('localidad'));
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

        return view('admin.productor.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.productor.create');

        return view('admin.productor.create', [
            'productor' => new Productor(),
            'provincias' => Provincium::all(),
            'localidades' => Localidad::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductor $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreProductor $request)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $sanitized['provincia_id'] = $request->getProvinciaId();
        $sanitized['localidad_id'] = $request->getLocalidadId();

        // Store the Productor
        Productor::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/productors'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/productors');
    }

    /**
     * Display the specified resource.
     *
     * @param Productor $productor
     * @throws AuthorizationException
     * @return void
     */
    public function show(Productor $productor)
    {
        $this->authorize('admin.productor.show', $productor);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Productor $productor
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Productor $productor)
    {
        $this->authorize('admin.productor.edit', $productor);

        $productor->load('provincia');
        $productor->load('localidad');

        return view('admin.productor.edit', [
            'productor' => $productor,
            'provincias' => Provincium::all(),
            'localidades' => Localidad::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductor $request
     * @param Productor $productor
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateProductor $request, Productor $productor)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $sanitized['provincia_id'] = $request->getProvinciaId();
        $sanitized['localidad_id'] = $request->getLocalidadId();

        // Update changed values Productor
        $productor->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/productors'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/productors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyProductor $request
     * @param Productor $productor
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyProductor $request, Productor $productor)
    {
        $productor->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyProductor $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyProductor $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Productor::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
