<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view) {
            $view->with("arcgis_api_key", "AAPKe07d6a3156f843f2860984e04dff6f74qZWNMaAR7fZlkWMCD9UKumorsUc8XtYaMbKW6PvNF7RWD1_3wohmgQCcWLJlRvq2");
            $view->with("arcgis_basemap_enum", "ArcGIS:Navigation"); 
        });
    }
}
