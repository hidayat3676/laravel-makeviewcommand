<?php

namespace hidayat\makeviewcommand;

use Illuminate\Support\ServiceProvider;
use hidayat\makeviewcommand\src\Commands\MakeView;
class ViewCommandServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
        $this->commands([
            MakeView::class,
        ]);
    }

    }
}
