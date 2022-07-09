<?php

namespace App\Controllers;

class Frontpage extends BaseController
{
    public function getIndex()
    {
        return view('frontpage');
    }
}
