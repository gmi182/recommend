<?php
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
  //  'controllers' => __DIR__ . '/controllers'
));