<script src="public/js/skript.js"> </script>

<div class="container">
    <div class="row border">
        <div class="col-2">
            <h4>Používatelia:</h4>
            <div id="user-list">
            </div>
        </div>
        <div class="col-10">
            <div>
                <h4>Nová správa:</h4>
                <span>Komu: </span><input type="text" id="message-to" disabled>
                <span>Správa: </span><input type="text" id="message-text">
                <button id="send-message">Odoslať</button>
                <span>Ja som: </span><input type="text" id="me"/>
            </div>
            <div class="mt-3">
                <h4>Chat:</h4>
                <div id="messages">
                </div>
            </div>
        </div>
    </div>
</div>
