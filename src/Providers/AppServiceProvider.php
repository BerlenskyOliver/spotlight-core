<?php


namespace Spotlight\Providers;


use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;
use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;

class AppServiceProvider extends ServiceProvider
{
    
    protected  $provides = [
        'response',
        'request',
        'emitter'
    ];


    public function register()
    {
    
        $this->app->container->share('response', Response::class);
        $this->app->container->share('request', function () {
            return ServerRequestFactory::fromGlobals(
                $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
            );
        });
        $this->app->container->share('emitter', SapiEmitter::class);
    }
}