<?php /** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */
?>
<script src="public/js/deleteJS.js"> </script>

<h1 >Mazanie Kategórií</h1>
<hr/>


<div class="container">
    <div class="row">
        <?php foreach ($data as $kategoria) { ?>
            <a href="?c=Admin&a=DeleteKategoria&id=<?= $kategoria->getId() ?>" onclick="return onDelete()" class="kategoria tlacidlo danger col-lg-2 col-md-3 col-sm-4 col-6 btn">
                <?= $kategoria->getNazov() ?>
                <img src="<?= $kategoria->getObrazok() ?>" alt=""/></a>

        <?php } ?>
    </div>
</div>







