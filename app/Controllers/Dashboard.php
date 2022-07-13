<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function getIndex()
    {
        if(empty(session()->get('loggedInUser')))
        {
            return redirect()->to('login');
        }

        $userModel = new UserModel();
        $userData = $userModel->find(session()->get('loggedInUser'));

        return view('dashboard', ['userData' => $userData]);
    }
}
