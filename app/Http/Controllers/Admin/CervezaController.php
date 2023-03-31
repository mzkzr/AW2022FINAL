<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cerveza\BulkDestroyCerveza;
use App\Http\Requests\Admin\Cerveza\DestroyCerveza;
use App\Http\Requests\Admin\Cerveza\IndexCerveza;
use App\Http\Requests\Admin\Cerveza\StoreCerveza;
use App\Http\Requests\Admin\Cerveza\UpdateCerveza;
use App\Models\Cerveza;
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

class CervezaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCerveza $request
     * @return array|Factory|View
     */
    public function index(IndexCerveza $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cerveza::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['abv', 'ibu', 'id', 'nombre', 'og', 'productor_id', 'srm'],

            // set columns to searchIn
            ['descripcion', 'id', 'nombre'],

            function ($query) use ($request)
            {
                $query->with(['productor']);
                $query->join('productor', 'productor.id', '=', 'cerveza.productor_id');
    
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

        return view('admin.cerveza.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.cerveza.create');

        return view('admin.cerveza.create', [
            'cerveza' => new Cerveza(),
            'productores' => Productor::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCerveza $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCerveza $request)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $sanitized['productor_id'] = $request->getProductorId();

        // Store the Cerveza
        $cerveza = Cerveza::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/cervezas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/cervezas');
    }

    /**
     * Display the specified resource.
     *
     * @param Cerveza $cerveza
     * @throws AuthorizationException
     * @return void
     */
    public function show(Cerveza $cerveza)
    {
        $this->authorize('admin.cerveza.show', $cerveza);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cerveza $cerveza
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Cerveza $cerveza)
    {
        $this->authorize('admin.cerveza.edit', $cerveza);

        $cerveza->load('productor');

        return view('admin.cerveza.edit', [
            'cerveza' => $cerveza,
            'productores' => Productor::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCerveza $request
     * @param Cerveza $cerveza
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCerveza $request, Cerveza $cerveza)
    {
        // Sanitize input
        $sanitized = $request->validated();
        $sanitized['productor_id'] = $request->getProductorId();

        // Update changed values Cerveza
        $cerveza->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/cervezas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/cervezas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCerveza $request
     * @param Cerveza $cerveza
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCerveza $request, Cerveza $cerveza)
    {
        $cerveza->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCerveza $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCerveza $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Cerveza::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
