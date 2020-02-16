<section id="modal-login" class="modal-pdf fixed-top vw-100 vh-100 d-flex justify-content-center align-items-center">
    <div class="modal d-block" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal usuario:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body pb-1 pt-5">
            El DNI o la Contraseña no coinciden
        </div>
        <div class="modal-footer">
            <button id="button-modal-pdf" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>
</section>
<script>
    this.document.getElementById("button-modal-pdf").addEventListener('click',function(){
        $('#modal-login').remove();
    });

</script>
        