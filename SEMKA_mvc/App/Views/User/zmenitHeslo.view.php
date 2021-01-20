<?php /** @var Array $data */ ?>


<h1 >Zmeniť heslo</h1>
<hr/>


<div class="container-fluid nastred">
    <form method="post">

        <input type="hidden" id="id" name="id" value="<?= $data == null ? "" : $data->getId() ?>">

        <div class="form-group offset-0 offset-md-3 col-12 col-md-6">

            <label for="password">Heslo:</label>
            <br/>
            <input class="form-control nastred" id="password" type="password" name="password" value="<?= $data == null ? "" : $data->getPassword() ?>" required>
            <br/>

        </div>





        <br/>
        <input type="submit" name="submit" value="<?= $data == null ? "" : "Zmeniť heslo" ?>" class="btn tlacidlo">

    </form>

</div>


