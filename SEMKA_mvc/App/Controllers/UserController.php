<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class UserController extends AControllerBase
{

    public function index()
    {
        return $this->redirect('?');
    }





    public function edit()
    {
        $formData = $this->app->getRequest()->getPost();
        $user = $this->app->getAuth()->getLoggedUser();
        if (isset($formData['submit'])) {
            $user->setLogin($formData['login']);
            $user->setPassword(password_hash($formData['password'],PASSWORD_DEFAULT));
            $user->save();

            return $this->redirect('?');
        }




        return $this->html(User::getOne($_GET['id']));


    }


    public function settings() {
        if (isset($_GET['id']))
            return $this->html(User::getOne($_GET['id']));

    }






}