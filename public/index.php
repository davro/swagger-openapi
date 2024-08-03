<?php

require '../vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();

// Add routing middleware
// $app->addRoutingMiddleware();

// Add error handling middleware
// $errorMiddleware = $app->addErrorMiddleware(true, true, true);

// API Data
$app->get('/api/data', function (Request $request, Response $response, $args) {
    $openapiTest = new Project\OpenApiTest;
    $response->getBody()->write($openapiTest->getData());
    return $response;
});

// API DataScore
$app->get('/api/datascore', function (Request $request, Response $response, $args) {
    $openapiTest = new Project\OpenApiTest;
    $response->getBody()->write($openapiTest->getDataScore());
    return $response;
});

// Run the application
$app->run();