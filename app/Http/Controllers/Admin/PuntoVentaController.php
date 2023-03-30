<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PuntoVentum\BulkDestroyPuntoVentum;
use App\Http\Requests\Admin\PuntoVentum\DestroyPuntoVentum;
use App\Http\Requests\Admin\PuntoVentum\IndexPuntoVentum;
use App\Http\Requests\Admin\PuntoVentum\StorePuntoVentum;
use App\Http\Requests\Admin\PuntoVentum\UpdatePuntoVentum;
use App\Models\PuntoVentum;
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

class PuntoVentaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexPuntoVentum $request
     * @return array|Factory|View
     */
    public function index(IndexPuntoVentum $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(PuntoVentum::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['cerveceria_id', 'cerveza_id', 'id'],

            // set columns to searchIn
            ['id', 'presentaciones']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.punto-ventum.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.punto-ventum.create');

        return view('admin.punto-ventum.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePuntoVentum $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StorePuntoVentum $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the PuntoVentum
        $puntoVentum = PuntoVentum::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/punto-venta'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/punto-venta');
    }

    /**
     * Display the specified resource.
     *
     * @param PuntoVentum $puntoVentum
     * @throws AuthorizationException
     * @return void
     */
    public function show(PuntoVentum $puntoVentum)
    {
        $this->authorize('admin.punto-ventum.show', $puntoVentum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PuntoVentum $puntoVentum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(PuntoVentum $puntoVentum)
    {
        $this->authorize('admin.punto-ventum.edit', $puntoVentum);


        return view('admin.punto-ventum.edit', [
            'puntoVentum' => $puntoVentum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePuntoVentum $request
     * @param PuntoVentum $puntoVentum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdatePuntoVentum $request, PuntoVentum $puntoVentum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values PuntoVentum
        $puntoVentum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/punto-venta'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/punto-venta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyPuntoVentum $request
     * @param PuntoVentum $puntoVentum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyPuntoVentum $request, PuntoVentum $puntoVentum)
    {
        $puntoVentum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyPuntoVentum $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyPuntoVentum $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    PuntoVentum::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
