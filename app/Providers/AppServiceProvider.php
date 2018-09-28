<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.management.nav',  'App\Http\Composers\NavComposer@compose');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    	if(App::environment('production')) {
        	$this->app->bind('path.public', function() {
            	return base_path('public_html');
        	});
        }
    }
}
