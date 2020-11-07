<?php


namespace Stellar\Support;


use Dotenv\Dotenv;
use Dotenv\Repository\Adapter\EnvConstAdapter;
use Dotenv\Repository\Adapter\PutenvAdapter;
use Dotenv\Repository\RepositoryBuilder;

class Env
{

    public static function creatEnv(string $path)
    {
        $repository = RepositoryBuilder::createWithNoAdapters()
            ->addAdapter(EnvConstAdapter::class)
            ->addWriter(PutenvAdapter::class)
            ->immutable()
            ->make();

        return (Dotenv::create($repository, $path))->load();
    }

    public static function get($name, $defaultKeys = null)
    {
        if($defaultKeys !== null)
        {
            return $defaultKeys;
        }
        return $_ENV[$name];
    }
}