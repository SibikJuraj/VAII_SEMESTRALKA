<?php
/** @var Array $data */
?>

<h1 >Prihlásiť sa</h1>
<hr/>

<div class="container-fluid">
    <form action="?c=Login&a=Login" method="post" class="nastred">
        <div class="text-center text-danger mb-3">
            <?= @$data['message'] ?>
        </div>

        <label for="login">Používateľské meno:</label>
        <br/>
        <input class="form-control nastred" name="login" type="text" id="login" required>
        <br/>

        <label for="password">Heslo:</label>
        <br/>
        <input class="form-control nastred" name="password" type="password" id="password" required>
        <br/>

        <br/>
        <input type="submit" name="submit" value="Prihlásiť sa" class="btn tlacidlo">
    </form>


</div>

<br/>

<div class="container-fluid">
    <p class="nastred">Ešte nemáš účet?
        <a href="?c=Login&a=Register"><strong>Zaregistruj sa!</strong></a>
    </p>
</div>
