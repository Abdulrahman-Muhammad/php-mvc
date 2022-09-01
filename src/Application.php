<?php

namespace Abdelrahman\PhpMvc;

use Abdelrahman\PhpMvc\Http\Route;
use Abdelrahman\PhpMvc\Http\Request;
use Abdelrahman\PhpMvc\Http\Response;

class Application
{

    protected Route $route;

    protected Request $request;

    protected Response $response;

    public function __construct()
    {


        $this->request = new Request;

        $this->response = new Response;

        $this->route = new Route($this->request, $this->response);
    }

    public function run()
    {

        $this->route->resolve();
    }

    public function __get($name)
    {

        if (property_exists($this, $name)) {

            return $this->name;
        }
    }

    public function __set($name, $value)
    {
    }
}
