class Selected {

    constructor() {

        this.selected();


    }

    selected() {

        var element = document.getElementById("inzerat");
        element.classList.add('active');
    }

}

document.addEventListener('DOMContentLoaded', () => {
    var selected = new Selected();

});
