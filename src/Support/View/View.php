<?php
namespace Spotlight\Support\View;


use Psr\Http\Message\ResponseInterface;
use Spotlight\Core\Application;
use Spotlight\Support\View\Extensions\CsrfExtension;
use Spotlight\Support\View\Extensions\RoutePathExtension;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class View
{

    /**
     * @var Environment
     */
    public static $environment;
    /**
     * @var ResponseInterface
     */
    public static $response;

    /**
     * View constructor.
     * @param Environment $environment
     */
    public function __construct(Environment $environment)
    {
        self::$environment = $environment;
        self::$response = Application::$app->container->get('response');
    
    }


    /**
     * @param string $view
     * @param array $variables
     * @return ResponseInterface
     */
    public static function render(string $view, array $variables = []): ResponseInterface
    {
        $view = str_replace('.', '/', $view) . '.twig';

        try {
            self::$response->getBody()->write(
                self::$environment->render($view, $variables)
            );
        } catch (LoaderError $e) {
        } catch (RuntimeError $e) {
        } catch (SyntaxError $e) {
        }
        return self::$response;
    }
}