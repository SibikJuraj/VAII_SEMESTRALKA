<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Inzerat;
use App\Models\Komentar;
use App\Models\User;

class UserController extends AControllerBase
{

    public function index()
    {
        if (!$this->app->getAuth()->isLogged())
            return $this->redirect('?');

        if (isset($_GET['id']))
            return $this->html(User::getOne($_GET['id']));
    }


    public function zmenitHeslo()
    {
        $formData = $this->app->getRequest()->getPost();
        $user = $this->app->getAuth()->getLoggedUser();
        if (isset($formData['submit'])) {
            $user->setPassword(password_hash($formData['password'],PASSWORD_DEFAULT));
            $user->save();

            return $this->redirect('?');
        }

        return $this->html(User::getOne($_GET['id']));


    }


    public function delete()
    {
        if(!$this->app->getAuth()->isLogged())
            return $this->redirect('?');

        $idUser = $this->app->getAuth()->getLoggedUser()->getId();

        $user = User::getOne($idUser);

        $komentare = Komentar::getAll("idAutor =".$idUser);
        $inzeraty = Inzerat::getAll("idOwner =".$idUser);


        foreach ($komentare as $komentar) {
            $komentar->delete();
        }



        foreach ($inzeraty as $inzerat) {
            $inzerat->delete();
        }




        $user->delete();

        $this->app->getAuth()->logout();


        return $this->redirect('?');
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





}