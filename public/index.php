<?php
/**
 * Date: 02/10/18
 * Time: 19:18
 */

ini_set('display_errors', 1);

require '../vendor/autoload.php';

$request = function () {
    $requestParts = explode('?', $_SERVER['REQUEST_URI']);

    return $requestParts[0];
};

$request = $request();

$routes = include '../config/routes.php';

if (! isset($routes[$request])) {
    die('Página não encontrada');
}

$controller = $routes[$request]['controller'];
$method = $routes[$request]['method'];

(new $controller) -> $method();

