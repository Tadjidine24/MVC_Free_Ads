<?php

namespace Core;

class Router
{
    private static $routes;

    public static function connect($url, $route)
    {
        // echo "Chemin $url <pre>";
         self::$routes[$url] = $route;
    }
    public static function get($url)
    {
        if (isset(self::$routes[$url])) 
        {
           echo "<pre>isset";
            return self::$routes[$url];
        }
        else{
            return ['controller' => 'error', 'index' => 'error'];
            // var_dump(array('controller' => 'app', 'action' => 'index'));
            // print_r(array_key_exists($url, self::$routes) ? self::$routes[$url] : null);
        }
    } 
}