<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        Validator::extend('nip', function ($attribute, $value, $parameters, $validator) {
//            // Contoh validasi NIP: harus 18 digit numerik
//            return preg_match('/^[0-9]{18}$/', $value);
//        }, 'Format NIP tidak valid.');
    }
}
