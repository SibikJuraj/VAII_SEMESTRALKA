<?php /** @var Array $data */ ?>

<div class="container-fluid ">
    <form method="post">

        <input type="hidden" id="id" name="id" value="<?= $data == null ? "" : $data->getId() ?>">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="titulok">Meno:</label>
                <br/>
                <input class="form-control nastred" id="login" type="text" name="login" value="<?= $data == null ? "" : $data->getLogin() ?>" required>
                <br/>
            </div>
            <div class="form-group col-md-6">
                <label for="cena">Heslo:</label>
                <br/>
                <input class="form-control" id="password" type="password" name="password" value="<?= $data == null ? "" : $data->getPassword() ?>" required>
                <br/>
            </div>
        </div>



        <br/>

        <input type="submit" name="submit" value="<?= $data == null ? "" : "Upraviť profil" ?>" class="btn tlacidlo">

    </form>



</div>
