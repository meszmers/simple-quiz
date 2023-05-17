<?php

require_once 'vendor/autoload.php';

use App\JsonResponse;
use App\Redirect;
use App\Route;
use App\Routes;
use App\View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

session_start();

/**
 * Load .env files into project
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

/**
 * Define application routes
 */
$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $routes = new Routes();

    foreach ($routes->getRoutes() as $route) {
        if ($route instanceof Route) {
            $r->addRoute($route->getMethod(), $route->getRoute(), $route->getHandler());
        }
    }
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);


$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

$twig = new Environment(new FilesystemLoader('app/Views'));

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo $twig->render('404.html');
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:

        $controller = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];

        /**
         * Building given Controller and calling method
         */
        $response = (new $controller())->$method($vars);

        if ($response instanceof View) {
            try {
                echo $twig->render($response->getPath(), $response->getVars());
            } catch (\Twig\Error\Error $e) {
                echo 'Twig Exception: ' . $e->getMessage();
                die;
            }
        }

        if ($response instanceof Redirect) {
            header('Location: ' . $response->getLocation());
        }

        if ($response instanceof JsonResponse) {
            echo $response->getResponse();
        }

        break;
}