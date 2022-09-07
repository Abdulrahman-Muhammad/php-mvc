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

// var_dump(Arr::has(['db' => ['connection' => ['default' => 'mysql']]] , 'db.connection.default'));

// var_dump(Arr::last(['one' , 'two' , 'three'] , function($item){

//     var_dump($item);
// }));

$arr = [
    'db' => [
        'connections' => [
            'default' => 'mysql'
        ]
    ]
]; 

// var_dump($arr);

(Arr::forget($arr, 'db.connections.default'));

var_dump($arr);
