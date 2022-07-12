<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Libraries\Hash;

class Login extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function getIndex()
    {
        return view('auth/login');
    }

    public function postCheck()
    {
        $validated = $this->validate([
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Your e-mail is required',
                    'valid_email' => 'Invalid email'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[20]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Minimum is 5 characters',
                    'max_length' => 'Maximum is 20 characters'
                ]
            ],
        ]);

        if(!$validated)
        {
            return view('auth/login', ['validation' => $this->validator]);
        }

        $email = $this->request->getPost('email');
        $password = trim($this->request->getPost('password'));

        $userModel = new UserModel();
        $userFromDB = $userModel->where('email', $email)->first();

        $passwordCheck = Hash::check($password, $userFromDB['password']);

        //if(Hash::encrypt($password) != $userFromDB['password']) 
        if(!$passwordCheck) 
        {
            //session()->setFlashdata('fail', 'Password is incorrect');
            //return redirect()->to('login');
            return redirect()->to('/login')->with('fail', "Incorrect password");
        }
        else 
        {
            $userId = $userFromDB['user_id'];

            session()->set('loggedInUser', $userId);
            return redirect()->to('/dashboard');
        }

    }

}
