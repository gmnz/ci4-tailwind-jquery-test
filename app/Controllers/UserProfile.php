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

    public function postUpdateProfile()
    {
        $loggedInUserId = session()->get('loggedInUser');

        $config['upload_path'] = getcwd().'/images';
        $imageName = $this->request->getFile('userImage')->getName();

        $userModel = new UserModel();
        $userData = $userModel->find($loggedInUserId);

        if(!empty($userData['avatar']) && $imageName)
        {
            unlink($config['upload_path'] . "/" . $userData['avatar']);
        }

        if(!is_dir($config['upload_path']))
        {
            mkdir($config['upload_path'], 0777);
        }

        $img = $this->request->getFile('userImage');

        if($imageName) 
        {
            $data['avatar'] = $imageName;
        }
        $data['name'] = $this->request->getPost('userName');


        $userModel = new UserModel();
        $userModel->update($loggedInUserId, $data);

        if(!$img->hasMoved() && $loggedInUserId && $imageName)
        {
            $img->move($config['upload_path'], $imageName);


            return redirect()
                ->to("userProfile/edit/{$loggedInUserId}")
                ->with('successImage', 'Image uploaded successfully');
        }
        else
        {
            return redirect()
                ->to("userProfile/edit/{$loggedInUserId}")
                ->with('failImage', 'Image upload failed');
        }
    }

}
