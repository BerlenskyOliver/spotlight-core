<?php

namespace Spotlight\Providers;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;


class DatabaseServiceProvider extends ServiceProvider
{

    protected  $provides = [
        EntityManager::class
    ];

  
    public function register()
    {
        
        $this->app->container->share(EntityManager::class, function () {
            // Create a simple "default" Doctrine ORM configuration for Annotations
            $isDevMode = true;
            $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/../"), $isDevMode);
            // or if you prefer XML
            // $config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config"), $isDevMode);
            // database configuration parameters
            $conn = [
                'driver' => 'pdo_sqlite',
                'path' => __DIR__ . '/../../database/database.sqlite',
                ];

            // obtaining the entity manager
            return EntityManager::create($conn, $config);
        });
    }
}