<?php
namespace Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

/**
 * Class for Books
 */
class Book implements ControllerProviderInterface
{

    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];

        $controllers->get('/', array($this, 'index'));

        return $controllers;
    }

    public function index(Application $app)
    {
        return $app['twig']->render('book/index.twig');
    }
}