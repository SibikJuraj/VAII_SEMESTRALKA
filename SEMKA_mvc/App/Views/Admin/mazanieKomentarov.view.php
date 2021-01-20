<?php /** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */
?>
<script src="public/js/deleteJS.js"> </script>

<h1 >Mazanie Komentárov</h1>
<hr/>



    <?php foreach ($data as $komentar) { ?>



    <a href="?c=Admin&a=DeleteKomentar&id=<?= $komentar->getId() ?>" onclick="return onDelete()" class="container-fluid danger btn tlacidlo">

        <div>
            <div>
                <h1>Komentár pridal : <strong> <?= $komentar->getAutor()->getLogin() ?> </strong> </h1>
                <p >Inzerát : <strong> <?= $komentar->getInzerat()->getTitulok() ?> </strong>


            </div>

            <br>
            <div style="word-wrap: break-word;">
                <p>
                    <?= $komentar->getText()?>
                </p>
            </div>

        </div>

    </a>



    <?php } ?>











