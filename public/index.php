<?php

use Abdelrahman\PhpMvc\Http\Route;
use Abdelrahman\PhpMvc\Http\Request;
use Abdelrahman\PhpMvc\Http\Response;

require_once __DIR__ . "/../src/Support/Helpers.php";

require_once base_path() . "vendor/autoload.php";

require_once base_path() . "routes/web.php";

$route = new Route(new Request, new Response);

$route->resolve();

// var_dump(base_path());
