<?php /** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */

use App\Models\User;

?>

<script src="public/js/deleteJS.js"> </script>
<div class="nastred">


    <h1 >Prihlásený ako : <?= $data->getLogin() ?></h1>
    <hr/>

    <div>



        <?php if ($auth->isLogged()  && ($auth->getLoggedUser()->getId() == $data->getId())){ ?>
            <a href="?c=User&a=ChangePassword&id=<?= $data->getId() ?>" class="btn tlacidlo edit col-6">Zmeniť heslo</a>
            <a href="?c=User&a=Delete&id=<?= $data->getId() ?>" onclick="return onDelete()" class="btn tlacidlo danger col-6">Vymazať účet</a>
        <?php } ?>

    </div>
</div>

