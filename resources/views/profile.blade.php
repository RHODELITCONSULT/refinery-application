<?php $page = 'profile'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Profile</h4>
                    <h6>User Profile</h6>
                </div>
            </div>
            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <div class="profile-set">
                        <div class="profile-head">

                        </div>
                        <div class="profile-top">
                            <div class="profile-content">
                                <div class="profile-contentimg">
                                    <img src="{{ URL::asset('/build/img/customer/customer5.jpg') }}" alt="img"
                                        id="blah">
                                    {{-- <div class="profileupload">
                                        <input type="file" id="imgInp">
                                        <a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/build/img/icons/edit-set.svg') }}" alt="img"></a>
                                    </div> --}}
                                </div>
                                <div class="profile-contentname">
                                    <h2>{{ Auth::guard("web")->user()->first_name." ".Auth::guard("web")->user()->last_name }}</h2>
                                    <h4>Update Your Personal Details.</h4>
                                </div>
                            </div>
                            <!-- <div class="ms-auto">
                                <a href="javascript:void(0);" class="btn btn-submit me-2">Save</a>
                                <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
                            </div> -->
                        </div>
                    </div>
                    <form action="{{ route("profile-update") }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::guard("web")->user()->first_name }}" name="first_name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::guard("web")->user()->last_name }}" name="last_name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ Auth::guard("web")->user()->email }}">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone_number" value="{{ Auth::guard("web")->user()->phone_number }}" class="form-control" name="phone_number">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-submit me-2">Save Details</button>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route("change-password") }}" method="POST">
                        @csrf
                        <div class="row">
                            <h6 class="text-primary" style="margin: 15px 0">Change Password</h6>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label class="form-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password" class="pass-input form-control">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="input-blocks">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="pass-group">
                                        <input type="password" name="password_confirmation" class="pass-input form-control">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-submit me-2">Change Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
