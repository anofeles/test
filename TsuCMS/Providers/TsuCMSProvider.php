<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 11/9/18
 * Time: 12:13 PM
 */

namespace TsuCMS\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use TsuCMS\Http\Requests\Manager\Request;
use Illuminate\Support\Facades\Schema;
use TsuCMS\Models\Options;

class TsuCMSProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param Request $request
     * @return void
     */
    public static function boot(Request $request)
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
