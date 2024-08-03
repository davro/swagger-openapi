<?php
require '../vendor/autoload.php';

use Swagger\Annotations as SWG;

// Path to Swagger UI distribution
$swaggerUiPath = 'swagger-ui/';

// Path to your OpenAPI YAML file
$openApiYamlPath = 'openapi.yaml';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swagger UI</title>
    <link rel="stylesheet" type="text/css" href="<?= $swaggerUiPath ?>swagger-ui.css">
    <link rel="icon" type="image/png" href="<?= $swaggerUiPath ?>favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= $swaggerUiPath ?>favicon-16x16.png" sizes="16x16" />
    <style>
        html {
            box-sizing: border-box;
            overflow: -moz-scrollbars-vertical;
            overflow-y: scroll;
        }
        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        body {
            margin: 0;
            background: #fafafa;
        }
    </style>
</head>
<body>
<div id="swagger-ui"></div>
<script src="<?= $swaggerUiPath ?>swagger-ui-bundle.js"></script>
<script src="<?= $swaggerUiPath ?>swagger-ui-standalone-preset.js"></script>
<script>
    window.onload = function() {
        // Begin Swagger UI call region
        const ui = SwaggerUIBundle({
            url: "<?= $openApiYamlPath ?>",
            dom_id: '#swagger-ui',
            deepLinking: true,
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
            layout: "StandaloneLayout"
        })
        // End Swagger UI call region

        window.ui = ui
    }
</script>
</body>
</html>

