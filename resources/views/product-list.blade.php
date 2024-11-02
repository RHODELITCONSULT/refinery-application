<?php $page = 'product-list'; ?>
@extends('layout.mainlayout')
@section('content')
    <style>
        .deleteConfirmation:hover {
            background-color: red !important;
            border: none !important;
        }
    </style>
    <div class="page-wrapper
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Product List
                @endslot
                @slot('li_1')
                    Manage your products
                @endslot
                @slot('li_2')
                    {{ url('add-product') }}
                @endslot
                @slot('li_3')
                    Add New Product
                @endslot
                {{-- @slot('li_4')
                    Import Product
                @endslot --}}
            @endcomponent



            {{-- ADD NEW PRODUCT MODAL --}}
            <div class="modal fade" id="formmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('store-product') }}" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">New Product</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                    <label for="product-name" class="col-form-label">Product Name:</label>
                                    <input type="text" name="name" class="form-control" id="product-name" required
                                        maxlength="255" minlength="3">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- DELETE CONFIRM MODAL --}}
            @foreach ($products as $product)
                <div class="modal fade" id="delete-note-{{ $product->id }}">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="page-wrapper-new p-0">
                                <div class="content">
                                    <div class="delete-popup">
                                        <div class="delete-image text-center mx-auto">
                                            <img src="{{ URL::asset('/build/img/icons/close-circle.png') }}" alt="Img"
                                                class="img-fluid">
                                        </div>
                                        <div class="delete-heads">
                                            <h4>Are You Sure?</h4>
                                            <p>Do you really want to delete this item, This process cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer-btn delete-footer">
                                            <a href="" class="btn btn-cancel me-2" data-bs-dismiss="modal">Cancel</a>
                                            <a href="{{ route('destroy-product', $product->id) }}"
                                                class="btn btn-submit">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- EDIT PRODUCT MODAL --}}
                @foreach ($products as $product)
                <div class="modal fade" id="formmodal_{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('update-product', $product->id) }}" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Edit Product</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="product-name" class="col-form-label">Product Name:</label>
                                        <input type="text" name="name" class="form-control" id="product-name" required
                                            maxlength="255" minlength="3" value="{{ $product->name }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
            <!-- /product list -->
            <div class="card table-list-card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-input">
                                <a href="javascript:void(0);" class="btn btn-searchset"><i data-feather="search"
                                        class="feather-search"></i></a>
                            </div>
                        </div>
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <i data-feather="filter" class="filter-icon"></i>
                                <span><img src="{{ URL::asset('/build/img/icons/closes.svg') }}" alt="img"></span>
                            </a>
                        </div>
                        <div class="form-sort">
                            <i data-feather="sliders" class="info-img"></i>
                            <select class="select">
                                <option>Sort by Date</option>
                                <option>14 09 23</option>
                                <option>11 09 23</option>
                            </select>
                        </div>
                    </div>
                    <!-- /Filter -->
                    {{-- <div class="card mb-0" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="box" class="info-img"></i>
                                                <select class="select">
                                                    <option>Choose Product</option>
                                                    <option>
                                                        Lenovo 3rd Generation</option>
                                                    <option>Nike Jordan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="stop-circle" class="info-img"></i>
                                                <select class="select">
                                                    <option>Choose Categroy</option>
                                                    <option>Laptop</option>
                                                    <option>Shoe</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="git-merge" class="info-img"></i>
                                                <select class="select">
                                                    <option>Choose Sub Category</option>
                                                    <option>Computers</option>
                                                    <option>Fruits</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i data-feather="stop-circle" class="info-img"></i>
                                                <select class="select">
                                                    <option>All Brand</option>
                                                    <option>Lenovo</option>
                                                    <option>Nike</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <i class="fas fa-money-bill info-img"></i>
                                                <select class="select">
                                                    <option>Price</option>
                                                    <option>$12500.00</option>
                                                    <option>$12500.00</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <a class="btn btn-filters ms-auto"> <i data-feather="search"
                                                        class="feather-search"></i> Search </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /Filter -->
                    <div class="table-responsive product-list">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Unique Id</th>
                                    <th>Created At</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->unique_id }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $product->created_at)->format('d M, Y') }}
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2"  href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#formmodal_{{ $product->id }}"
                                                    data-bs-whatever="@fat">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="deleteConfirmation p-2" href="javascript:void(0);" data-bs-toggle="modal"
                                                    data-bs-target="#delete-note-{{ $product->id }}"
                                                    data-bs-whatever="@fat">
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
