<?php

namespace App\Http\Controllers;

use App\User;

class TestController
{
    public function index()
    {
        $user = new User();
        dd($user->companies->name);
    }
}
