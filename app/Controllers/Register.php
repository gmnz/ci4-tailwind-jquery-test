<?php

namespace App\Controllers;

class Register extends BaseController
{
    public function getIndex()
    {
        return view('auth/register');
    }

    //public function getShow($page = 'home')
    //{
    //    echo "This is the " . $page . " page.";
    //}
}
