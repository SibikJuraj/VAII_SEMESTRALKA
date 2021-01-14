<?php
/** @var string $contentHTML */
/** @var Array $data */

use App\App;
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
    <script type="module" src="../JavaScript/selected.js"></script>

    <link rel="stylesheet" href="public/style.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light ">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="menu collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li id="inzerat" class="nav-item active">
                    <a href="?c=Inzerat" class="btn btn-block tlacidlo" ">Nové inzeráty</a>
                </li>
                <li id="kategorie" class="nav-item">
                    <a href="?c=Kategorie" class="btn btn-block tlacidlo">Kategórie</a>
                </li>
                <li id="forum" class="nav-item">
                    <a href="?c=Forum" class="btn btn-block tlacidlo">Fórum</a>
                </li>



            </ul>

        </div>
        <a href="?c=Login" ><strong>Prihlásiť sa</strong></a>
    </nav>




</header>

<div class="web-content">
    <?= $contentHTML ?>
</div>
</body>
</html>
