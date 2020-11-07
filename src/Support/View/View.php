<?php
namespace Spotlight\Support\View;


use Psr\Http\Message\ResponseInterface;
use Symfony\Contracts\Service\ResetInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

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
     * @param ResponseInterface $response
     */
    public function __construct(Environment $environment, ResponseInterface $response)
    {
        self::$environment = $environment;
        self::$response = $response;
    
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