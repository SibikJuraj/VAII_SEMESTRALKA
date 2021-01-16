
class InzeratJS {

    constructor() {
        this.getInzeraty();
        setInterval(() => this.getInzeraty(), 2000);
    }


    async getInzeraty() {
        try {
            let response = await fetch('?c=Inzerat&a=Inzeraty');
            let data = await response.json();
            var list = document.getElementById('inzerat-list');

            var html = "";

            data.forEach((inzerat)  => {
                html += `<a href="?c=Inzerat&a=Detail&id= ${inzerat.id} " class="btn btn-large btn-block tlacidlo inzerat">
                    <h3> ${inzerat.titulok}</h3>
                    <hr/>

                    <div class="row">
                        <div class="col-lg-9 col-md-8 col-sm-8 col-7">
                            <p>
                               ${inzerat.text} 
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-4 col-5">
                            <img src="${inzerat.obrazok} " alt="" class="img-fluid">
                        </div>
                    </div>

                    <p >Pridal : ${inzerat.owner.login} </p>
                    <hr/>


                    <div class="icena">
                        <p> Cena : ${inzerat.cena} € </p>
                    </div>
                </a>`

                list.innerHTML = html;
            });


        } catch (e) {
            console.error("Chyba : " + e.message);
        }
    }

}

document.addEventListener('DOMContentLoaded', () => {
    var inzeratJS = new InzeratJS();

});