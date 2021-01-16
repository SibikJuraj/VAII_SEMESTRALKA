<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Inzerat;
use App\Models\User;

class InzeratController extends AControllerBase
{


    public function index()
    {
        return $this->html(Inzerat::getAll("",[],"id DESC"));
    }

    public function add()
    {
        if(!$this->app->getAuth()->isLogged())
            return $this->redirect('?');


        if (!isset($_POST['titulok'])) return $this->html();


        $inzerat = new Inzerat($_POST['titulok'], $_POST['text'],(float)$_POST['cena'], $_POST['obrazok'],$_POST['idOwner']);
        $inzerat->save();


        return $this->redirect('?');

    }

    public function edit()
    {

        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getId() != Inzerat::getOne($_GET['id'])->getIdOwner())
            return $this->redirect('?');

        if (isset($_POST['id'])) {


            $inzerat = Inzerat::getOne($_POST['id']);
            $inzerat->setTitulok($_POST['titulok']);
            $inzerat->setText($_POST['text']);
            $inzerat->setCena((float)$_POST['cena']);
            $inzerat->setObrazok($_POST['obrazok']);
            $inzerat->save();

            return $this->redirect("?c=Inzerat&a=Detail&id=". $inzerat->getId());


        }




        return $this->html(Inzerat::getOne($_GET['id']));


    }


    public function delete()
    {
        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getId() != Inzerat::getOne($_GET['id'])->getIdOwner())



        if (isset($_GET['id'])) {
            $inzerat = Inzerat::getOne($_GET['id']);
            $inzerat->delete();

        }
        return $this->redirect('?');
    }


    public function detail()
    {

        if (isset($_GET['id'])) return $this->html(Inzerat::getOne($_GET['id']));
        return $this->redirect('?');
    }


    public function inzeraty()
    {

        $inzPom = Inzerat::getAll("",[],"id DESC");


        foreach ($inzPom as $inzerat)
            $inzerat->setOwner($inzerat->getOwner());


       return $this->json($inzPom);
    }


}