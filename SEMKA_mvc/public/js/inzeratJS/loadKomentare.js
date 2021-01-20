


class KomentarJS {

    constructor() {
        this.getKomentare();
        setInterval(() => this.getKomentare(), 2000);
    }


    async getKomentare() {
        try {
            let response = await fetch('?c=Inzerat&a=Komentare');
            let data = await response.json();
            var list = document.getElementById('komentar-list');


            var html = "";
            data.forEach((komentar)  => {

                if (komentar.idInzerat === $_GET('id')) {
                    html += `<div class="row komentar" >
                                <div class="col-6">
                                    <p>Pridal : <strong> ${komentar.autor.login} </strong> </p>
                                </div>
                                    
                                <div class="col-12" style="word-wrap: break-word">
                                    <p>
                                       
                                       ${komentar.text} 
                                    </p>
                                </div> 
                           
                              </div>`
                    list.innerHTML = html;
                }


            });


        } catch (e) {
            console.error("Chyba " + e);
        }
    }



}
function $_GET(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if ( param ) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}

document.addEventListener('DOMContentLoaded', () => {
    var komentar = new KomentarJS();

});