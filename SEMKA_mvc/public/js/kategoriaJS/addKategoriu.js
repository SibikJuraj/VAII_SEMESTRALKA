class KategoriaAdd {

    constructor() {

        document.getElementById("addKategoriu").onclick = () => this.kategoriaAdd();


    }

    kategoriaAdd() {
       try {
           var list = document.getElementById('newK');
           if (list.style.display === "none") {
               list.style.display = "block";
           } else {
               list.style.display = "none";
           }

           var html = "";

           html = `    <form class="form-row userType" method="post" action="?c=Kategorie&a=Add">
                            
                                <div class="form-group col-12 col-md-5">
                                    <label for="nazov">Názov kategórie:</label>
                                    <br/>
                                    <input class="form-control nastred" id="nazov" type="text" name="nazov" value="" required>
                                    <br/>
                                </div>
                                <div class="form-group col-12 col-md-5">
                                    <label for="obrazok">URL obrázka:</label>
                                    <br/>
                                    <input class="form-control nastred" id="obrazok" type="url" name="obrazok" value="" required>
                                    <br/>
                        
                                </div>
                    
                            
                            <input type="submit" name="submit" value="Pridať kategóriu" class="btn tlacidlo nastred col-12 col-md-2"> 
                           
                    
                        </form>`

           list.innerHTML = html;


        } catch (e ) {
            console.error("Chyba " + e);
        }

    }

}

document.addEventListener('DOMContentLoaded', () => {
    var kategoriaAdd = new KategoriaAdd();

});
