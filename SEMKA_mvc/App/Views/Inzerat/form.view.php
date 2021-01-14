<?php /** @var Array $data */ ?>

<div class="container-fluid ">
    <form method="post">

        <input type="hidden" id="id" name="id" value="<?= $data == null ? "" : $data->getId() ?>">

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="titulok">Titulok:</label>
                <br/>
                <input class="form-control" id="titulok" type="text" name="titulok" value="<?= $data == null ? "" : $data->getTitulok() ?>" maxlength="255" required>
                <br/>
            </div>
            <div class="form-group col-md-6">
                <label for="cena">Cena:</label>
                <br/>
                <input class="form-control" id="cena" type="number" step="any" name="cena" value="<?= $data == null ? "" : $data->getCena() ?>" min ="0" max="1000000" required>
                <br/>
            </div>
        </div>


        <div class="form-group">
            <label for="text">Text:</label>
            <br/>
            <textarea class="form-control" rows="5" id="text" type="text" name="text" required><?= $data == null ? "" : $data->getText() ?></textarea>
            <br/>
        </div>



        <div class="form-group">
            <label for="obrazok">URL obrázka:</label>
            <br/>
            <input class="form-control " id="obrazok" type="url" name="obrazok" value="<?= $data == null ? "" : $data->getObrazok() ?>" required>
            <br/>

        </div>


        <br/>

        <input type="submit" value="<?= $data == null ? "Pridať inzerát" : "Upraviť inzerát" ?>" class="btn tlacidlo">

    </form>



</div>
