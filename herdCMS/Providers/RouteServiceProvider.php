<?php
/**
 * Created by PhpStorm.
 * User: jedy
 * Date: 11/9/18
 * Time: 12:16 PM
 */

namespace HerdCMS\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = '\HerdCMS\Http\Controllers';


    protected $managerNamespace = '\HerdCMS\Http\Controllers\Manager';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        $this->mapManagerRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__ . '/../../routes/web.php');
    }

    protected function mapManagerRoutes(){
        Route::prefix('backend')
            ->middleware('web')
            ->namespace($this->managerNamespace)
            ->group(__DIR__ . '/../../routes/backend.php');
    }


}
