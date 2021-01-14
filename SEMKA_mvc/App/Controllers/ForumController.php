<?php


namespace App\Controllers;


use App\Core\AControllerBase;

class ForumController extends AControllerBase
{
    public function __construct()
    {
        ?>
        <script>var element = document.getElementById("forum");
        element.classList.add("active"); </script>
        <?php
    }



    public function index()
    {
        return $this->html();
    }

}