<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 11/9/18
 * Time: 12:13 PM
 */

namespace HerdCMS\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use HerdCMS\Http\Requests\Manager\Request;
use Illuminate\Support\Facades\Schema;
use HerdCMS\Models\Options;

class HerdCMSProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Schema::defaultStringLength(191);
        View::share('options',new Options());

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
