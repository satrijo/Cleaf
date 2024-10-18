<?php

namespace Cleaf\Controller;

use Cleaf\Config\Controller;
use Cleaf\Config\View;

class UserController extends Controller
{

    public function index($name = 'Satriyo')
    {
        $title = 'Home';
        View::render('home', compact('title'));
    }

    public function login()
    {
        $title = 'Login';

        View::render('login', compact('title'));
    }
}
