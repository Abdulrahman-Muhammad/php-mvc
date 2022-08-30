<?php

namespace App\Controllers;

use Abdelrahman\PhpMvc\View\view;

class HomeController
{
    public function index()
    {


        // $users = User::all();

        return view::make('home');
    }
}
