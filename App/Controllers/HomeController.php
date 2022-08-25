<?php

namespace App\Controllers;

class HomeController
{
    public function index() {


        $users = User::all();

        return view('home' , compact('users'));

    }
}
