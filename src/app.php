<?php
error_reporting(E_ALL);
//Need to update composer // php composer.phar install or update
//http://www.erikaheidi.com/blog/silex-and-localization-l10n-translationserviceprovider

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug']=true;
//$app->register(new Controllers\Search());

require_once 'bootstrap.php';

//require_once __DIR__ . '/controllers/book.php';

$app->mount('home', new Controllers\Home());
$app->mount('book', new Controllers\Book());
$app->mount('search', new Controllers\Search());


//require_once 'controllers/search.php';
 
/*$app->error(function (\Exception $e, $code) { 
	return new Response($e->getMessage());
});*/

// $app['base_path'] = "http://" . $app['request']->server->get('HTTP_HOST');

//$app['assets_path'] = "/assets";
//$app['kaltura_cdn'] = "http://cdn.kaltura.com/p/1164832/thumbnail/entry_id";

//$mongo = new Mongo("mongodb://fw:fweltiro@paulo.mongohq.com:10090/fwtest", array("persist" => "x"));
//$db = $mongo->fwtest;

// require 'controllers/defaultController.php';
//require 'controllers/homeController.php';
//require 'controllers/videoController.php';

$app->run();