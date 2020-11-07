<?php
 
namespace Spotlight\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;
use Spotlight\Core\Application;

class ServiceProvider extends AbstractServiceProvider
{
    public Application $app;

    public function __construct()
    {
        $this->app = Application::$app;
    }
    
    public function register()
    {
        ///
    }
}