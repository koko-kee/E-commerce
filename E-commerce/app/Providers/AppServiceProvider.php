<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    
    public function boot(): void
    {
        if ($_SERVER['REQUEST_URI'] == '/boutique'){
            Paginator::useBootstrapFive();
        } else {
            Paginator::useTailwind();
        }
    }

    
}
