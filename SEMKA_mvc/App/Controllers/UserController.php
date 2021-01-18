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


    public function allUsers() {

        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getType() != "admin")
            return $this->redirect('?c=User&a=Settings&id='.$this->app->getAuth()->getLoggedUser()->getId());


        return $this->html(User::getAll());
    }



    public function setType() {
        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getType() != "admin")
            return $this->redirect('?c=User&a=Settings&id='.$this->app->getAuth()->getLoggedUser()->getId());


        if (isset($_POST['id'])) {
            $user = User::getOne($_POST['id']);

            if ($user->getId() != $this->app->getAuth()->getLoggedUser()->getId()) {
                $user->setType($_POST['type']);
                $user->save();

            }


        }




        return $this->html();
    }



    public function setUsersType() {
        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getType() != 'admin')
            return $this->redirect('?c=User&a=Settings&id='.$this->app->getAuth()->getLoggedUser()->getId());



        return $this->json(User::getAll());


    }



}