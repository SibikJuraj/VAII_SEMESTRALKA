<?php /** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */
?>
<script src="public/js/loadInzerat.js"> </script>

<h1 >Nové inzeráty</h1>

<?php if ($auth->isLogged()) { ?>
    <div class="nastred">
        <a href="?c=Inzerat&a=Add" class="btn tlacidlo">+ Pridaj inzerát +</a>
    </div>
<?php } ?>


<hr/>




<div id="inzerat-list" class="container-fluid">
</div>
