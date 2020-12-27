<?php

namespace App\Providers;

use App\Http\View\Composers\SidebarComposer;
use App\Http\View\Composers\soruComposer;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('partials.rightSidebar',SidebarComposer::class);

    }
}
