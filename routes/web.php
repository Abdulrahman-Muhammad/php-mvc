<?php

use Abdelrahman\PhpMvc\Http\Route;
use App\Controllers\HomeController;

Route::get('/', function () {
    echo 'Hello World';
});

Route::get('/new', [HomeController::class, 'index']);
