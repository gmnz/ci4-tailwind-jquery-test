<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        helper(['login']);
        check_logged_in();
    }

    public function getIndex()
    {
        $userModel = new UserModel();
        $userData = $userModel->find(session()->get('loggedInUser'));

        return view('dashboard', ['userData' => $userData]);
    }
}
