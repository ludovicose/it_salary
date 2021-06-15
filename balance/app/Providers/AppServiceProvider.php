<?php

namespace App\Providers;

use App\Contract\BalanceHistoryCriteriaFactory;
use App\Contract\BalanceHistoryService;
use App\Criteria\BalanceHistory\Factory\BalanceHistoryEloquentFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        BalanceHistoryService::class => \App\Service\BalanceHistoryService::class,
        BalanceHistoryCriteriaFactory::class => BalanceHistoryEloquentFactory::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
