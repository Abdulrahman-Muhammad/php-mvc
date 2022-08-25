<?php

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
