<?php
class Router
{
    public function __construct()
    {
        $data = '';
        $router = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
        $page = (isset($router[1])) ? $router[1] : 'home';
        if (file_exists('src/' . $page . '.php')):
            global $data;
            $data = (isset($router[2])) ? $router[2] : '';
            include_once 'src/' . $page . '.php';
        else:
            include_once 'src/404.php';
        endif;
    }
}