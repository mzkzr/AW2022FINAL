<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Favorito\BulkDestroyFavorito;
use App\Http\Requests\Admin\Favorito\DestroyFavorito;
use App\Http\Requests\Admin\Favorito\IndexFavorito;
use App\Http\Requests\Admin\Favorito\StoreFavorito;
use App\Http\Requests\Admin\Favorito\UpdateFavorito;
use App\Models\Favorito;
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

class FavoritosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFavorito $request
     * @return array|Factory|View
     */
    public function index(IndexFavorito $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Favorito::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'cerveza_id', 'user_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.favorito.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.favorito.create');

        return view('admin.favorito.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFavorito $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFavorito $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Favorito
        $favorito = Favorito::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/favoritos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/favoritos');
    }

    /**
     * Display the specified resource.
     *
     * @param Favorito $favorito
     * @throws AuthorizationException
     * @return void
     */
    public function show(Favorito $favorito)
    {
        $this->authorize('admin.favorito.show', $favorito);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Favorito $favorito
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Favorito $favorito)
    {
        $this->authorize('admin.favorito.edit', $favorito);


        return view('admin.favorito.edit', [
            'favorito' => $favorito,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFavorito $request
     * @param Favorito $favorito
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFavorito $request, Favorito $favorito)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Favorito
        $favorito->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/favoritos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/favoritos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFavorito $request
     * @param Favorito $favorito
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFavorito $request, Favorito $favorito)
    {
        $favorito->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFavorito $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFavorito $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Favorito::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
