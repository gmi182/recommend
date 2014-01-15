<?php

/*require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
/*$app['autoloader']->registerNamespace(
    array('Controllers', __DIR__ . '/controllers')
);*/
//$app->register(new Controllers\SearchControllerProvider());
//$app->mount('/controllers', new Search\SearchControllerProvider());
/*$app->mount(__DIR__ . '/controllers', new Controllers\Search());

/*$app->get('/hello', function() {
    return 'Hello!';
});*/
//$app->run();

//use Symfony\Component\HttpFoundation\Response;
require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/app.php';