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
    const WIKI_URL = 'http://es.wikipedia.org';

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
        $encodedKeyword = urlencode($keyword);
        $wikiSearch  = file_get_contents(self::WIKI_URL . "/w/index.php?search={$encodedKeyword}+libro");
        if (preg_match('%mw-search-result-heading.>\s*<a\shref="(?P<url>[^"]*)"\stitle="(?P<name>[^"]*)"%i', $wikiSearch, $match)) {
            $bookPage = file_get_contents(self::WIKI_URL . $match['url']);
            $regex = '<table.+?infobox_v2[\s\S]+?<th[^>]*>(?P<name>[^<]*)</th>[\s\S]+?Autor</th>\s*<td[^>]*><a.+?href="(?P<url>[^"]*)"\stitle="(?P<author>[^"]*)"[\s\S]+?G.+?nero</th>\s*<td[^>]*><a.+?title="(?P<genre>[^"]*)"[\s\S]+?(Fecha\sde\spublicaci.n</th>\s*<td[^>]*>(?P<year>[^<]*)<[\s\S]+?)?</table>[\s\S]+?<p>(?P<descr1>[\s\S]*?)</p>(\s*<p>(?P<desc2>[\s\S]*?)</p>)?(\s*<p>(?<desc3>[\s\S]*?)</p>)?(\s*<p>(?<desc4>[\s\S]*?)</p>)?(\s*<p>(?<desc5>[\s\S]*?)</p>)?';
            if (preg_match("%{$regex}%i", $bookPage, $bookMatch)) {
                var_dump($bookMatch);
            }
        }
        die;
        //dsajdlkasjdla 
        return 'dasdasda';
    }
}