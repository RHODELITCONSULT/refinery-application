@if (Route::is(['add-product']))
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>{{ $title }}</h4>
                <h6>{{ $li_1 }}</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="{{ $li_2 }}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>{{ $li_3 }}</a>
                </div>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul>

    </div>
@endif
@if (Route::is(['create-waybill']))
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>{{ $title }}</h4>
                <h6>{{ $li_1 }}</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="{{ $li_2 }}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>{{ $li_3 }}</a>
                </div>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul>

    </div>
@endif
@if (Route::is(['show-waybill']))
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>{{ $title }}</h4>
                <h6>{{ $li_1 }}</h6>
            </div>
        </div>
        <ul class="table-top-head">
            <li>
                <div class="page-btn">
                    <a href="{{ $li_2 }}" class="btn btn-secondary"><i data-feather="arrow-left"
                            class="me-2"></i>{{ $li_3 }}</a>
                </div>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul>

    </div>
@endif

@if (
    !Route::is([
        'show-waybill',
        'add-product',
        'create-waybill',
        'chart-apex',
        'chart-c3',
        'chart-flot',
        'chart-js',
        'chart-morris',
        'chart-peity',
        'data-tables',
        'tables-basic',
        'form-basic-inputs',
        'form-checkbox-radios',
        'form-input-groups',
        'form-grid-gutters',
        'form-select',
        'form-mask',
        'form-fileupload',
        'form-horizontal',
        'form-vertical',
        'form-floating-labels',
        'form-validation',
        'form-select2',
        'form-wizard',
        'icon-fontawesome',
        'icon-feather',
        'icon-ionic',
        'icon-material',
        'icon-pe7',
        'icon-simpleline',
        'icon-themify',
        'icon-weather',
        'icon-typicon',
        'icon-flag',
        'ui-clipboard',
        'ui-counter',
        'ui-drag-drop',
        'ui-rating',
        'ui-ribbon',
        'ui-scrollbar',
        'ui-stickynote',
        'ui-text-editor',
        'ui-timeline',
    ]))
    <div class="page-header">
        <div class="add-item d-flex">
            <div class="page-title">
                <h4>{{ $title }}</h4>
                <h6>{{ $li_1 }}</h6>
            </div>
        </div>
        {{-- <ul class="table-top-head">
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pdf"><img
                        src="{{ URL::asset('/build/img/icons/pdf.svg') }}" alt="img"></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Excel"><img
                        src="{{ URL::asset('/build/img/icons/excel.svg') }}" alt="img"></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Print"><i data-feather="printer"
                        class="feather-rotate-ccw"></i></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                        class="feather-rotate-ccw"></i></a>
            </li>
            <li>
                <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                        data-feather="chevron-up" class="feather-chevron-up"></i></a>
            </li>
        </ul> --}}
        @if (Route::is(['warranty']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i> {{ $li_2 }}</a>
            </div>
        @endif
        @if (Route::is(['warehouse']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>{{ $li_2 }}</a>
            </div>
        @endif
        @if (Route::is(['varriant-attributes']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i> {{ $li_2 }}</a>
            </div>
        @endif
        @if (Route::is(['units']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i> {{ $li_2 }}</a>
            </div>
        @endif
        @if (Route::is(['suppliers']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Supplier</a>
            </div>
        @endif
        @if (Route::is(['sub-categories']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-category"><i
                        data-feather="plus-circle" class="me-2"></i> Add Sub Category</a>
            </div>
        @endif
        @if (Route::is(['store-list']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-stores"><i
                        data-feather="plus-circle" class="me-2"></i> Add Store</a>
            </div>
        @endif
        @if (Route::is(['stock-transfer']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New</a>
            </div>
            <div class="page-btn import">
                <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
                        data-feather="download" class="me-2"></i>Import Transfer</a>
            </div>
        @endif
        @if (Route::is(['stock-adjustment']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New</a>
            </div>
        @endif
        @if (Route::is(['states']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New State</a>
            </div>
        @endif
        @if (Route::is(['shift']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Shift</a>
            </div>
        @endif
        @if (Route::is(['sales-returns']))
            <div class="page-btn">
                <a href="{{ url('createsalesreturn') }}" class="btn btn-added" data-bs-toggle="modal"
                    data-bs-target="#add-sales-new"><i data-feather="plus-circle" class="me-2"></i>Add New Sales
                    Return</a>
            </div>
        @endif
        @if (Route::is(['waybills']))
            <div class="page-btn">
                <a href="{{ route('create-waybill') }}" class="btn btn-added"><i data-feather="plus-circle"
                        class="me-2"></i>Add New Waybill</a>
            </div>
        @endif
        @if (Route::is(['sales-list']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-sales-new"><i
                        data-feather="plus-circle" class="me-2"></i> Add New Sales</a>
            </div>
        @endif
        @if (Route::is(['quotation-list']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Quotation</a>
            </div>
        @endif
        @if (Route::is(['purchase-returns']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-sales-new">
                    <i data-feather="plus-circle" class="me-2"></i>Add Purchase Return
                </a>
            </div>
        @endif
        @if (Route::is(['payroll-list']))
            <div class="page-btn">
                <button class="btn btn-primary add-em-payroll" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasRight-add" aria-controls="offcanvasRight-add"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Payoll</button>
            </div>
        @endif
        @if (Route::is(['manage-stocks']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New</a>
            </div>
        @endif
        @if (Route::is(['leaves-employee']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Apply Leave</a>
            </div>
        @endif
        @if (Route::is(['leaves-admin']))
            <div class="page-btn">
                <a href="{{ url('leave-types') }}" class="btn btn-added">Leave type</a>
            </div>
        @endif
        @if (Route::is(['leave-types']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add Leave type</a>
            </div>
        @endif
        @if (Route::is(['holidays']))
            <div class="page-btn">
                <a href="" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-department"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Holiday</a>
            </div>
        @endif
        @if (Route::is(['expense-list']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i> Add New Expense</a>
            </div>
        @endif
        @if (Route::is(['expense-category']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i> Add Expense Category</a>
            </div>
        @endif
        @if (Route::is(['employees-grid']))
            <div class="page-btn">
                <a href="{{ url('add-employee') }}" class="btn btn-added"><i data-feather="plus-circle"
                        class="me-2"></i>Add New Employee</a>
            </div>
        @endif
        @if (Route::is(['designation']))
            <div class="page-btn">
                <a href="" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-department"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Designation</a>
            </div>
        @endif
        @if (Route::is(['department-grid']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-department"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Department</a>
            </div>
        @endif
        @if (Route::is(['customers']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-customer"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Customer</a>
            </div>
        @endif
        @if (Route::is(['meters']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-meter"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Meter</a>
            </div>
        @endif
        @if (Route::is(['coupons']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Coupons</a>
            </div>
        @endif
        @if (Route::is(['countries']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Country</a>
            </div>
        @endif
        @if (Route::is(['category-list']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal"
                    data-bs-target="#formmodal_category"><i data-feather="plus-circle" class="me-2"></i>Add New
                    Category</a>
            </div>
        @endif
        @if (Route::is(['consignor-list']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal"
                    data-bs-target="#formmodal_consignor"><i data-feather="plus-circle" class="me-2"></i>Add New
                    Consignor</a>
            </div>
        @endif
        @if (Route::is(['brand-list']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-brand"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Brand</a>
            </div>
        @endif
        @if (Route::is(['attendance-admin']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i>Add New Attendance</a>
            </div>
        @endif
        @if (Route::is(['users']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add_new_user"><i
                        data-feather="plus-circle" class="me-2"></i>Add New User</a>
            </div>
        @endif
        @if (Route::is(['roles-permissions']))
            <div class="page-btn">
                <a href="#" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#add-units"><i
                        data-feather="plus-circle" class="me-2"></i> Add New Role</a>
            </div>
        @endif
        @if (Route::is(['product-list']))
            <div class="page-btn">
                <button type="button" class="btn btn-added" data-bs-toggle="modal" data-bs-target="#formmodal"
                    data-bs-whatever="@fat"><i class="me-2"
                        data-feather="plus-circle"></i>{{ $li_3 }}</button>
                {{-- <a href="{{ $li_2 }}" class="btn btn-added"><i data-feather="plus-circle"
                        class="me-2"></i>{{ $li_3 }}</a> --}}
            </div>
            {{-- <div class="page-btn import">
                <a href="#" class="btn btn-added color" data-bs-toggle="modal" data-bs-target="#view-notes"><i
                        data-feather="download" class="me-2"></i>{{ $li_4 }}</a>
            </div> --}}
        @endif
    </div>
@endif

@if (Route::is([
        'chart-apex',
        'chart-c3',
        'chart-flot',
        'chart-js',
        'chart-morris',
        'chart-peity',
        'data-tables',
        'tables-basic',
        'form-basic-inputs',
        'form-checkbox-radios',
        'form-input-groups',
        'form-grid-gutters',
        'form-select',
        'form-mask',
        'form-fileupload',
        'form-horizontal',
        'form-vertical',
        'form-floating-labels',
        'form-validation',
        'form-select2',
        'form-wizard',
        'icon-fontawesome',
        'icon-feather',
        'icon-ionic',
        'icon-material',
        'icon-pe7',
        'icon-simpleline',
        'icon-themify',
        'icon-weather',
        'icon-typicon',
        'icon-flag',
        'ui-clipboard',
        'ui-counter',
        'ui-drag-drop',
        'ui-rating',
        'ui-ribbon',
        'ui-scrollbar',
        'ui-stickynote',
        'ui-text-editor',
        'ui-timeline',
    ]))
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">{{ $title }}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('index') }}">{{ $li_1 }}</a></li>
                    <li class="breadcrumb-item active">{{ $li_2 }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
@endif
