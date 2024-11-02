<?php $page = 'create-waybill'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    New Waybill
                @endslot
                @slot('li_1')
                    Create new waybill
                @endslot
                @slot('li_2')
                    waybills
                @endslot
                @slot('li_3')
                    Back to Waybills
                @endslot
            @endcomponent
            <form action="{{ route('store-waybill') }}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body add-product pb-0">
                        <div class="accordion-card-one accordion" id="accordionExample">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingOne">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                        aria-controls="collapseOne">
                                        <div class="addproduct-icon">
                                            <h5><i data-feather="info" class="add-info"></i><span>Waybill Information</span>
                                            </h5>
                                            <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                    class="chevron-down-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Customer Order Number</label>
                                                    <input type="text" class="form-control" name="description" value="{{old('description')}}"
                                                        placeholder="Enter the customer order Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Product</label>
                                                    <select class="select" name="product">
                                                        <option>Select Product</option>
                                                        @foreach ($products as $product)
                                                            <option {{ old('product') === $product->name ? 'selected':'' }} value="{{ $product->name }}">{{ $product->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Category</label>
                                                    <select class="select" name="category">
                                                        <option>Choose Category</option>
                                                        @foreach ($categories as $category)
                                                            <option {{ old('category') === $category->brv ? 'selected':'' }} value="{{ $category->brv }}">{{ $category->brv }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Category</label>
                                                    <select class="select" name="consignor">
                                                        <option>Choose Consignor</option>
                                                        @foreach ($consignors as $consignor)
                                                            <option {{ old('consignor') === $consignor->consignor ? 'selected':'' }} value="{{ $consignor->consignor }}">
                                                                {{ $consignor->consignor }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Meter</label>
                                                    <select class="select" name="meter">
                                                        <option>Choose Meter</option>
                                                        @foreach ($meters as $meter)
                                                            <option {{ old('meter') === $meter->name ? 'selected':'' }} value="{{ $meter->name }}">
                                                                {{ $meter->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Customer</label>
                                                    <select class="select" name="customer">
                                                        <option>Choose Customer</option>
                                                        @foreach ($customers as $customer)
                                                            <option {{old('customer') === $customer->name ? 'selected':''}} value="{{ $customer->name }}">
                                                                {{ $customer->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Order Type</label>
                                                    <select class="select" name="order_type">
                                                        <option>Choose Order Type</option>
                                                        <option {{old('order_type') === "Local" ? 'selected':''}} value="Local">Local</option>
                                                        <option {{old('order_type') === "Foreign" ? 'selected':''}} value="Foreign">Foreign</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card-one accordion" id="accordionExample2">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingTwo">
                                    <div class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                        aria-controls="collapseTwo">
                                        <div class="text-editor add-list">
                                            <div class="addproduct-icon list icon">
                                                <h5><i data-feather="life-buoy" class="add-info"></i><span>Quantity
                                                        Details</span></h5>
                                                <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                        class="chevron-down-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Opening Readings</label>
                                                    <input type="number" class="form-control" id="opening" value="{{old('opening')}}" name="opening"
                                                        placeholder="Enter Opening Readings">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Closing Readings</label>
                                                    <input type="number" class="form-control" id="closing" value="{{old('closing')}}"
                                                        name="closing" placeholder="Enter Closing Readings">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Variance</label>
                                                    <input type="text" class="form-control" id="variance"
                                                        name="volume"
                                                        placeholder="Auto Filled for both opening and closing volumes" value="{{old('volume')}}"
                                                        readonly>
                                                    <div class="text-danger" id="error-message" style="display: none;">
                                                        Difference b/n opening and closing must be exactly 54000.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-card-one accordion" id="accordionExample3">
                            <div class="accordion-item">
                                <div class="accordion-header" id="headingThree">
                                    <div class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-controls="collapseThree">
                                        <div class="text-editor add-list">
                                            <div class="addproduct-icon list icon">
                                                <h5><i data-feather="truck" class="add-info"></i><span>Truck
                                                        Details</span></h5>
                                                <a href="javascript:void(0);"><i data-feather="chevron-down"
                                                        class="chevron-down-add"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapseThree" class="accordion-collapse collapse show"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionExample3">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Driver</label>
                                                    <input type="text" class="form-control" name="driver" value="{{old('driver')}}"
                                                        placeholder="Enter Driver Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Truck Head Number</label>
                                                    <input type="text" class="form-control" name="head_number" value="{{old('head_number')}}"
                                                        placeholder="Enter Truck Head Number">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Truck Trailer Number</label>
                                                    <input type="text" class="form-control"
                                                        name="trailer_number" placeholder="Enter Trailer Number" value="{{old('trailer_number')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-6 col-12">
                                                <div class="mb-3 add-product">
                                                    <label class="form-label">Destination</label>
                                                    <input type="text" class="form-control" name="destination"
                                                        placeholder="Enter the Destination of the Truck">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="btn-addproduct mb-4">
                        <a href="{{ route('waybills') }}" class="btn btn-cancel me-2">Cancel</a>
                        <button type="submit" class="btn btn-submit" id="submit-btn" disabled>Save Waybill</button>
                    </div>
                </div>
            </form>
            <!-- /add -->

        </div>
    </div>
    <script>
        const openingInput = document.getElementById('opening');
        const closingInput = document.getElementById('closing');
        const varianceInput = document.getElementById('variance');
        const errorMessage = document.getElementById('error-message');
        const submitBtn = document.getElementById('submit-btn');

        // Function to calculate variance and validate
        function validateReadings() {
            const opening = parseFloat(openingInput.value);
            const closing = parseFloat(closingInput.value);

            // Check if both fields have valid values
            if (!isNaN(opening) && !isNaN(closing)) {
                const variance = closing - opening;

                // Set variance in the input field
                varianceInput.value = variance;

                // Check if variance is exactly 54000
                if (variance === 54000) {
                    errorMessage.style.display = 'none';
                    submitBtn.disabled = false;
                } else {
                    errorMessage.style.display = 'block';
                    submitBtn.disabled = true;
                }
            } else {
                varianceInput.value = '';
                errorMessage.style.display = 'none';
                submitBtn.disabled = true;
            }
        }
        openingInput.addEventListener('input', validateReadings);
        closingInput.addEventListener('input', validateReadings);
    </script>
@endsection
