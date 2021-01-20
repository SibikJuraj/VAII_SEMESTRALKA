<?php
declare(strict_types=1);

namespace App\Controllers;

use App\App;
use App\Core\AControllerBase;
use App\Models\Kategoria;

class KategorieController extends AControllerBase
{



    public function index()
    {
        echo "<script>selectedJS('kategorie')</script>";
        return $this->html(Kategoria::getAll());
    }



    public function add() {

        if (!isset($_POST['nazov'])) return $this->html();

        $formData = $this->app->getRequest()->getPost();



        $chybneUdaje = 0;

        $obrazok = $formData['obrazok'];
        $koncovka = substr($obrazok, -4);



        $kategorie = Kategoria::getAll();
        foreach ($kategorie as $kategoria) {
            if ($kategoria->getNazov() == (string)$formData['nazov']) {
                echo '<p class="danger ">Kategória s takýmto názvom už existuje!</p>';
                $chybneUdaje++;
            }
        }

        switch ($koncovka) {
            case '.jpg':
            case '.png':
                break;
            default:
                echo '<p class="danger ">Zlý formát obrázka! Akceptované formáty : jpg a png</p>';
                $chybneUdaje++;
                break;

        }

        if ($chybneUdaje > 0) {

            return $this->redirect('?c=Kategorie&a=Index');
        }


        $kategoria = new Kategoria($formData['nazov'], $formData['obrazok']);
        $kategoria->save();


        return $this->redirect('?c=Kategorie&a=Index');




    }

}