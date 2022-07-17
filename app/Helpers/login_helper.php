<?php

function check_logged_in()
{
    if(empty(session()->get('loggedInUser')))
    {
        //return redirect()->to('login');
        header("Location: /login");
        die;
    }
}