<?php

namespace App\Controllers\Auth;

use   App\Controllers\BaseController;

class Auth extends BaseController
{
    public function auth()
    {

        $data['title'] = "Login";
        echo view('tamplates/header', $data);
        echo view('auth/auth');
        echo view('tamplates/footer');
    }

    public function register()
    {
        $data['title'] = "Register";
        echo view('tamplates/header', $data);
        echo view('auth/register');
        echo view('tamplates/footer');
    }
    public function forgot()
    {
        $data['title'] = "Forgot Password";
        echo view('tamplates/header', $data);
        echo view('auth/forgot_password');
        echo view('tamplates/footer');
    }
    // public function reset()
    // {
    //     $data['title'] = "Forgot Password";
    //     echo view('tamplates/header', $data);
    //     echo view('auth/reset_password');
    //     echo view('tamplates/footer');
    // }
}
