<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function getIndex()
    {
        //echo "You're logged in as " . session()->get('loggedInUser');

        $userModel = new UserModel();
        $userData = $userModel->find(session()->get('loggedInUser'));

        return view('dashboard', ['userData' => $userData]);
    }
}
