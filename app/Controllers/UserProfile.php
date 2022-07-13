<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserProfile extends BaseController
{
    public function getEdit($userId)
    {
        //echo "You're logged in as " . session()->get('loggedInUser');

        if(empty(session()->get('loggedInUser')))
        {
            return redirect()->to('login');
        }

        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        return view('userProfile/edit', ['userData' => $userData]);
    }
}
