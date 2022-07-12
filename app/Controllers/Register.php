<?php

namespace App\Controllers;

use App\Libraries\Hash;

use App\Models\UserModel;

class Register extends BaseController
{

    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function getIndex()
    {
        return view('auth/register');
    }

    public function postStore()
    {

        $validated = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Your full name is required'
                ]
            ],
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
            'cpassword' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    //'required' => 'Confirmation of password is required',
                    //'min_length' => 'Minimum is 5 characters',
                    //'max_length' => 'Maximum is 20 characters',
                    'matches' => 'Must match the password above'
                ]
            ],
        
        ]);



        if(!$validated)
        {
            return view('auth/register', ['validation' => $this->validator]);
        }

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = trim($this->request->getPost('password'));

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => Hash::encrypt($password),
        ];

        $userModel = new UserModel();
        $query = $userModel->insert($data);

        if(!$query)
        {
            return redirect()->to('/register')->with('fail', 'Saving user failed');

            //return view('auth/register', [
            //    'validation' => $this->validator,
            //    'fail' => 'Saving user failed',
            //]);
        }
        else
        {
            return redirect()->to('/register')->with('success', 'Registered successfully');
        }

    }

}
