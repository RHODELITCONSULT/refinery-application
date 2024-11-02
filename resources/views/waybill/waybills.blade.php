<?php $page = 'sales-returns'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Waybill List
                @endslot
                @slot('li_1')
                    Manage your Waybills
                @endslot
                @slot('li_2')
                    Add New Waybill
                @endslot
            @endcomponent

            @foreach ($waybills as $waybill)
                <div class="modal fade" id="delete-waybill-{{ $waybill->id }}">
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
                                            <a href="{{ route('destroy-waybill', $waybill->id) }}"
                                                class="btn btn-submit">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

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
                            <a class="btn btn-filter" id="filter_search">
                                <i data-feather="filter" class="filter-icon"></i>
                                <span><img src="{{ URL::asset('/build/img/icons/closes.svg') }}" alt="img"></span>
                            </a>
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
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Consignor</th>
                                    <th>Customer</th>
                                    <th>Opening</th>
                                    <th>Closing</th>
                                    <th>Variance</th>
                                    <th>Date</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($waybills as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->product }}</td>
                                        <td>{{ $item->category }}</td>
                                        <td>{{ $item->consignor }}</td>
                                        <td>{{ $item->customer }}</td>
                                        <td><span class="badges bg-lightgreen">{{ $item->opening }}</span></td>
                                        <td><span class="badges bg-lightred">{{ $item->closing }}</span></td>
                                        <td>{{ $item->volume }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $item->created_at)->format("d M, Y") }}</td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="{{route('show-waybill', $item->id)}}">
                                                    <i data-feather="eye" class="feather-eye"></i>
                                                </a>
                                                <a class="me-2 p-2" href="{{route('edit-waybill', $item->id)}}" >
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="p-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete-waybill-{{ $item->id }}">
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
