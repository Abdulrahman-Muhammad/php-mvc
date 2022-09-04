<?php

use Dotenv\Dotenv;
use Abdelrahman\PhpMvc\Http\Route;
use Abdelrahman\PhpMvc\Support\Arr;
use Abdelrahman\PhpMvc\Http\Request;
use Abdelrahman\PhpMvc\Http\Response;

require_once __DIR__ . "/../src/Support/Helpers.php";

require_once base_path() . "vendor/autoload.php";

require_once base_path() . "routes/web.php";

$env = Dotenv::createImmutable(base_path());

$env->load();

app()->run();

var_dump(Arr::has(['db' => ['connection' => ['default' => 'mysql']]] , 'db.connection.default'));