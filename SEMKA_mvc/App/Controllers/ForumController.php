<?php


namespace App\Controllers;


use App\Core\AControllerBase;

class ForumController extends AControllerBase
{

    public function index()
    {
        return $this->html();
    }

}