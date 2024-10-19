<?php

namespace Cleaf\Controller;

use Cleaf\Config\Controller;
use Cleaf\Config\View;
use Cleaf\Model\User;

class AuthController extends Controller
{
    public function index()
    {
        $title = 'Login';

        View::render('auth/login', compact('title'));
    }

    public function register()
    {
        $title = 'Register';

        View::render('auth/register', compact('title'));
    }

    public function create()
    {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);

        if ($password !== $confirm_password) {
            View::render('auth/register', [
                'message' => 'Password not match'
            ]);
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $user = new User();
        $user->create($name, $email, $hash);

        header('Location: /login');
    }

    public function login()
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $user = new User();
        $result = $user->findByEmail($email);

        if ($result) {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_name'] = $result['name'];
                $_SESSION['auth'] = true;
                header('Location: /pages');
                exit;
            } else {
                View::render('auth/login', [
                    'message' => 'Invalid email or password'
                ]);
            }
        } else {
            View::render('auth/login', [
                'message' => 'Invalid email or password'
            ]);
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
    }
}
