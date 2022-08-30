<?php

use Abdelrahman\PhpMvc\View\view;

// namespace Abdelrahman\PhpMvc\Support;

// class Helpers
// {

// }

if (!function_exists('env')) {
    /**
     * env
     *
     * @param  mixed $key
     * @param  mixed $default
     * @return void
     */
    function env($key, $default = null)
    {
        return $_ENV[$key] ?? value($default);
    }
}


if (!function_exists('value')) {
    /**
     * value
     *
     * @param  mixed $value
     * @return void
     */
    function value($value)
    {

        return ($value instanceof Closure) ? $value() : $value;
    }
}


if (!function_exists('base_path')) {

    function base_path()
    {
        return dirname(__DIR__) . "/../";
    }
}



if (!function_exists('view_path')) {

    function view_path()
    {
        return base_path() . "Views/";
    }
}




if (!function_exists('view')) {

    function view($view , $params = [])
    {
        view::make($view , $params);
    }
}
