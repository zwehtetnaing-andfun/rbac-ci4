<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Libraries\Hash;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function register()
    {
        return view("auth/register");
    }

    public function store()
    {
        helper(['form','url']);

        $rules = [
            'username' => 'required|min_length[3]|is_unique[users.username]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        if(!$this->validate($rules))
        {
            return redirect()->to('/register')->withInput();
        }

        $userModel = new UserModel();
        $userModel->save([
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => Hash::make($this->request->getPost('password'))
        ]);

        return redirect()->to('/login');
    }


    public function login()
    {
        return view('auth/login'); 
    }

    public function authenticate()
    {
        helper(['form','url']);

        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            die('validate fail');
            return redirect()->to('/login')->withInput();
        }

        $userModel = new UserModel();

        $user = $userModel->getUserByEmail($this->request->getPost('email'));


        if($user && Hash::verify($this->request->getPost('password'),$user['password']) )
        {
            
            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'logged_in' => true
            ]);

            return redirect()->to('/posts');
        }
        return redirect()->to('/login')->with('error','Invalid credentials');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
