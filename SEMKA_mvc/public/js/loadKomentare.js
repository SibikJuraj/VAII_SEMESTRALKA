


class KomentarJS {

    constructor() {
        this.getInzeraty();
        setInterval(() => this.getInzeraty(), 2000);
    }


    async getInzeraty() {
        try {
            let response = await fetch('?c=Inzerat&a=Komentare');
            let data = await response.json();
            var list = document.getElementById('komentar-list');


            var html = "";
            data.forEach((komentar)  => {

                if (komentar.idInzerat === $_GET('id')) {
                    html += `<div class="row inzerat-detail " >
                        <div class="col-6">
                                <p>Pridal : <strong> ${komentar.autor.login} </strong> </p>
                            </div>
                            
                            <div class="col-lg-9 col-md-8 col-sm-8 col-7">
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