<?php

use Gaguena\ProductPersist\Product\ProductController;

use Slim\Factory\AppFactory;

require '../vendor/autoload.php';


$app = AppFactory::create();

$app->addBodyParsingMiddleware();

$app->addRoutingMiddleware();

$app->addErrorMiddleware(true, true, true);

ProductController::CreateRouter($app);

$app->run();