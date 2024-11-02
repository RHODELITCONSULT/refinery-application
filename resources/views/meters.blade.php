<?php $page = 'brand-list'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Meter
                @endslot
                @slot('li_1')
                    Manage your Meters
                @endslot
                @slot('li_2')
                    Add New Meter
                @endslot
            @endcomponent

            {{-- METER ADD MODAL --}}
            <div class="modal fade" id="add-meter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('store-meter') }}" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">New Meter</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <div class="mb-3">
                                    <label for="meter" class="col-form-label">Enter Meter Name:</label>
                                    <input type="text" name="meter_name" class="form-control" id="meter" required
                                        maxlength="255" minlength="3">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Meter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- END OF METER ADD MODAL --}}

            {{-- METER DELETE MODAL --}}
            @foreach ($meters as $meter)
                <div class="modal fade" id="delete-meter-{{ $meter->id }}">
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
                                            <a href="{{ route('destroy-meter', $meter->id) }}"
                                                class="btn btn-submit">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- END OF METER DELETE MODAL --}}

            {{-- EDIT PRODUCT MODAL --}}
            @foreach ($meters as $meter)
                <div class="modal fade" id="edit-meter-{{ $meter->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('update-meter', $meter->id) }}" method="POST">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel">Edit meter</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="meter-name" class="col-form-label">meter Name:</label>
                                        <input type="text" name="meter_name" class="form-control" id="meter-name" required
                                            maxlength="255" minlength="3" value="{{ $meter->name }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
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
                    <!-- /Filter -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="zap" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Brand</option>
                                            <option>Lenevo</option>
                                            <option>Boat</option>
                                            <option>Nike</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="calendar" class="info-img"></i>
                                        <div class="input-groupicon">
                                            <input type="text" class="datetimepicker" placeholder="Choose Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="stop-circle" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Status</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
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
                                    <th>Meter</th>
                                    <th>unique ID</th>
                                    <th>Created On</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meters as $meter)
                                    <tr>
                                        <td>{{ $meter->name }}</td>
                                        <td>{{ $meter->unique_id }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $meter->created_at)->format('d M, Y') }}
                                        </td>
                                        <td>
                                            @if ($meter->status === 'active')
                                                <span class="badge badge-linesuccess">Active</span>
                                            @else
                                                <span class="badge badge-linedanger">Inactive</span>
                                            @endif
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit-meter-{{ $meter->id }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="p-2" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#delete-meter-{{ $meter->id }}">
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
