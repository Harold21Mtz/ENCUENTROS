<main id="main" class="main">
    @if(session('status'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="status-toast" class="toast align-items-center text-white bg-success" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('status') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <script>
            var statusToast = new bootstrap.Toast(document.getElementById('status-toast'));

            // Mostrar la alerta
            statusToast.show();

            setTimeout(function() {
                statusToast.hide();
            }, 8000);
        </script>
    @endif

    @if(session('error'))
        <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
            <div id="error-toast" class="toast align-items-center text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>

        <script>
            var errorToast = new bootstrap.Toast(document.getElementById('error-toast'));

            // Mostrar la alerta
            errorToast.show();

            setTimeout(function() {
                errorToast.hide();
            }, 8000);
        </script>
    @endif
</main>


<!-- Bootstrap JS y Popper.js (requerido para los Toasts) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
