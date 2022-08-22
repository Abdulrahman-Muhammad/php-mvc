<?php

namespace Abdelrahman\PhpMvc\Http;

class Route {

        protected static array $routes = [];

        public static function get($route , callable|array|string $action){

            self::$routes['GET'][$route] = $action;
        }


        public static function post($route , callable|array|string $action){

            self::$routes['POST'][$route] = $action;
        }
}

