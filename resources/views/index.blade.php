<?php $page = 'index'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count">
                        <div class="dash-counts">
                            <h4>{{ \App\Models\Customer::count() }}</h4>
                            <h5>Customers</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das1">
                        <div class="dash-counts">
                            <h4>{{ \App\Models\Consignor::count() }}</h4>
                            <h5>Consignors</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h4>{{ \App\Models\Waybill::count() }}</h4>
                            <h5>Waybills Generated</h5>
                        </div>
                        <div class="dash-imgs">
                            <img src="{{ URL::asset('/build/img/icons/file-text-icon-01.svg') }}" class="img-fluid"
                                alt="icon">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das3">
                        <div class="dash-counts">
                            <h4>{{ is_null($temperature) ? '0°C' : $temperature->temperature . '°C' }}</h4>
                            <h5>Today's Temperature</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button trigger modal -->
            @php
                $years = \App\Models\Waybill::selectRaw('YEAR(created_at) as year')
                    ->distinct()
                    ->orderBy('year', 'desc')
                    ->pluck('year');
            @endphp

            <div class="row">
                <div class="col-xl-7 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Customer Waybills Per Month</h5>
                            <div class="graph-sets">
                                <div class="dropdown dropdown-wraper">
                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ date('Y') }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @foreach ($years as $year)
                                            <li><a href="javascript:void(0);" class="dropdown-item">{{ $year }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="wabill_chart"></div>
                            <div id="legend"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill default-cover mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Waybills by Product</h4>

                        </div>
                        <div class="card-body">
                            <div id="product_chart"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectedYear = new Date().getFullYear();

            function createLegend(customers) {
                const legendContainer = document.querySelector('#legend');
                legendContainer.innerHTML = '';

                // Create a new row for the legend items
                const legendRow = document.createElement('div');
                legendRow.classList.add('row');

                customers.forEach((customer, index) => {
                    const color = getColor(index);

                    // Create a column item
                    const colDiv = document.createElement('div');
                    colDiv.classList.add('col-6',
                        'mb-2');

                    colDiv.innerHTML = `
            <div style="display: flex; align-items: center;">
                <div style="width: 20px; height: 20px; background-color: ${color}; margin-right: 10px;"></div>
                <span>${customer}</span>
            </div>
        `;

                    // Append each column to the row
                    legendRow.appendChild(colDiv);
                });

                // Append the row to the legend container
                legendContainer.appendChild(legendRow);
            }


            function getColor(index) {
                const colors = ['#28C76F', '#EA5455', '#7367F0', '#FF9F43', '#FF5733', '#33C1FF'];
                return colors[index % colors.length];
            }

            axios.get(`/api/waybills-per-month?year=${selectedYear}`)
                .then(response => {
                    const data = response.data; // Assuming the response is already an array
                    const monthlyData = {}; // To hold the count for each customer per month

                    data.forEach(item => {
                        const {
                            customer,
                            month,
                            count
                        } = item;

                        // Initialize the customer if not already done
                        if (!monthlyData[customer]) {
                            monthlyData[customer] = Array(12).fill(0); // Create an array for 12 months
                        }

                        // Get the month index
                        const monthIndex = getMonthIndex(month);
                        if (monthIndex !== -1) {
                            monthlyData[customer][monthIndex] +=
                                count; // Increment the count for the respective month
                        }
                    });

                    const uniqueCustomers = Object.keys(monthlyData);
                    createLegend(uniqueCustomers);

                    const series = uniqueCustomers.map(customer => {
                        return {
                            name: customer,
                            data: monthlyData[customer], // Use the counts array for the customer
                            color: getColor(uniqueCustomers.indexOf(customer))
                        };
                    });

                    const options = {
                        series: series,
                        chart: {
                            type: 'bar',
                            height: 320,
                            stacked: true,
                            zoom: {
                                enabled: true
                            }
                        },
                        xaxis: {
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep',
                                'Oct', 'Nov', 'Dec'
                            ]
                        },
                        legend: {
                            show: false
                        },
                        fill: {
                            opacity: 1
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#wabill_chart"), options);
                    chart.render();
                })
                .catch(error => {
                    console.error('Error fetching waybill data:', error);
                });


            axios.get('/api/waybills-per-product')
                .then(response => {
                    const data = response.data;

                    const products = data.map(item => item.product);
                    const counts = data.map(item => item.count);

                    const options = {
                        series: counts,
                        chart: {
                            type: 'donut',
                            height: 450,
                        },
                        labels: products,
                        legend: {
                            position: 'bottom'
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '60%'
                                }
                            }
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#product_chart"), options);
                    chart.render();
                })
                .catch(error => {
                    console.error('Error fetching product data:', error);
                });


            // Function to convert month name to index
            function getMonthIndex(monthName) {
                const monthMap = {
                    Jan: 0,
                    Feb: 1,
                    Mar: 2,
                    Apr: 3,
                    May: 4,
                    Jun: 5,
                    Jul: 6,
                    Aug: 7,
                    Sep: 8,
                    Oct: 9,
                    Nov: 10,
                    Dec: 11
                };
                return monthMap[monthName] !== undefined ? monthMap[monthName] : -1;
            }


        });
    </script>
@endsection
