<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Models\User;

class LoginController extends AControllerBase
{

    public function index()
    {
        return $this->redirect('?');
    }

    public function register()
    {

        if (isset($_POST['submitR'])) {
            $user = new User($_POST['login'], $_POST['password']);
            $user->setPassword(password_hash($_POST['password'],PASSWORD_DEFAULT));
            $user->save();
            return $this->redirect('?c=Login&a=Login');
        }

        return $this->html();

    }



    public function login()
    {

        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data, 'login');
    }

    public function logout()
    {
        $this->app->getAuth()->logout();
        return $this->html(null, 'logout');
    }


}