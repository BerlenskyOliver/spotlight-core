<?php

namespace Spotlight\Support\View\Extensions;

use League\Route\Router;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RoutePathExtension extends AbstractExtension
{
    protected $router;
     
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function getFunctions()
    {
        return [new TwigFunction('path', [$this, 'path'])];
    }

    public function path(string $routeName)
    {
        return $this->router->getNamedRoute($routeName)->getPath();
    }
}