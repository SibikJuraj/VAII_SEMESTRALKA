<?php /** @var Array $data */ ?>

<h1 >Kategórie</h1>
<hr/>

<div class="container">
    <div class="row">
    <?php foreach ($data as $kategoria) { ?>

        <div class="kategoria tlacidlo col-lg-2 col-md-3 col-sm-4 col-6 btn">
            <?= $kategoria->getNazov() ?> <br/> <img src="<?= $kategoria->getObrazok() ?>" alt=""/>
        </div>


    <?php } ?>
    </div>
</div>







