<?php
/** @var string $contentHTML */
/** @var \App\Core\AAuthenticator $auth */
?>
<html>
<head>
    <title>INZERATIK</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="public/js/skript.js"> </script>
    <script src="public/js/selected.js"> </script>
    <script src="public/js/loadInzerat.js"> </script>

    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>

<header>
    <!--
    <h5 class="font-weight-bolder nastred"><?= \App\Config\Configuration::APP_NAME ?></h5>
    -->
    <nav class="navbar navbar-expand-lg navbar-light ">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="menu collapse navbar-collapse " id="navbarSupportedContent">

            <div class="menu ">
                <ul class="navbar-nav mr-auto">

                    <li id="inzerat"  class="nav-item ">
                        <a href="?c=Inzerat" class="btn btn-block tlacidlo ">Nové inzeráty</a>
                    </li>
                    <li id="kategorie" class="nav-item">
                        <a href="?c=Kategorie" class="btn btn-block tlacidlo">Kategórie</a>
                    </li>
                    <li id="forum" class="nav-item">
                        <a href="?c=Forum" class="btn btn-block tlacidlo">Fórum</a>
                    </li>


                </ul>
            </div>


        </div>

        <div class="float-right ">

                <?php if ($auth->isLogged()) { ?> Prihlásený ako : <b><?=$auth->getLoggedUser()->getLogin() ?></b>
                    <br>
                    <a href="?c=Login&a=Edit&id=<?=$auth->getLoggedUser()->getId() ?>" class="float-right"><strong>Upraviť profil</strong></a>
                    <br>
                    <a href="?c=Login&a=Logout" class="float-right"><strong>Odhlásiť sa</strong></a>

                <?php } else { ?>
                    <a href="?c=Login&a=Login" ><strong>Prihlásiť sa</strong></a>
                <?php } ?>

        </div>

    </nav>




</header>


<div class="web-content">
    <?= $contentHTML ?>
</div>
</body>
</html>
