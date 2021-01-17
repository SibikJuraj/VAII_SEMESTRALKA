<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Kategoria;

class KategorieController extends AControllerBase
{


    public function index()
    {
        return $this->html(Kategoria::getAll());
    }

    public function kategorie()
    {
        return $this->json(Kategoria::getAll());
    }


    public function add() {


    }

}