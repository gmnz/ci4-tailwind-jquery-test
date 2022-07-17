<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserProfile extends BaseController
{
    public function __construct()
    {
        helper(['login']);
        check_logged_in();
    }

    public function postEdit($userId) {
        $this->getEdit($userId);
    }

    public function getEdit($userId)
    {

        $userModel = new UserModel();
        $userData = $userModel->find($userId);

        return view('userProfile/edit', ['userData' => $userData]);
    }

    public function postUpdate()
    {
        $loggedInUserId = session()->get('loggedInUser');

        $config['upload_path'] = getcwd().'/images';
        $img = $this->request->getFile('userImage');

        $userModel = new UserModel();
        $userData = $userModel->find($loggedInUserId);

        if(!is_dir($config['upload_path']))
        {
            mkdir($config['upload_path'], 0777);
        }

        $newData['name'] = $this->request->getPost('userName');

        $imageName = $img->getName();

        if($imageName)
        {
            if(!empty($userData['avatar']))
            {
                if(file_exists(
                        $config['upload_path'] . 
                        "/" . 
                        $userData['avatar']
                ))
                {
                    unlink(
                        $config['upload_path'] . 
                        "/" . 
                        $userData['avatar']
                    );
                }

            }

            if($img->hasMoved())
            {
                return redirect()
                    ->to("userProfile/edit/{$loggedInUserId}")
                    ->with('failImage', 'Image upload failed');
            }

            $img->move($config['upload_path'], $imageName);

            $imageName = $img->getName();
            $newData['avatar'] = $imageName;
        }

        $userModel->update($loggedInUserId, $newData);

        return redirect()
            ->to("userProfile/edit/{$loggedInUserId}")
            ->with('successImage', 'Profile udpated successfully');

    }

    public function getIndex()
    {
        //$filters['user_id_comp'] = $this->request->getGet('user_id_comp');
        //$filters['user_id'] = $this->request->getGet('user_id');
        if(!empty($this->request->getGet('username'))) 
        {
            $filters['name'] = $this->request->getGet('username');
        }
        if(!empty($this->request->getGet('email'))) 
        {
            $filters['email'] = $this->request->getGet('email');
        }

        $userModel = new UserModel();
        if(isset($filters)) 
        {
            $userData = $userModel->like($filters)->findAll();
            return view('userProfile/index', [
                'userData' => $userData,
                'filters' => $filters
            ]);
        }
        else
        {
            $userData = $userModel->findAll();
            return view('userProfile/index', ['userData' => $userData]);
        }

    }

}
