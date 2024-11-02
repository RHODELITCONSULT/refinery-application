<div class="toast-container position-fixed top-0 start-50 p-3">
    <div id="solid-warningToast" class="toast colored-toast bg-warning text-fixed-white" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-warning text-fixed-white">
            <strong class="me-auto">Warning</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{Session::get('warning') ?? 'Sorry, Internal Server Error'}}
        </div>
    </div>
    <div id="solid-infoToast" class="toast colored-toast bg-info text-fixed-white" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header bg-info text-fixed-white">
            <strong class="me-auto">Info</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{Session::get('info') ?? 'Sorry, Internal Server Error'}}
        </div>
    </div>
    <div id="solid-successToast" class="toast colored-toast bg-success text-fixed-white" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-fixed-white">
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{Session::get('success') ?? 'Sorry, Internal Server Error'}}
        </div>
    </div>
    <div id="solid-dangerToast" class="toast colored-toast bg-danger text-fixed-white" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-danger text-fixed-white">
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{Session::get('error') ?? 'Sorry, Internal Server Error'}}
        </div>
    </div>
</div>
