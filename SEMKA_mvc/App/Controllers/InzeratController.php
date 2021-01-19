<?php
declare(strict_types=1);

namespace App\Controllers;


use App\Core\AControllerBase;
use App\Models\Inzerat;
use App\Models\Kategoria;
use App\Models\Komentar;


class InzeratController extends AControllerBase
{

    public function index()
    {

        return $this->html(Inzerat::getAll("",[],"id DESC"));
    }

    public function add()
    {


        $formData = $this->app->getRequest()->getPost();
        $formData['zoznamKategorii'] = Kategoria::getAll();


        if(!$this->app->getAuth()->isLogged())
            return $this->redirect('?');


        if (!isset($formData['titulok'])) return $this->html();


        $obrazok = $formData['obrazok'];

        $koncovka = substr($obrazok, -3);

        switch ($koncovka) {
            case 'jpg':
            case 'png':
                break;
            default:
                echo '<p class="danger ">Zlý formát obrázka! Akceptované formáty : jpg a png</p>';
                return $this->html();
                break;

        }

        $inzerat = new Inzerat($formData['titulok'], $formData['text'],(float)$cena, $formData['obrazok'],$formData['idOwner'],$formData['idKategoria']);
        $inzerat->save();


        return $this->redirect('?');

    }

    public function edit()
    {
        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getId() != Inzerat::getOne($_GET['id'])->getIdOwner())
            return $this->redirect('?');

        if ($this->app->getAuth()->getLoggedUser()->getId() === Inzerat::getOne($_GET['id'])->getIdOwner() || $this->app->getAuth()->getLoggedUser()->getType() === 'admin')  {

            $formData = $this->app->getRequest()->getPost();
            if (isset($formData['id'])) {


                $inzerat = Inzerat::getOne($formData['id']);
                $inzerat->setTitulok($formData['titulok']);
                $inzerat->setText($formData['text']);
                $inzerat->setCena((float)$formData['cena']);
                $inzerat->setObrazok($formData['obrazok']);
                $inzerat->setIdKategoria($formData['idKategoria']);
                $inzerat->save();

                return $this->redirect("?c=Inzerat&a=Detail&id=". $inzerat->getId());


            }



        }

        return $this->html(Inzerat::getOne($_GET['id']));

    }

    public function delete()
    {
        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getId() != Inzerat::getOne($_GET['id'])->getIdOwner())
            return $this->redirect('?');


        if ($this->app->getAuth()->getLoggedUser()->getId() === Inzerat::getOne($_GET['id'])->getIdOwner() || $this->app->getAuth()->getLoggedUser()->getType() === 'admin') {

            if (isset($_GET['id'])) {
                $inzerat = Inzerat::getOne($_GET['id']);

                $komentare = Komentar::getAll("idInzerat =" . $inzerat->getId());
                foreach ($komentare as $komentar) {
                    $komentar->delete();
                }


                $inzerat->delete();


            }
            return $this->redirect('?');
        }
    }


    public function detail()
    {
        if (!isset($_GET['id']))
            return $this->redirect('?');


            return $this->html(Inzerat::getOne($_GET['id']));



    }

    public function filter() {

        return $this->html(Inzerat::getAll(" idKategoria IN (".$_GET['id'].")",[],"id DESC"));
    }



    public function inzeraty()
    {

        $inzPom = Inzerat::getAll("",[],"id DESC");


        foreach ($inzPom as $inzerat) {
            $inzerat->setOwner($inzerat->getOwner());
            $inzerat->setKategoria($inzerat->getKategoria());
        }



       return $this->json($inzPom);
    }



    public function komentare()
    {
        $komentare = Komentar::getAll("",[],"id DESC");

        foreach ($komentare as $komentar) {


            $komentar->setAutor($komentar->getAutor());
            $komentar->setInzerat($komentar->getInzerat());


        }

        return $this->json($komentare);

    }

    public function addKomentar()
    {

        if(!$this->app->getAuth()->isLogged())
            return $this->redirect('?');

        $formData = $this->app->getRequest()->getPost();
        if (!isset($formData['text'])) return $this->html();


        $komentar = new Komentar($formData['text'],$formData['idAutor'], $formData['idInzerat']);
        $komentar->save();


        return $this->redirect("?c=Inzerat&a=Detail&id=". $_GET['id']);

    }




}