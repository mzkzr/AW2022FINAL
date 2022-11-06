<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('provincia')->name('provincia/')->group(static function() {
            Route::get('/',                                             'ProvinciaController@index')->name('index');
            Route::get('/create',                                       'ProvinciaController@create')->name('create');
            Route::post('/',                                            'ProvinciaController@store')->name('store');
            Route::get('/{provincium}/edit',                            'ProvinciaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProvinciaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{provincium}',                                'ProvinciaController@update')->name('update');
            Route::delete('/{provincium}',                              'ProvinciaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('localidads')->name('localidads/')->group(static function() {
            Route::get('/',                                             'LocalidadController@index')->name('index');
            Route::get('/create',                                       'LocalidadController@create')->name('create');
            Route::post('/',                                            'LocalidadController@store')->name('store');
            Route::get('/{localidad}/edit',                             'LocalidadController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'LocalidadController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{localidad}',                                 'LocalidadController@update')->name('update');
            Route::delete('/{localidad}',                               'LocalidadController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('productors')->name('productors/')->group(static function() {
            Route::get('/',                                             'ProductorController@index')->name('index');
            Route::get('/create',                                       'ProductorController@create')->name('create');
            Route::post('/',                                            'ProductorController@store')->name('store');
            Route::get('/{productor}/edit',                             'ProductorController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProductorController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{productor}',                                 'ProductorController@update')->name('update');
            Route::delete('/{productor}',                               'ProductorController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('cervezas')->name('cervezas/')->group(static function() {
            Route::get('/',                                             'CervezaController@index')->name('index');
            Route::get('/create',                                       'CervezaController@create')->name('create');
            Route::post('/',                                            'CervezaController@store')->name('store');
            Route::get('/{cerveza}/edit',                               'CervezaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CervezaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cerveza}',                                   'CervezaController@update')->name('update');
            Route::delete('/{cerveza}',                                 'CervezaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('cerveceria')->name('cerveceria/')->group(static function() {
            Route::get('/',                                             'CerveceriaController@index')->name('index');
            Route::get('/create',                                       'CerveceriaController@create')->name('create');
            Route::post('/',                                            'CerveceriaController@store')->name('store');
            Route::get('/{cervecerium}/edit',                           'CerveceriaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CerveceriaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{cervecerium}',                               'CerveceriaController@update')->name('update');
            Route::delete('/{cervecerium}',                             'CerveceriaController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('punto-venta')->name('punto-venta/')->group(static function() {
            Route::get('/',                                             'PuntoVentaController@index')->name('index');
            Route::get('/create',                                       'PuntoVentaController@create')->name('create');
            Route::post('/',                                            'PuntoVentaController@store')->name('store');
            Route::get('/{puntoVentum}/edit',                           'PuntoVentaController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'PuntoVentaController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{puntoVentum}',                               'PuntoVentaController@update')->name('update');
            Route::delete('/{puntoVentum}',                             'PuntoVentaController@destroy')->name('destroy');
        });
    });
});