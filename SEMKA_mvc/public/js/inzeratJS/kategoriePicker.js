class KategoriePicker {

    constructor() {

        this.kategoriePicker();


    }

    async kategoriePicker() {
       try {
            let response = await fetch('?c=Kategorie&a=Kategorie');
            let data = await response.json();
            var list = document.getElementById("idKategoria");

            var html = "";


            data.forEach((kategoria)  => {
                html += `<option value="${kategoria.id}">${kategoria.nazov}</option>`

                list.innerHTML = html;
            });


        } catch (e ) {
            console.error("Chyba " + e);
        }

    }

}

document.addEventListener('DOMContentLoaded', () => {
    var kategoriePicker = new KategoriePicker();

});
