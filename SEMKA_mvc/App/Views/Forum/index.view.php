<?php /** @var Array $data */ ?>

<h1 >Fórum</h1>
<hr/>

<div class="nastred">
    <a href="?c=Inzerat&a=Add" class="forumnova btn tlacidlo btn">Začať novú diskusiu </a>

</div>

<div class=" container">

    <div">
        <a href="?c=Forum&a=Detail&id=<?php $data->getId() ?>" class="forum btn tlacidlo col-lg-12 col-md-12 col-sm-12 col-12 btn">Návrhy na zlepšenie </a>
        <a href="?c=Forum&a=Detail&id=<?php $data->getId() ?>" class="forum btn tlacidlo col-lg-12 col-md-12 col-sm-12 col-12 btn">Problémy </a>

    </div>

</div>
