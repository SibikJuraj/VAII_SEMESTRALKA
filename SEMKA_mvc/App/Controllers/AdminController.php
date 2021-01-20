<?php


namespace App\Controllers;


use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Inzerat;
use App\Models\Kategoria;
use App\Models\Komentar;
use App\Models\User;

class AdminController extends AControllerBase
{


    public function index()
    {
        if ($this->app->getAuth()->getLoggedUser()->getType() == 'admin')
            return $this->html();


        return $this->redirect('?');
    }



    public function allUsers() {

        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getType() != "admin")
            return $this->redirect('?c=User&a=Settings&id='.$this->app->getAuth()->getLoggedUser()->getId());


        return $this->html(User::getAll());
    }


    public function setUsersType() {
        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getType() != 'admin')
            return $this->redirect('?c=User&a=Settings&id='.$this->app->getAuth()->getLoggedUser()->getId());

        return $this->json(User::getAll());


    }


    public function mazanieKategorii() {
        return $this->html(Kategoria::getAll());
    }

    public function mazanieKomentarov() {
        return $this->html(Komentar::getAll());
    }


    public function deleteKategoria()
    {
        if(!$this->app->getAuth()->isLogged())
            return $this->redirect('?');

        if ($this->app->getAuth()->getLoggedUser()->getType() == 'admin') {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $kategoria = Kategoria::getOne($id);
                $inzeraty = Inzerat::getAll("idKategoria = ".$id);

                foreach ($inzeraty as $inzerat) {
                    $inzerat->delete();
                }
                $kategoria->delete();
            }
        }
        return $this->redirect('?c=Admin&a=MazanieKategorii');
    }


    public function deleteKomentar()
    {
        if(!$this->app->getAuth()->isLogged())
            return $this->redirect('?');

        if ($this->app->getAuth()->getLoggedUser()->getType() == 'admin') {

            if (isset($_GET['id'])) {
                $id = $_GET['id'];

                $komentar = Komentar::getOne($id);
                $komentar->delete();
            }
        }
        return $this->redirect('?c=Admin&a=MazanieKomentarov');
    }



}