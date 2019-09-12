<?php

namespace HUAC\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
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
        if (env('DB_CONNECTION') == 'mysql')
            Schema::defaultStringLength(191);

        Validator::extend('full_name', function ($attribute, $value, $parameters, $validator) {
            if ((strlen($value) < 3) || (substr_count($value, ' ') < 1))
                return false;
            return true;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
