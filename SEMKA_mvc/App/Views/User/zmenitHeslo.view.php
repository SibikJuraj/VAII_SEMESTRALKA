<?php /** @var Array $data */ ?>

<div class="container-fluid ">
    <form method="post">

        <input type="hidden" id="id" name="id" value="<?= $data == null ? "" : $data->getId() ?>">

        <div class="form-group col-md-6">
            <label for="cena">Heslo:</label>
            <br/>
            <input class="form-control" id="password" type="password" name="password" value="<?= $data == null ? "" : $data->getPassword() ?>" required>
            <br/>
        </div>
</div>



<br/>

<input type="submit" name="submit" value="<?= $data == null ? "" : "Zmeniť heslo" ?>" class="btn tlacidlo">

</form>



</div>
