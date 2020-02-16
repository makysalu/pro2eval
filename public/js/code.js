window.onload = function () {
    this.document.getElementById("button-modal-login").addEventListener('click', function () {
        $('#modal-login').removeClass("d-flex").addClass("d-none");
    });

    function modalLogin() {
        $('#modal-login').removeClass("d-none").addClass("d-flex");
    }
}

