<h1 >Registrácia</h1>
<hr/>

<div class="container-fluid">
    <form action="?c=Login&a=Register" method="post" class="nastred">
        <label for="login">Používateľské meno:</label>
        <br/>
        <input class="form-control nastred" name="login" type="text" id="login" required>
        <br/>

        <label for="password">Heslo:</label>
        <br/>
        <input class="form-control nastred" id="password" type="password" name="password" required>
        <br/>

        <label for="password_confirmation">Potvrdenie hesla:</label>
        <br/>
        <input class="form-control nastred" id="password_confirmation" type="password" name="password_confirmation" required>
        <br/>

        <br/>
        <input type="submit" name="submit" value="Registrovať sa" class="btn tlacidlo">
    </form>

</div>
