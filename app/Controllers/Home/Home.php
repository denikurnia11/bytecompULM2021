<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        return view('Home/v_home');
    }
}
