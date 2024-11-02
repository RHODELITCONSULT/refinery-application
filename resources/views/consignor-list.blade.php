<?php $page = 'users'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    Consignor List
                @endslot
                @slot('li_1')
                    Manage Your Consignors
                @endslot
                @slot('li_2')
                    Add New Consignor
                @endslot
            @endcomponent

            {{-- ADD NEW CONSIGNOR MODAL --}}
            <div class="modal fade" id="formmodal_consignor">
                <div class="modal-dialog modal-dialog-centered custom-modal-two">
                    <div class="modal-content">
                        <div class="page-wrapper-new p-0">
                            <div class="content">
                                <div class="modal-header border-0 custom-modal-header">
                                    <div class="page-title">
                                        <h4>Add Consignor</h4>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body custom-modal-body">
                                    <form action="{{ route('store-consignor') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="input-blocks">
                                                    <label>Consignor Name</label>
                                                    <input type="text" name="consignor_name" required
                                                        placeholder="Thomas">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-blocks">
                                                    <label>Contact Phone</label>
                                                    <input type="text" name="contact_phone" required
                                                        placeholder="233200000000">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-blocks">
                                                    <label>Contact Email</label>
                                                    <input type="email" name="contact_email" required
                                                        placeholder="example@example.com">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-0 input-blocks">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control mb-1" name="address" maxlength="100"></textarea>
                                                    <p>Maximum 200 Characters</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-blocks">
                                                    <label>City</label>
                                                    <div class="pass-group">
                                                        <input type="text" name="city" class="pass-input"
                                                            placeholder="Accra, Kumasi">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-blocks">
                                                    <label>Landmark</label>
                                                    <div class="pass-group">
                                                        <input type="text" name="landmark" class="pass-input"
                                                            placeholder="Oposite Police Station...">
                                                    </div>
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
            {{-- ADD NEW CONSIGNOR MODAL --}}

            {{-- UPDATE CONSIGNOR  --}}
            @foreach ($consignors as $consignor)
                <div class="modal fade" id="formmodal_consignor_edit_{{ $consignor->id }}">
                    <div class="modal-dialog modal-dialog-centered custom-modal-two">
                        <div class="modal-content">
                            <div class="page-wrapper-new p-0">
                                <div class="content">
                                    <div class="modal-header border-0 custom-modal-header">
                                        <div class="page-title">
                                            <h4>Add Consignor</h4>
                                        </div>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <form action="{{ route('update-consignor', $consignor->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="input-blocks">
                                                        <label>Consignor Name</label>
                                                        <input type="text" name="consignor_name"
                                                            value="{{ $consignor->consignor }}" placeholder="Thomas">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-blocks">
                                                        <label>Contact Phone</label>
                                                        <input type="text" name="contact_phone"
                                                            value="{{ $consignor->contact_number }}"
                                                            placeholder="233200000000">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="input-blocks">
                                                        <label>Contact Email</label>
                                                        <input type="email" name="contact_email"
                                                            value="{{ $consignor->contact_email }}"
                                                            placeholder="example@example.com">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mb-0 input-blocks">
                                                        <label class="form-label">Address</label>
                                                        <textarea class="form-control mb-1" name="address" maxlength="100"> {{ $consignor->address }}</textarea>
                                                        <p>Maximum 200 Characters</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-blocks">
                                                        <label>City</label>
                                                        <div class="pass-group">
                                                            <input type="text" name="city"
                                                                value="{{ $consignor->city }}" class="pass-input"
                                                                placeholder="Accra, Kumasi">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-blocks">
                                                        <label>Landmark</label>
                                                        <div class="pass-group">
                                                            <input type="text" name="landmark"
                                                                value="{{ $consignor->landmark }}" class="pass-input"
                                                                placeholder="Oposite Police Station...">
                                                        </div>
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
            {{-- END UPDATE CONSIGNOR  --}}

            {{-- CONSIGNOR DELETE --}}
            @foreach ($consignors as $consignor)
                <div class="modal fade" id="delete-note-{{ $consignor->id }}">
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
                                            <a href="{{ route('destroy-consignor', $consignor->id) }}"
                                                class="btn btn-submit">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- END CONSIGNOR DELETE --}}


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
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>Consignor</th>
                                    <th>Phone</th>
                                    <th>email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Added On</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($consignors as $consignor)
                                    <tr>
                                        <td>{{ $consignor->consignor }}</td>
                                        <td>{{ $consignor->contact_number }}</td>
                                        <td>{{$consignor->contact_email}}</td>
                                        <td>{{ $consignor->city }}</td>
                                        <td>{{ $consignor->address }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $consignor->created_at)->format('d M, Y') }}
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2 mb-0" data-bs-toggle="modal"
                                                    data-bs-target="#formmodal_consignor_edit_{{ $consignor->id }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="me-2 p-2 mb-0" data-bs-toggle="modal" data-bs-target="#delete-note-{{ $consignor->id }}">
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
