<?php

namespace Stellar\Providers;


use App\Support\View\Extensions\CsrfExtension;
use App\Support\View\Extensions\RoutePathExtension;
use App\Support\View\View;
use League\Route\Router;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;


class ViewServiceProvider extends ServiceProvider
{
    protected $provides = [
        View::class
    ];
    
    /**
     * @inheritDoc
     */
    public function register()
    {
    
        $container = $this->app->container;
        $container->share(View::class, function () use ($container){
            $loader = new FilesystemLoader(__DIR__ .'/../../resources/views');
            $twig = new Environment($loader, ['debug' => true]);
            $twig->addExtension(new RoutePathExtension($container->get(Router::class)));
            $twig->addExtension(new CsrfExtension);
         
            return new View($twig, $container->get('response'));
        });

    }
}