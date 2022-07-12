<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function getIndex()
    {
        echo "You're logged in as " . session()->get('loggedInUser');
    }
}
