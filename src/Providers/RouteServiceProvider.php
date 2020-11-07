<?php

namespace Stellar\Providers;

use League\Route\Router;

class RouteServiceProvider extends ServiceProvider
{

    protected $provides = [
        Router::class
    ];

    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->app->container->share(Router::class, function() {       
            return new Router();
        });
    }
}