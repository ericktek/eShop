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
        Validator::extend('phone_number', function ($attribute, $value, $parameters, $validator) {
            // Implement your phone number validation logic here.
            // Return true if it's valid; otherwise, return false.
            // Example: You can use regular expressions to validate phone numbers.

            // Example regex for a simple phone number validation:
            return preg_match('/^\d{10}$/', $value);
        });
    }
}
