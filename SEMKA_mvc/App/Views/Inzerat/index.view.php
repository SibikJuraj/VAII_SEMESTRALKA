<?php /** @var Array $data */ ?>

<h1 >Nové inzeráty</h1>
<hr/>

<div class="nastred">
    <a href="?c=Inzerat&a=Add" class="btn tlacidlo">+ Pridaj inzerát +</a>

</div>

<?php
foreach ($data as $inzerat) { ?>

     <div class="container-fluid">

     <a href="?c=Inzerat&a=Detail&id=<?= $inzerat->getId() ?>" class="btn btn-large btn-block tlacidlo inzerat">
     <h3><?= $inzerat->getTitulok()?></h3>
     <hr/>

     <div class="row">
     <div class="col-lg-9 col-md-8 col-sm-8 col-7">
     <p>
         <?= $inzerat->getText()?>
     </p>
     </div>

     <div class="col-lg-3 col-md-4 col-sm-4 col-5">
        <img src=" <?= $inzerat->getObrazok()?> " alt="" class="img-fluid">
     </div>
     </div>

     <hr/>

     <div class="icena">
     <p> Cena :  <?= $inzerat->getCena()?>  € </p>
    </div>
    </a>
    </div>


<?php } ?>


