<?php

namespace Stellar\Core;

use App\Providers\ViewServiceProvider;
use League\Container\Container;
use League\Container\ReflectionContainer;
use League\Route\Router;
use Stellar\Providers\AppServiceProvider;
use Stellar\Providers\DatabaseServiceProvider;
use Stellar\Providers\RouteServiceProvider;
use Stellar\Support\Env;

class Application
{

    public static string $ROOT_DIR;

    public $router;

    public Container $container;    

    public static Application $app;

    public function __construct($dir)
    {
        self::$ROOT_DIR = $dir;
        $this->container = new Container();
        self::$app = $this;
        $this->loadApp();
        $this->registerBaseServiceProviders();
    }


    public function loadApp()
    {
        $this->container->delegate(new ReflectionContainer);
        $this->router = $this->container->get(Router::class);
        Env::creatEnv(self::$ROOT_DIR);
    }

    protected function registerBaseServiceProviders()
    {
        $this->container->addServiceProvider(new AppServiceProvider());
        $this->container->addServiceProvider(new RouteServiceProvider());
        $this->container->addServiceProvider(new ViewServiceProvider());
        $this->container->addServiceProvider(new DatabaseServiceProvider());
    }
}