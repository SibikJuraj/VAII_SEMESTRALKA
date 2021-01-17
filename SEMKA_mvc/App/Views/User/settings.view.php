<?php /** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */

use App\Models\User;

?>
<div class="nastred">


    <h1 >Prihlásený ako : <?= $data->getLogin() ?></h1>
    <hr/>

    <div>



        <?php if ($auth->isLogged()  && ($auth->getLoggedUser()->getId() == $data->getId())){ ?>
            <a href="?c=User&a=Edit&id=<?= $data->getId() ?>" class="btn tlacidlo edit col-6">Editovať používateľa</a>
            <a href="?c=User&a=Delete&id=<?= $data->getId() ?>" class="btn tlacidlo col-6">Vymazať inzerát</a>

        <?php } ?>

    </div>
</div>

