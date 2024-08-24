<?php

require '../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Project\OpenApiTest;

$app = AppFactory::create();

// Add routing middleware
// $app->addRoutingMiddleware();

// Add error handling middleware
// $errorMiddleware = $app->addErrorMiddleware(true, true, true);

// API Data
$app->get('/api/data', function (Request $request, Response $response, $args) {
    $api = new OpenApiTest;
    $response->getBody()->write($api->getData());
    return $response;
});

// API DataScore
$app->get('/api/datascore', function (Request $request, Response $response, $args) {
    $api = new OpenApiTest;
    $response->getBody()->write($api->getDataScore());
    return $response;
});

// Run the application
$app->run();
