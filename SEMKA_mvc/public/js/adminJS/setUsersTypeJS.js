
class UserJS {

    constructor() {
        this.getUsers();

    }


    async getUsers() {
        try {
            let response = await fetch('?c=Admin&a=setUsersType');
            let data = await response.json();

            var list = document.getElementById('users-list');
            var html = "";

            data.forEach((user)  => {
                html += `<div class="userType" >
                            <div class=" " >
                                
                                    <div class="userType-detail">
                                    
                                    <h3>${user.login} </h3>
                                    <p>
                                        ${user.login === 'admin' ? `` : `ID : ${user.id}`}
                                    </p>
                                    
                                    </div>
         
                               
                            </div>
                            <div class="form-group ">

                                <label for="kategoria">Typ používateľa: </label>
                                 ${user.login === 'admin' ? `<h3>${user.login} </h3>` : `
                                <select onchange="changeType(${user.id})" id="userType${user.id}" class="form-control " name="userType${user.id}" >
                                    <option value="${user.type}" >${user.type}</option>
                                    <option value="${user.type === 'admin' ? 'user' : 'admin'}">${user.type === 'admin' ? 'user' : 'admin'}</option>
            
                                </select> `}
                                
                                <br/>
                            
                            </div>
               
                        </div>`


                list.innerHTML = html;



            });


        } catch (e ) {
            console.error("Chyba " + e);
        }
    }



}


function changeType(id) {

    var e = document.getElementById("userType"+id);
    var userType = e.options[e.selectedIndex].text;


    $.ajax({
        url: "?c=User&a=SetType",
        type: "post",
        data: {'id'  : id,
               'type' : userType
        } ,
        success: function (response) {
            console.log("Success");
            console.log(id);
            console.log(userType);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });


}





document.addEventListener('DOMContentLoaded', () => {
    var userJS = new UserJS();

});