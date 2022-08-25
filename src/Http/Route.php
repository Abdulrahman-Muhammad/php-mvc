<?php

namespace Abdelrahman\PhpMvc\Http;

use Abdelrahman\PhpMvc\Http\Request;

use Abdelrahman\PhpMvc\Http\Response;

class Route
{
    protected Request $request;

    protected Response $response;

    /**
     * __construct
     *
     * @param  mixed $request
     * @param  mixed $response
     * @return void
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public static array $routes = [];

    /**
     * get
     *
     * @param  mixed $route
     * @param  mixed $action
     * @return void
     */
    public static function get($route, callable|array|string $action)
    {

        self::$routes['get'][$route] = $action;
    }


    /**
     * post
     *
     * @param  mixed $route
     * @param  mixed $action
     * @return void
     */
    public static function post($route, callable|array|string $action)
    {

        self::$routes['post'][$route] = $action;
    }

    /**
     * resolve
     *
     * @return void
     */
    public function resolve()
    {

        $path = $this->request->path();

        $method = $this->request->method();

        $actions = self::$routes[$method][$path] ?? false;

        if (!$actions) {
            return;
        }

        //404 handeling 

        if (is_callable($actions)) {

            call_user_func_array($actions, []);
        }

        if (is_array($actions)) {

            call_user_func_array([new $actions[0], $actions[1]], []);
        }
    }
}
