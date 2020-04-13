<?php 

namespace Core;
class Controller
{
    public static $_render;
    protected function render($view, $scope = [])
    {
        extract($scope);
        $paramettre = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';

        if (file_exists($paramettre))
        {

            ob_start();
            include($paramettre);
            $view = ob_get_clean();

            ob_start();
            include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');

            echo self::$_render = ob_get_clean();
        }
    }
}