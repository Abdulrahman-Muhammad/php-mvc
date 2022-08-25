<?php

use Abdelrahman\PhpMvc\Http\Route;
use Abdelrahman\PhpMvc\Http\Request;
use Abdelrahman\PhpMvc\Http\Response;

require_once __DIR__ . "/../vendor/autoload.php";

require_once __DIR__ . "/../routes/web.php";

$route = new Route(new Request, new Response);

$route->resolve();
