<?php /** @var Array $data */ ?>
<h1 >Aktuálny inzerát</h1>
<hr/>

<div class="container-fluid inzerat-detail">

    <h3><?= $data->getTitulok() ?></h3>
    <hr/>

    <div class="row">
        <div class="col-lg-9 col-md-8 col-sm-8 col-7">
            <p><?= $data->getText() ?></p>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-4 col-5">
            <img src="<?= $data->getObrazok() ?>" alt="" class="img-fluid">
        </div>
    </div>

    <hr/>

   <div class="icena">
        <p>Cena : <?= $data->getCena() ?> €</p>
   </div>

</div>




<div class="container-fluid">
    <div class="row">

        <a href="?c=Inzerat&a=Edit&id=<?= $data->getId() ?>" class="btn tlacidlo edit col-6">Editovať inzerát</a>
        <a href="?c=Inzerat&a=Delete&id=<?= $data->getId() ?>" class="btn tlacidlo danger col-6">Vymazať inzerát</a>



    </div>

</div>
