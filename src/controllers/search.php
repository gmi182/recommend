<?php
//http://librosweb.es/tutorial/como-organizar-bien-un-proyecto-silex/
namespace Controllers;

use Silex\Application;
use Silex\ControllerProviderInterface;

/**
 * Class for searching in the site
 */
class Search implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        // creates a new controller based on the default route
        $controllers = $app['controllers_factory'];

        $controllers->get('/', array($this, 'index'));
        $controllers->get('/{keyword}', array($this, 'keyword'));
        $controllers->get('/{typeId}/{keyword}/', array($this, 'findByType'));

        return $controllers;
    }

    public function index()
    {
        return 'index';
    }

    public function findByType()
    {
        return 'sarasa';
        //implement
    }

    public function keyword(Application $app, $keyword)
    {
        //dsajdlkasjdla 
        return 'dasdasda';
    }
}