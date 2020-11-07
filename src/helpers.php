<?php

use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface;
use Spotlight\Support\Env;
use Spotlight\Support\View\View;

if(!function_exists('redirect')){

    /**
     * @param string $url
     * @param int $status
     * @return RedirectResponse
     */
    function redirect(string $url, int $status = 302)
    {
        return new RedirectResponse($url, $status);
    }
}

if(!function_exists('view')){

    /**
     * @param string $url
     * @param array $variables
     * @return ResponseInterface
     */
    function view(string $url, array $variables = [])
    {
        return View::render($url, $variables);
    }
}

if(!function_exists('env')){

    /**
     * @param string $name
     * @param null $defaultKeys
     * @return ResponseInterface
     */
    function env(string $name, $defaultKeys = null)
    {
        return Env::get($name, $defaultKeys);
    }
}