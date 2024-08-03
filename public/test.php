<?php
/**
 * https://stackoverflow.com/questions/29994088/composer-require-local-package
 */
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteContext;
//use Slim\View;
use Fabrication\FabricationEngine;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
//echo '<pre>';
//var_dump(get_class_methods($app));
//echo '</pre>';

//$app->render(
//    'myTemplate.php',
//    array( 'name' => 'Josh' ),
//    404
//);

function getTemplate($body)
{
    $template = <<<EOT
<html>
<head>
    <script src="https://unpkg.com/htmx.org@1.9.4"></script>
</head>
<body>
    $body
</body>
</html>
EOT;

    return $template;
}

function getEngine($template)
{
    // Instantiate Engine.
    $engine = new FabricationEngine();

    // Load and Run the template into the Engine.
    $engine->run($template);

    return $engine;
}

$app->get('/', function (Request $request, Response $response, $args) {

    $routeContext = RouteContext::fromRequest($request);
    $basePath = $routeContext->getBasePath();

    $body = <<<EOT
<div hx-target="this" hx-swap="outerHTML">
<label>Email:
  <input id="email" type="email" name="email" hx-post="/email" value="">
</label>
<div id="message"></div>

<div>BasePath: $basePath</div>
</div>
EOT;

    $engine = getEngine(getTemplate($body));

    // Construct the HTML template, with conditional error message
    $engine->query('//div[@id="message"]')
	->item(0)
	->nodeValue = "Default Message";

    // Query call after run function call
    $engine->query('//input[@id="email"]')
	->item(0)
	->setAttribute('value', 'test@test.com');

    $response->getBody()->write($engine->saveFabric());

    return $response;
});

// Post Email
$app->post('/email', function (Request $request, Response $response, $args) {

    $post = var_export($_POST, true);

    // Body Template
    $body = <<<EOT
<div>
POST EMAIL

$post
</div>
EOT;

    $engine = getEngine(getTemplate($body));

    $response->getBody()->write($engine->saveFabric());

    return $response;
});


$app->run();
