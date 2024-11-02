<?php $page = 'coupons'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Waybill Custom Filter Reporting
                @endslot
                @slot('li_1')
                    Filter out Waybills and Generate Reports based on it
                @endslot
                @slot('li_2')
                @endslot
            @endcomponent

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
                                    <span><img src="{{ URL::asset('/build/img/icons/closes.svg') }}" alt="img"></span>
                                </a>
                            </div>
                        </div>
                        {{-- <div class="form-sort">
                            <i data-feather="sliders" class="info-img"></i>
                            <select class="select">
                                <option>Sort by Date</option>
                                <option>Newest</option>
                                <option>Oldest</option>
                            </select>
                        </div> --}}
                    </div>
                    <!-- /Filter -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <form action="{{route("waybills-filter")}}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <!-- Customer Selection -->
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="zap" class="info-img"></i>
                                            <select class="select form-select" name="customer">
                                                <option value={{null}}>Choose Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->name }}">{{ $customer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Product Selection -->
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="box" class="info-img"></i>
                                            <select class="select form-select" name="product">
                                                <option>Choose Product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Start Date Picker -->
                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="calendar" class="info-img"></i>
                                            <div class="input-group">
                                                <input type="text" class="form-control datetimepicker" name="startDate" placeholder="Choose Start Date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6 col-12">
                                        <div class="input-blocks">
                                            <i data-feather="calendar" class="info-img"></i>
                                            <div class="input-group">
                                                <input type="text" class="form-control datetimepicker" name="endDate" placeholder="Choose End Date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-8 col-sm-12 d-flex" style="margin-bottom: 30px">
                                        <button type="submit" class="btn btn-filters btn-primary">
                                            <i data-feather="search" class="feather-search me-1"></i> Search
                                        </button>
                                        <a href="{{ route('reports-custom-filter') }}" class="btn btn-danger" style="margin-left: 20px">
                                            <i data-feather="x-circle" class="feather-search me-1"></i> Reset
                                        </a>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Driver</th>
                                    <th>Truck Head</th>
                                    <th>Truck Trailer</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Added By</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($waybills as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->driver }}</td>
                                    <td>
                                        <span class="badge badge-bgdanger">{{ $item->truck_head_number }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-bgdanger">{{ $item->truck_trailer_number }}</span>
                                    </td>
                                    <td>{{ $item->product }}</td>
                                    <td>{{ $item->volume }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $item->created_at)->format("d M, Y") }}</td>
                                    <td>{{ $item->added_by }}</td>
                                    <td><span class="badge badge-linesuccess">Processed</span></td>
                                    <td class="action-table-data">
                                        <div class="edit-delete-action">
                                            <a class="me-2 p-2" href="{{ route("show-waybill", $item->id) }}">
                                                <i data-feather="eye" class="feather-eye"></i>
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
