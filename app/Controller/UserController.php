<?php

namespace Cleaf\Controller;

use Cleaf\Config\Controller;
use Cleaf\Config\View;

class UserController extends Controller
{

    public function index($name = 'Satriyo')
    {
        $title = 'Cleaf Framework';

        View::render('home', compact('title'));
    }
}
