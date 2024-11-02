<?php $page = 'customer-report'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Customer Report
                @endslot
                @slot('li_1')
                    Manage Your Customer Report
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
                        <div class="form-sort">
                            <i data-feather="sliders" class="info-img"></i>
                            <select class="select">
                                <option>Sort by Date</option>
                                <option>27 9 23</option>
                                <option>10 9 23</option>
                            </select>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="user" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Name</option>
                                            <option>Rose</option>
                                            <option>Kaitlin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="user" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose ID</option>
                                            <option>CT_0003</option>
                                            <option>CT_0004</option>
                                            <option>CT_0005</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <i data-feather="stop-circle" class="info-img"></i>
                                        <select class="select">
                                            <option>Choose Status</option>
                                            <option>Completed</option>
                                            <option>Incompleted</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="input-blocks">
                                        <img src="{{ URL::asset('/build/img/icons/payment-status.svg') }}"
                                            class="info-img status-icon" alt="Icon">
                                        <select class="select">
                                            <option>Choose Payment Status</option>
                                            <option>Paid</option>
                                            <option>Unpaid</option>
                                            <option>Overdue</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
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
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th class="no-sort">
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Amount</th>
                                    <th>Paid</th>
                                    <th>Due Amount</th>
                                    <th>Status</th>
                                    <th>Payment Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0001</td>
                                    <td>Thomas</td>
                                    <td>$1800</td>
                                    <td>$1800</td>
                                    <td>$0.00</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badge-linesuccess">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0002</td>
                                    <td>Rose</td>
                                    <td>$120</td>
                                    <td>$0.00</td>
                                    <td>$120</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badge badge-linedanger">Unpaid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0003</td>
                                    <td>Benjamin</td>
                                    <td>$2000</td>
                                    <td>$2000</td>
                                    <td>$0.00</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badge-linesuccess">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0004</td>
                                    <td>Kaitlin</td>
                                    <td>$1300</td>
                                    <td>$1300</td>
                                    <td>$1300</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badges-warning">Overdue</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0005</td>
                                    <td>Lilly</td>
                                    <td>$400</td>
                                    <td>$0.00</td>
                                    <td>$400</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badge badge-linedanger">Unpaid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0006</td>
                                    <td>Freda</td>
                                    <td>$700</td>
                                    <td>$700</td>
                                    <td>$700</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badges-warning">Overdue</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0007</td>
                                    <td>Alwin</td>
                                    <td>$800</td>
                                    <td>$800</td>
                                    <td>$0.00</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badge-linesuccess">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0008</td>
                                    <td>Maybelle</td>
                                    <td>$300</td>
                                    <td>$300</td>
                                    <td>$0.00</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badge-linesuccess">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0009</td>
                                    <td>Ellen</td>
                                    <td>$120</td>
                                    <td>$120</td>
                                    <td>$0.00</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badge-linesuccess">Paid</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td>CT_0010</td>
                                    <td>Grace</td>
                                    <td>$600</td>
                                    <td>$600</td>
                                    <td>$0.00</td>
                                    <td><span class="badges status-badge">Completed</span></td>
                                    <td><span class="badge-linesuccess">Paid</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
