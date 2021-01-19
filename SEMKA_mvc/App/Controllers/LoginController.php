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
        $formData = $this->app->getRequest()->getPost();

        if (isset($formData['submit'])) {

            $chybneUdaje = 0;

            if ($formData['password_confirmation'] != $formData['password']) {
                echo '<p class="danger ">Heslá sa nezhodujú</p>';
                $chybneUdaje++;

            }


            $login = (string)$formData['login'];


            $users = User::getAll("",[],"");

            foreach ($users as $user) {
                if ($user->getLogin() === $login) {
                    echo '<p class="danger ">Používateľ s takýmto loginom už existuje!</p>';
                    $chybneUdaje++;
                }

            }

            if ($chybneUdaje > 0)
                return $this->html();



            $user = new User($formData['login'], $formData['password'],'user');
            $user->setPassword(password_hash($formData['password'],PASSWORD_DEFAULT));
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
        return $this->redirect('?');
    }




}