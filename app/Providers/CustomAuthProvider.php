<?php

namespace App\Providers;

use App\Auth\CustomEloquentUserProvider;
use Illuminate\Support\ServiceProvider;

class CustomAuthProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['auth']->provider('custom_eloquent', function()
        {
            $model = config('auth.providers.users.model');
            return new CustomEloquentUserProvider($model);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}
