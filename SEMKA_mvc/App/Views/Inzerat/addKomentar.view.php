<?php /** @var Array $data */
/** @var \App\Core\AAuthenticator $auth */
?>

<div class="container-fluid ">
    <form method="post">

        <input type="hidden" id="idInzerat" name="idInzerat" value="<?= $_GET['id'] ?>">
        <input type="hidden" id="idAutor" name="idAutor" value="<?=$auth->getLoggedUser()->getId() ?>">

        <div class="form-group">
            <label for="text">Text:</label>
            <br/>
            <textarea class="form-control" id="text"  name="text" required></textarea>
            <br/>
        </div>


        <br/>

        <input type="submit" value="Pridať komentár" class="btn tlacidlo">

    </form>



</div>
