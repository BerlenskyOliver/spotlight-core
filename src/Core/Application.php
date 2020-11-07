<?php

namespace Spotlight\Core;

use League\Container\Container;
use League\Container\ReflectionContainer;
use League\Route\Router;
use Spotlight\Providers\AppServiceProvider;
use Spotlight\Providers\DatabaseServiceProvider;
use Spotlight\Providers\RouteServiceProvider;
use Spotlight\Providers\ViewServiceProvider;
use Spotlight\Support\Env;

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