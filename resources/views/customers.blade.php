<?php $page = 'customers'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Customer List
                @endslot
                @slot('li_1')
                    Manage your Customers
                @endslot
                @slot('li_2')
                    Add New Customer
                @endslot
            @endcomponent

            {{-- ADD CUSTOMER MODAL --}}
            <div class="modal fade" id="add-customer">
                <div class="modal-dialog modal-lg modal-dialog-centered custom-modal-two">
                    <div class="modal-content">
                        <div class="page-wrapper-new p-0">
                            <div class="content">
                                <div class="modal-header border-0 custom-modal-header">
                                    <div class="page-title">
                                        <h4>Add Customer</h4>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body custom-modal-body">
                                    <form action="{{ route('store-customer') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12 pe-0">
                                                <div class="mb-3">
                                                    <label class="form-label">Customer Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="customer_name" required
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 pe-0">
                                                <div class="mb-3">
                                                    <label id="contact_email" class="form-label">Email</label>
                                                    <input type="contact_email" name="contact_email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 pe-0">
                                                <div class="mb-3">
                                                    <label id="contact" class="form-label">Phone <span
                                                            class="text-danger">*</span> </label>
                                                    <input class="form-control" type="tel" id="contact"
                                                        name="contact_phone" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 pe-0">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" name="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 pe-0">
                                                <div class="mb-3">
                                                    <label class="form-label">City</label>
                                                    <input type="text" name="city" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer-btn">
                                            <button type="button" class="btn btn-cancel me-2"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END OF ADD CUSTOMER MODAL --}}

            {{-- EDIT CUSTOMER MODAL START --}}
            @foreach ($customers as $customer)
                <div class="modal fade" id="edit-customer_{{ $customer->id }}">
                    <div class="modal-dialog modal-lg modal-dialog-centered custom-modal-two">
                        <div class="modal-content">
                            <div class="page-wrapper-new p-0">
                                <div class="content">
                                    <div class="modal-header border-0 custom-modal-header">
                                        <div class="page-title">
                                            <h4>Edit Customer Info</h4>
                                        </div>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <form action="{{ route('update-customer', $customer->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 pe-0">
                                                    <div class="mb-3">
                                                        <label class="form-label">Customer Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="customer_name"
                                                            value="{{ $customer->name }}" required class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 pe-0">
                                                    <div class="mb-3">
                                                        <label id="contact_email" class="form-label">Email</label>
                                                        <input type="contact_email" name="contact_email"
                                                            value="{{ $customer->email }}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 pe-0">
                                                    <div class="mb-3">
                                                        <label id="contact" class="form-label">Phone <span
                                                                class="text-danger">*</span> </label>
                                                        <input class="form-control" type="tel" id="contact"
                                                            value="{{ $customer->contact_number }}" name="contact_phone"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 pe-0">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" name="address" class="form-control"
                                                            value="{{ $customer->address }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 pe-0">
                                                    <div class="mb-3">
                                                        <label class="form-label">City</label>
                                                        <input type="text" name="city" class="form-control"
                                                            value="{{ $customer->city }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer-btn">
                                                <button type="button" class="btn btn-cancel me-2"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-submit">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
            {{-- EDIT CUSTOMER MODAL END --}}

            {{-- DELETE CONFIRM OF EDIT CUSTOMER MODAL --}}
            @foreach ($customers as $customer)
                <div class="modal fade" id="delete-customer-{{ $customer->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="page-wrapper-new p-0">
                                <div class="content">
                                    <div class="delete-popup">
                                        <div class="delete-image text-center mx-auto">
                                            <img src="{{ URL::asset('/build/img/icons/close-circle.png') }}"
                                                alt="Img" class="img-fluid">
                                        </div>
                                        <div class="delete-heads">
                                            <h4>Are You Sure?</h4>
                                            <p>Do you really want to delete this item, This process cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer-btn delete-footer">
                                            <a href="" class="btn btn-cancel me-2"
                                                data-bs-dismiss="modal">Cancel</a>
                                            <a href="{{ route('destroy-customer', $customer->id) }}"
                                                class="btn btn-submit">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- END DELETE CONFIRM OF EDIT CUSTOMER MODAL --}}

            <!-- /product list -->
            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href="" class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
                            </div>
                        </div>
                        <div class="search-path">
                            <div class="d-flex align-items-center">
                                <a class="btn btn-filter" id="filter_search">
                                    <i data-feather="filter" class="filter-icon"></i>
                                    <span><img src="{{ URL::asset('/build/img/icons/closes.svg') }}"
                                            alt="img"></span>
                                </a>

                            </div>
                        </div>
                        <div class="form-sort">
                            <i data-feather="sliders" class="info-img"></i>
                            <select class="select">
                                <option>Sort by Date</option>
                                <option>Newest</option>
                                <option>Oldest</option>
                            </select>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="user" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Customer Name</option>
                                            <option>Benjamin</option>
                                            <option>Ellen</option>
                                            <option>Freda</option>
                                            <option>Kaitlin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="globe" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Country</option>
                                            <option>India</option>
                                            <option>USA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12 ms-auto">
                                    <div class="input-blocks">
                                        <a class="btn btn-filters ms-auto"> <i data-feather="search"
                                                class="feather-search"></i> Search </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>
                                            {{ $customer->contact_number }}
                                        </td>
                                        <td>{{ $customer->address }}</td>
                                        <td>{{ $customer->city }}</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit-customer_{{ $customer->id }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="p-2" href="javascript:void(0);"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#delete-customer-{{ $customer->id }}">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
