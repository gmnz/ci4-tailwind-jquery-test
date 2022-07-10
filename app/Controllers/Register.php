<?php

namespace App\Controllers;

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
        //$validated = $this->validate([
        //    'name'        => 'required',
        //    'email'       => 'required|valid_email',
        //    'password'    => 'required|min_length[5]|max_length[20]',
        //    'cpassword' => 'required|min_length[5]|max_length[20]|matches[password]',
        //]);

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
                    'valid_email' => 'Email is already used'
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
                    'required' => 'Confirmation of password is required',
                    'matches' => 'Must match the password above'
                ]
            ],
        
        ]);



        if(!$validated)
        {
            return view('auth/register', ['validation' => $this->validator]);
        }
    }

}
