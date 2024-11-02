<?php $page = 'coupons'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Reporting & Analytics
                @endslot
                @slot('li_1')
                    Manage your Reports
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
                        {{-- <div class="search-path">
                            <div class="d-flex align-items-center">
                                <a class="btn btn-filter" id="filter_search">
                                    <i data-feather="filter" class="filter-icon"></i>
                                    <span><img src="{{ URL::asset('/build/img/icons/closes.svg') }}" alt="img"></span>
                                </a>
                            </div>
                        </div> --}}

                        <div class="form-sort d-flex align-items-center">
                            {{-- <i data-feather="sliders" class="info-img me-2 text-secondary"></i> --}}
                            <select id="customSelect" class="form-control form-select">
                                <option value="quarterly">Quarterly</option>
                                <option value="midyear">Mid-Year</option>
                                <option value="yearly">Yearly</option>
                            </select>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>Year</th>
                                    <th>Duration</th>
                                    <th>Product</th>
                                    <th>Number of Customers</th>
                                    <th>Total Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($report_data) > 0)
                                    @foreach ($report_data as $data)
                                        <tr>
                                            <td>{{ $data->year }}</td>
                                            <td>
                                                @if ($data->period === 'Q1')
                                                    <span class="badge badge-linedanger">First Quarter</span>
                                                @elseif($data->period === 'Q2')
                                                    <span class="badge badge-bgprimary">Second Quarter</span>
                                                @elseif($data->period === 'Q3')
                                                    <span class="badge badge-linedanger">Third Quarter</span>
                                                @elseif($data->period === 'Yearly')
                                                    <span class="badge badge-linesuccess">Yearly</span>
                                                @elseif($data->period === 'H1')
                                                    <span class="badge badge-warning">First Half</span>
                                                @elseif($data->period === 'H2')
                                                    <span class="badge badge-warning">Second Half</span>
                                                @else
                                                    <span class="badge badge-linedanger">Fourth Quarter</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $data->product }}
                                            </td>
                                            <td>{{ $data->number_of_customers }}</td>
                                            <td>
                                                {{ $data->total_volume }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectElement = document.getElementById("customSelect");
            const urlParams = new URLSearchParams(window.location.search);
            const duration = urlParams.get("duration");
            if (duration) {
                selectElement.value = duration;
            }
            selectElement.addEventListener("change", function() {
                const selectedDuration = selectElement.value;
                const currentUrl = new URL(window.location.href);
                currentUrl.searchParams.set("duration", selectedDuration);
                window.location.href = currentUrl.toString();
            });
        });
    </script>
@endsection
