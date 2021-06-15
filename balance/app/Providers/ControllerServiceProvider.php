<?php

namespace App\Providers;

use App\Contract\BalanceController;
use Illuminate\Support\ServiceProvider;

class ControllerServiceProvider extends ServiceProvider
{
    public $bindings = [
        BalanceController::class => \App\Http\Controllers\BalanceController::class
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('balance',BalanceController::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
