<?php $page = 'view-waybill'; ?>
@extends('layout.mainlayout')
@section('content')
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Waybill
                @endslot
                @slot('li_1')
                    Waybill Details
                @endslot
                @slot('li_2')
                    /waybills
                @endslot
                @slot('li_3')
                    Back to Waybills
                @endslot
            @endcomponent

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="invoice" class="card card-primary card-outline">
                                <div class="card-body" id="print-section">
                                    <div class="invoice p-3 mb-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <h2 class="text-center text-bold mb-3">
                                                    COMPANY NAME WAYBILL.
                                                </h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 d-flex align-items-center justify-content-end mb-3">
                                                <h5 class="float-right">Date:
                                                    {{ \Carbon\Carbon::parse(now())->format('d/m/Y') }}</h5>
                                            </div>
                                        </div>
                                        <div class="row invoice-info">
                                            <div class="col-sm-4"> <!-- Added padding to create spacing -->
                                                <H5>CONSIGNOR</H5>
                                                <address>
                                                    {{ $consignor->consignor }}<br>
                                                    {{ $consignor->address . ', ' . $consignor->city }}<br>
                                                    Phone: {{ $consignor->contact_number }}<br>
                                                    Email: {{ $consignor->contact_email }}
                                                </address>
                                            </div>
                                            <div class="col-sm-4 invoice-col"> <!-- Padding for spacing -->
                                                <div class="mb-1 d-flex">
                                                    <p class="mb-0">CUSTOMER:</p>
                                                    <p class="mb-0">{{ $waybill->customer }}</p>
                                                </div>
                                                <div class="mb-1 d-flex align-items-center">
                                                    <p class="mb-0">CUSTOMER ORDER NO.:</p>
                                                    <p class="mb-0">{{ $waybill->description }}</p>
                                                </div>
                                                <div class="mb-1 d-flex">
                                                    <p class="mb-0">DESTINATION:</p>
                                                    <p class="mb-0">{{ $waybill->destination }}</p>
                                                </div>
                                                <div class="mb-1 d-flex align-items-center">
                                                    <p class="mb-0">DRIVER:</p>
                                                    <p class="mb-0">{{ $waybill->driver }}</p>
                                                </div>
                                                <div class="mb-1 d-flex align-items-center">
                                                    <p class="mb-0">NPA REFERENCE:</p>
                                                    <p class="mb-0">{{ '..........................' }}</p>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 invoice-col"> <!-- Padding for spacing -->
                                                @php
                                                    $prefix = 'C';
                                                    $section_one = rand(100, 999);
                                                    $section_two = rand(100, 999);
                                                    $certificate = $prefix . $section_one . '/' . $section_two;
                                                    $new_time = \Carbon\Carbon::createFromFormat(
                                                        'Y-m-d H:i:s',
                                                        $waybill->created_at,
                                                    )->format('H:i A');
                                                @endphp
                                                <div class="mb-1 d-flex align-items-center gap-1">
                                                    <h7 class="mb-0">SERIAL NO.:</h7>
                                                    <p class="mb-0">{{ '#' . $waybill->barcode }}</p>
                                                </div>
                                                <div class="mb-1 d-flex align-items-center gap-1">
                                                    <h7 class="mb-0">ORDER-TYPE:</h7>
                                                    <p class="mb-0">{{ $waybill->order_type }}</p>
                                                </div>
                                                <div class="mb-1 d-flex align-items-center gap-1">
                                                    <h7 class="mb-0">LOADING TIME: </h7>
                                                    <p class="mb-0">{{ $new_time }}</p>
                                                </div>
                                                <div class="mb-1 d-flex align-items-center gap-1">
                                                    <h7 class="mb-0">TRUCK HEAD N0: </h7>
                                                    <p class="mb-0">{{ $waybill->truck_head_number }}</p>
                                                </div>
                                                <div class="mb-1 d-flex align-items-center gap-1">
                                                    <h7 class="mb-0">TRUCK TRAILER NO.: </h7>
                                                    <p class="mb-0">{{ $waybill->truck_trailer_number }}</p>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <div class="card-header">
                                                                <h7> <class="m-0"><strong>
                                                                        <CENTER><u>COMPARTMENT DETAILS</u></CENTER>
                                                                    </strong></h4>
                                                            </div>
                                                            <h5><b>Seals:
                                                                    <h5><b><BR>Seals:<br>
                                                                            <hr>
                                                                            <b>Ullages:
                                                                                <div><br></div>
                                                                                <div class="row justify-content-start">
                                                                                    <div class="col">
                                                                                        <b>Front:</b> <br>
                                                                                    </div>

                                                                                    <div class="col">
                                                                                        <b>Rear:</b> <br>
                                                                                    </div>
                                                                                </div>
                                                                                <br>

                                                                                <h3>
                                                                                    <center><strong> <u>LOADING
                                                                                                SUMMARY</u></strong>
                                                                                        <center></center>
                                                                                </h3>

                                                                                <h3>
                                                                                    <th>Product</th>
                                                                                    <th>Unit</th>
                                                                                    <th>Meter No.</th>
                                                                                    <th>BRV Volume</th>
                                                                                    <th>Opening Readings</th>
                                                                                    <th>Closing Readings</th>
                                                                                    <th>Variance</th>
                                                                                </h3>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @php
                                                            $variance = $waybill->closing - $waybill->opening;
                                                        @endphp
                                                        <tr>
                                                            <td>{{ $waybill->product }}</td>
                                                            <td>{{ $waybill->unit_number }}</td>
                                                            <td>{{ $waybill->meter_number }}</td>
                                                            <td>{{ $waybill->volume }}</td>
                                                            <td>{{ $waybill->opening }}</td>
                                                            <td>{{ $waybill->closing }}</td>
                                                            <td>{{ $variance }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <!-- Start of Remarks: -->
                                        <div class="row justify-content-start">
                                            <h5 class="m-0 text-bold"> Remarks:</h5>
                                            <hr style="height:2px; border-width:0; color:black; background-color:black;">
                                            <br>
                                        </div>
                                        <!-- End of Remarks: -->
                                        <div><br></div>

                                        <form action="" id="invoice_form">
                                            <div class="row justify-content-start">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="cert">Cert: </label><span id="certificate"></span>
                                                        <input type="text" class="form-control" id="cert"
                                                            name="cert" value="{{ $certificate }}" readonly>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    @php
                                                        $batch_number = rand(100, 999);
                                                    @endphp
                                                    <div class="form-group">
                                                        <label for="batch_no">Batch No:#</label><span
                                                            id="batch_number"></span>
                                                        <input type="number" class="form-control" id="batch_no"
                                                            name="batch_no" value="{{ $batch_number }}"readonly>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="form-group">
                                                        <label for="density">Density:</label><span
                                                            id="density_number"></span>
                                                        <input type="number" class="form-control" id="density"
                                                            value="{{ '990' }}"name="density" readonly>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    @php
                                                        $latestTemperatureValue = '60';
                                                    @endphp
                                                    <div class="form-group">
                                                        <label for="temp">Temp:</label><span
                                                            id="temperature_number"></span>
                                                        <input type="number" class="form-control" id="temp"
                                                            name="temp" value="{{ $latestTemperatureValue }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                        <hr style="height:2px; border-width:0; color:black; background-color:black;">
                                        <br>
                                        <div><br></div>
                                        <div><br></div>
                                        <div><br></div>

                                        <div class="row justify-content-start">
                                            <div class="col">
                                                <h5> <b>DRIVER:___________</b> <br>
                                            </div>

                                            <div class="col">
                                                <h5><b>SUPERVISOR:___________</b> <br>
                                            </div>
                                            <div class="col">
                                                <h5><b>CUSTOMS OFFICER:___________</b> <br>
                                            </div>
                                        </div>

                                        <div class="row no-print mt-6" style="margin-top: 30px">
                                            <div class="col-12">
                                                <a id="print" rel="noopener"
                                                    class="btn btn-primary float-right no-print"
                                                    onclick="printPage(event)">
                                                    <i class="fas fa-print"></i> Print
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>

    <script>
        var originalUrl;

        function printPage(event) {
            event.preventDefault();

            // Hide the print button before printing
            document.querySelector('.no-print').style.display = 'none';

            const certValue = document.getElementById("cert").value;
            const batchNoValue = document.getElementById("batch_no").value;
            const densityValue = document.getElementById("density").value;
            const tempValue = document.getElementById("temp").value;

            document.getElementById("certificate").textContent = certValue;
            document.getElementById("batch_number").textContent = batchNoValue;
            document.getElementById("density_number").textContent = densityValue;
            document.getElementById("temperature_number").textContent = tempValue;
            var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
            const printContent = document.getElementById('print-section').innerHTML;

            WinPrint.document.write(printContent);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
            WinPrint.close();

            printWindow.onafterprint = function() {
                WinPrint.close();
            };
            resetForm();
        }

        function resetForm() {
            // Show the hidden form elements again
            document.getElementById("cert").style.display = "block";
            document.getElementById("batch_no").style.display = "block";
            document.getElementById("density").style.display = "block";
            document.getElementById("temp").style.display = "block";

            document.querySelector('.no-print').style.display = 'block';
        }
    </script>
@endsection
