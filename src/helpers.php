<?php

use App\Support\View\View;
use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface;


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
        return \App\Support\Env::get($name, $defaultKeys);
    }
}