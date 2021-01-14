<?php


namespace App\Controllers;


use App\Core\AControllerBase;

class KategorieController extends AControllerBase
{

    public function __construct()
    {
        ?>
        <script>var element = document.getElementById("kategorie");
            element.classList.add("active"); </script>
        <?php

    }


    public function index()
    {
        return $this->html();
    }

}