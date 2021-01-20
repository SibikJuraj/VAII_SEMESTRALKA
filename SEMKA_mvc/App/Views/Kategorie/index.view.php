<?php /** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */
?>
<script src="public/js/kategoriaJS/addKategoriu.js"> </script>


<h1>Kategórie</h1>

<?php if ($auth->isLogged() && $auth->getLoggedUser()->getLogin() === 'admin') { ?>
    <div class="nastred">
        <a id="addKategoriu" class="btn tlacidlo" >+ Pridaj kategóriu +</a>
        <div id="newK" class="row" style="display: none">


        </div>
    </div>



<?php } ?>
<hr/>





<div class="container" >
    <div class="row">
    <?php foreach ($data as $kategoria) { ?>
        <a href="?c=Inzerat&a=Filter&id=<?= $kategoria->getId() ?>" class="kategoria tlacidlo col-lg-2 col-md-3 col-sm-4 col-6 btn">
            <?= $kategoria->getNazov() ?>
            <img src="<?= $kategoria->getObrazok() ?>" alt=""/></a>

    <?php } ?>
    </div>
</div>







