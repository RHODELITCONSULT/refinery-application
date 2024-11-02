<?php $page = 'appearance'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content settings-content">
            <div class="page-header settings-pg-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Settings</h4>
                        <h6>Manage your settings on portal</h6>
                    </div>
                </div>
                <ul class="table-top-head">
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Refresh"><i data-feather="rotate-ccw"
                                class="feather-rotate-ccw"></i></a>
                    </li>
                    <li>
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Collapse" id="collapse-header"><i
                                data-feather="chevron-up" class="feather-chevron-up"></i></a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="settings-wrapper d-flex">
                        @component('components.settings-sidebar')
                        @endcomponent
                        <div class="settings-page-wrap">
                            <div class="setting-title">
                                <h4>Appearance</h4>
                            </div>
                            <div class="appearance-settings">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                        <div class="setting-info mb-4">
                                            <h6>Select Theme</h6>
                                            <p>Choose accent colour of website</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-12 col-md-8">
                                        <div class="theme-type-images d-flex align-items-center mb-4">
                                            <div class="theme-image">
                                                <div class="theme-image-set">
                                                    <img src="{{ URL::asset('/build/img/theme/theme-img-08.jpg') }}"
                                                        alt="">
                                                </div>
                                                <span>Light</span>
                                            </div>
                                            <div class="theme-image">
                                                <div class="theme-image-set">
                                                    <img src="{{ URL::asset('/build/img/theme/theme-img-09.jpg') }}"
                                                        alt="">
                                                </div>
                                                <span>Dark</span>
                                            </div>
                                            <div class="theme-image">
                                                <div class="theme-image-set">
                                                    <img src="{{ URL::asset('/build/img/theme/theme-img-10.jpg') }}"
                                                        alt="">
                                                </div>
                                                <span>Automatic</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                        <div class="setting-info mb-4">
                                            <h6>Accent Color</h6>
                                            <p>Choose accent colour of website</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                        <div class="theme-colors mb-4">
                                            <ul>
                                                <li>
                                                    <span class="themecolorset defaultcolor active"></span>
                                                </li>
                                                <li>
                                                    <span class="themecolorset theme-violet"></span>
                                                </li>
                                                <li>
                                                    <span class="themecolorset theme-blue"></span>
                                                </li>
                                                <li>
                                                    <span class="themecolorset theme-brown"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                        <div class="setting-info mb-4">
                                            <h6>Expand Sidebar</h6>
                                            <p>Choose accent colour of website</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                        <div
                                            class="status-toggle modal-status d-flex justify-content-between align-items-center ms-2">
                                            <input type="checkbox" id="user1" class="check" checked>
                                            <label for="user1" class="checktoggle"> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                        <div class="setting-info mb-4">
                                            <h6>Sidebar Size</h6>
                                            <p>Select size of the sidebar to display</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                        <div class="localization-select">
                                            <select class="select">
                                                <option>Small - 85px</option>
                                                <option>Large - 250px</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                        <div class="setting-info mb-4">
                                            <h6>Font Family</h6>
                                            <p>Select font family of website</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-12 col-md-4">
                                        <div class="localization-select">
                                            <select class="select">
                                                <option>Nunito</option>
                                                <option>Poppins</option>
                                            </select>
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
@endsection
