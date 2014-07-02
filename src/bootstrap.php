<?php

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallback' => 'en',
));

$app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());
    return $translator;
}));

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
  //  'controllers' => __DIR__ . '/controllers'
));

$lang = 'es-AR';
if ($app['session']->get('current_language')) {
    $lang = $app['session']->get('current_language');
}
 
foreach (glob(__DIR__ . '/locale/'. $lang . '/*.yml') as $locale) {
    $app['translator']->addResource('yaml', $locale, $lang);
}

/* sets current language */
$app['translator']->setLocale($lang);
