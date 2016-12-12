<?php
ini_set('display_errors', 1);

// framework/front.php
//require_once __DIR__.'/vendor/autoload.php';
//require_once '/var/www/vendor/autoload.php';
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$map = array(
//    '/hello' => __DIR__.'/hello.php',
//    '/bye'   => __DIR__.'/bye.php',
    '/hello' => '/var/www/src/pages/hello.php',
    '/bye'   => '/var/www/src/pages/bye.php',
);

$path = $request->getPathInfo();
if (isset($map[$path])) {
    require $map[$path];
//    $response = new Response();
} else {
//    $response = new Response();
    $response->setStatusCode(404);
    $response->setContent('Not Found');
}

$response->send();