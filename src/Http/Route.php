<?php

namespace Abdelrahman\PhpMvc\Http;

use Abdelrahman\PhpMvc\Http\Request;

use Abdelrahman\PhpMvc\Http\Response;

class Route {
    protected Request $request;

    protected Response $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }




    public static array $routes = [];

        public static function get($route , callable|array|string $action){

            self::$routes['GET'][$route] = $action;
        }


        public static function post($route , callable|array|string $action){

            self::$routes['POST'][$route] = $action;
        }

        public function resolve(){

            $path = $this->request->path();

            $method = $this->request->method();

            $actions = self::$routes[$method][$path] ?? false;

            var_dump($actions);

        }
}

