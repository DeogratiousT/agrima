<?php

namespace App\Providers;

use App\Models\Products\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return realpath(base_path() .  DIRECTORY_SEPARATOR . '..');
         });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (App::environment('staging')) {
            URL::forceScheme('https');
        }

        View::composer('includes.header', function ($view) {
            return $view->with('categories', Category::with('subCategories.commodities')->get());
        });
    }
}
