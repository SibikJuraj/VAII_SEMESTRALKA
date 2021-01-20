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
        echo "<script>selectedJS('inzerat')</script>";
        return $this->html(Inzerat::getAll("",[],"id DESC"));
    }


    //region CRUD operácie s inzerátmi

    public function add()
    {
        if(!$this->app->getAuth()->isLogged())
            return $this->redirect('?');

        $formData = $this->app->getRequest()->getPost();
        $formData['zoznamKategorii'] = Kategoria::getAll();





        if (!isset($formData['titulok'])) return $this->html();


        $obrazok = $formData['obrazok'];

        $koncovka = substr($obrazok, -4);



        switch ($koncovka) {
            case '.jpg':
            case '.png':
                break;
            default:
                echo '<p class="text-center text-danger mb-3 ">Zlý formát obrázka! Akceptované formáty : jpg a png</p>';
                return $this->html();
                break;

        }

        $inzerat = new Inzerat($formData['titulok'], $formData['text'],(float) $formData['cena'], $formData['obrazok'],$formData['idOwner'],$formData['idKategoria']);
        $inzerat->save();


        return $this->redirect('?');

    }

    public function edit()
    {
        if(!$this->app->getAuth()->isLogged() || $this->app->getAuth()->getLoggedUser()->getId() != Inzerat::getOne($_GET['id'])->getIdOwner())
            return $this->redirect('?');

        if ($this->app->getAuth()->getLoggedUser()->getId() == Inzerat::getOne($_GET['id'])->getIdOwner() || $this->app->getAuth()->getLoggedUser()->getType() == 'admin')  {

            $formData = $this->app->getRequest()->getPost();
            if (isset($formData['id'])) {


                $inzerat = Inzerat::getOne($formData['id']);
                $inzerat->setTitulok($formData['titulok']);
                $inzerat->setText($formData['text']);
                $inzerat->setCena((float)$formData['cena']);

                $obrazok = $formData['obrazok'];

                $koncovka = substr($obrazok, -4);

                switch ($koncovka) {
                    case '.jpg':
                    case '.png':
                        break;
                    default:
                        echo '<p class="text-center text-danger mb-3 ">Zlý formát obrázka! Akceptované formáty : jpg a png</p>';
                        return $this->html(Inzerat::getOne($_GET['id']));
                        break;

                }


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
        if(!$this->app->getAuth()->isLogged())
            return $this->redirect('?');


        if ($this->app->getAuth()->getLoggedUser()->getId() == Inzerat::getOne($_GET['id'])->getIdOwner() || $this->app->getAuth()->getLoggedUser()->getType() == 'admin') {

            if (isset($_GET['id'])) {
                $inzerat = Inzerat::getOne($_GET['id']);

                $komentare = Komentar::getAll("idInzerat =" . $inzerat->getId());
                foreach ($komentare as $komentar) {
                    $komentar->delete();
                }


                $inzerat->delete();


            }

        }
        return $this->redirect('?');
    }

    //endregion



    public function detail()
    {
        if (!isset($_GET['id']))
            return $this->redirect('?');


        return $this->html(Inzerat::getOne($_GET['id']));

    }

    //region Filtrovanie inzerátov

    public function filter() {
        $kategoria = (string)Kategoria::getOne($_GET['id'])->getNazov();

        return $this->html(Inzerat::getAll(" idKategoria IN (".$_GET['id'].")",[],"id DESC"));
    }

    public function moje() {
        if(!$this->app->getAuth()->isLogged())
            return $this->redirect('?');

        return $this->html(Inzerat::getAll(" idOwner IN (".$this->app->getAuth()->getLoggedUser()->getId().")",[],"id DESC"));

    }

    //endregion


    public function inzeraty()
    {

        $inzPom = Inzerat::getAll("",[],"id DESC");


        foreach ($inzPom as $inzerat) {
            $inzerat->setOwner($inzerat->getOwner());
            $inzerat->setKategoria($inzerat->getKategoria());
        }



       return $this->json($inzPom);
    }


    //region Komentáre

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
        if (!isset($formData['text']))
            return $this->html();


        $komentar = new Komentar($formData['text'],$formData['idAutor'], $formData['idInzerat']);
        $komentar->save();


        return $this->redirect("?c=Inzerat&a=Detail&id=". $_GET['id']);

    }

    //endregion


}