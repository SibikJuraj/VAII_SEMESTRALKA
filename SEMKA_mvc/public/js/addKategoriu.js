class KategoriaAdd {

    constructor() {

        this.kategoriaAdd();


    }

    kategoriaAdd() {
       try {

           var list = document.onClick("addKategoriu");
           var html = "";
           html += `    <form method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nazov">Názov kategórie:</label>
                                    <br/>
                                    <input class="form-control nastred" id="nazov" type="text" name="nazov" value="" required>
                                    <br/>
                                </div>
                            </div>
                            <br/>
                    
                            <input type="submit" name="submit" value="Pridať kategóriu" class="btn tlacidlo">
                    
                        </form>`

           list.innerHTML = html;

        } catch (e ) {
            console.error("Chyba " + e);
        }

    }

}

document.addEventListener('click', () => {
    var kategoriaAdd = new KategoriaAdd();

});
