


class Chat {

    constructor() {

        this.reloadData();
        setInterval(() => this.reloadData(), 2000);

    }


    async getUsers() {
        try {
            let response = await fetch('?c=Forum&a=Users');
            let data = await response.json();

            var list = document.getElementById('user-list');
            list.textContent = '';
            data.forEach((user)  => {
                var link = document.createElement('a');
                link.href = "#";
                link.innerText = user.login;
                link.onclick = () => document.getElementById('message-to').value = link.innerText;
                list.append(link);
                list.append(document.createElement('br'));
            });


        } catch (e) {
            console.error("Chyba : " + e.message);
        }
    }

    async getMessages() {
        try {
            let response = await fetch('?c=Forum&a=Messages');
            let data = await response.json();
            var messages = document.getElementById('messages');

            var html = "";

            data.forEach((msg)  => {
                var add = "";
                if (msg.recipient != null) {
                    add = " > " + msg.recipient.login;
                }
                var className = "";
                if (msg.recipient != null && (msg.recipient.login === document.getElementById('me').value)) {
                    className = 'to-me';
                }

                if (msg.sender.login === document.getElementById('me').value) {
                    className = 'from-me';
                }

                html += `<div class="${className}"> 
                    <div class="sender">${msg.sender.login} ${add} :</div>
                    <div class="message">${msg.message}</div>
                </div>`;


                messages.innerHTML = html;
            });



        } catch (e) {
            console.error("Chyba : " + e.message);
        }


    }


    reloadData() {
        this.getUsers();
        this.getMessages();
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var chat = new Chat();

});