<?php

namespace Cleaf\Controller;

use Cleaf\Config\Controller;
use Cleaf\Config\View;

class UserController extends Controller
{

    public function index()
    {
        $title = 'Todo List by Satriyo';

        View::render('todo', compact('title'));
    }
}
