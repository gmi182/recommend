<?php

$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'locale_fallback' => 'es-AR',
));

//var_dump(glob(__DIR__ . '/locale/es-AR/*.yml')); die;

$app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
    //$fileLocator = new Symfony\Component\Config\FileLocator(glob(__DIR__ . '/locale/es-AR/*.yml'));
    $translator->addLoader('yaml', new Symfony\Component\Translation\Loader\YamlFileLoader());
    return $translator;
}));

$lang = 'es-AR';
/*if ($app['session']->get('current_language')) {
    $lang = $app['session']->get('current_language');
}*/

foreach (glob(__DIR__ . '/locale/'. $lang . '/*.yml') as $locale) {
    $app['translator']->addResource('yaml', $locale, $lang);
}

/* sets current language */
$app['translator']->setLocale($lang);

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/views',
  //  'controllers' => __DIR__ . '/controllers'
));
