<?php


namespace App\Controllers;


use App\Core\AControllerBase;

class KategorieController extends AControllerBase
{

    public function index()
    {
        return $this->html();
    }

}