<?php /** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */

use App\Models\User;

?>

<script src="public/js/inzeratJS/loadKomentare.js"> </script>
<script src="public/js/deleteJS.js"> </script>
<h1 >Aktuálny inzerát</h1>
<hr/>


<div class="container-fluid">
    <div class="row">
        <?php if ($auth->isLogged()  && ($auth->getLoggedUser()->getId() == $data->getIdOwner() || $auth->getLoggedUser()->getType() == 'admin') ) { ?>
            <a href="?c=Inzerat&a=Edit&id=<?= $data->getId() ?>" class="btn tlacidlo edit col-6">Editovať inzerát</a>
            <a href="?c=Inzerat&a=Delete&id=<?= $data->getId() ?>" onclick="return onDelete()"  class="btn tlacidlo danger col-6">Vymazať inzerát</a>

        <?php } ?>


    </div>

</div>



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
    <div class="row">
        <div class="col-6">
            <p>Pridal : <strong> <?= $data->getOwner()->getLogin() ?> </strong> </p>
        </div>

        <div class="col-6">
            <p class="float-right">Kategória : <strong> <?= $data->getKategoria()->getNazov() ?> </strong> </p>
        </div>


    </div>

    <hr/>



   <div class="icena">
        <p>Cena : <?= $data->getCena() ?> €</p>

   </div>

</div>

<hr/>

<div >
    <?php if ($auth->isLogged()){ ?>
        <a href="?c=Inzerat&a=AddKomentar&id=<?= $data->getId() ?>" class="btn tlacidlo edit ">Pridaj Komentár</a>
    <?php }?>


</div>


<div id="komentar-list" class="container-fluid ">

</div>





