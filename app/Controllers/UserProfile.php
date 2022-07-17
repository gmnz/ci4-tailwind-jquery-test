<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserProfile extends BaseController
{
    public function postEdit($userId) {
        $this->getEdit($userId);
    }

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
        $userModel = new UserModel();
        $userData = $userModel->findAll();

        return view('userProfile/index', ['userData' => $userData]);
    }

}
