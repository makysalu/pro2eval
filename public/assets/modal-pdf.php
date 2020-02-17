<section id="modal-pdf" class="modal-pdf fixed-top vw-100 vh-100 d-none justify-content-center align-items-center">
    <div class="modal d-block" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Descargando:</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body pb-1 pt-5">
            <span>
                <svg version="1.1" class="skate" width="50px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><circle cx="364.596" cy="46.545" r="46.545"/></g></g><g><g>
                    <path d="M219.266,79.166c-11.167-3.697-23.455-0.803-31.757,7.5l-62.061,62.061c-12.122,12.121-12.122,31.757,0,43.879	c12.121,12.121,31.757,12.122,43.879,0.001l48.5-48.5c2.519,0.839,5.29-0.062,6.833-2.222l27.364-38.309 c2.746-3.849,5.916-7.29,9.383-10.362L219.266,79.166z"/></g></g><g><g>
                    <path d="M431.206,392.425l-26.485,26.484h-55.636V310.303c0-10.379-5.182-20.061-13.818-25.818l-66.424-44.287l37.651-52.712 l36.167,36.151c9.409,9.409,23.849,11.787,35.818,5.818l62.061-31.03c15.333-7.667,21.545-26.303,13.879-41.636 c-7.651-15.303-26.242-21.561-41.636-13.879l-42.061,21.03c-58.304-58.304-46.909-48.012-56.795-52.535 c-14.067-6.437-28.905-0.634-36.645,10.202l-77.576,108.606c-4.879,6.833-6.773,15.364-5.258,23.621 c1.515,8.273,6.303,15.561,13.303,20.228l79.377,52.849v92h-95.861l55.636-55.636c5.347-5.347,8.225-12.513,8.708-20.014	l-61.678-41.117v26.343l-68.485,68.485c-6.06,6.06-9.091,14-9.091,21.939h-9.091l-26.484-26.484c-6.06-6.06-15.879-6.06-21.939,0 c-6.06,6.06-6.06,15.879,0,21.939l31.03,31.03c2.909,2.909,6.848,4.545,10.969,4.545h18.373 c-1.739,4.877-2.858,10.05-2.858,15.515c0,25.666,20.879,46.545,46.545,46.545s46.545-20.983,46.545-46.649 c0-5.465-1.119-10.638-2.858-15.515h98.807c-1.739,4.877-2.858,10.153-2.858,15.619c0,25.666,20.879,46.545,46.545,46.545	s46.545-20.879,46.545-46.545c0-5.466-1.119-10.638-2.858-15.515h18.373c4.121,0,8.061-1.636,10.969-4.546l31.03-31.03 c6.061-6.06,6.061-15.878,0.001-21.938S437.267,386.365,431.206,392.425z M162.903,480.97c-8.56,0-15.515-6.955-15.515-15.515 c0-8.56,6.955-15.515,15.515-15.515s15.515,6.955,15.515,15.515C178.418,474.015,171.464,480.97,162.903,480.97z M349.085,480.97 c-8.56,0-15.515-6.955-15.515-15.515c0-8.56,6.955-15.515,15.515-15.515s15.515,6.955,15.515,15.515 C364.6,474.015,357.646,480.97,349.085,480.97z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g>
                </svg>
            </span>
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
        $('#modal-pdf').removeClass("d-flex").addClass("d-none");
    });

</script>