<?php $page = 'users'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.breadcrumb')
                @slot('title')
                    User List
                @endslot
                @slot('li_1')
                    Manage Users
                @endslot
                @slot('li_2')
                    Add New User
                @endslot
            @endcomponent


            {{-- ADD USER MODAL --}}
            <div class="modal fade" id="add_new_user">
                <div class="modal-dialog modal-lg modal-dialog-centered custom-modal-two">
                    <div class="modal-content">
                        <div class="page-wrapper-new p-0">
                            <div class="content">
                                <div class="modal-header border-0 custom-modal-header">
                                    <div class="page-title">
                                        <h4>Add User</h4>
                                    </div>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body custom-modal-body">
                                    <form action="{{ route('add-user') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-blocks">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" name="first_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-blocks">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-blocks">
                                                    <label>Phone</label>
                                                    <input type="text" name="phone_number" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="input-blocks">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-blocks">
                                                    <label>Role</label>
                                                    <select class="select" name="role">
                                                        <option>Choose</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="employee">Employee</option>
                                                    </select>
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

            {{-- EDIT USER MODAL --}}
            @foreach ($users as $user)
                <div class="modal fade" id="edit_new_user_{{ $user->id }}">
                    <div class="modal-dialog modal-lg modal-dialog-centered custom-modal-two">
                        <div class="modal-content">
                            <div class="page-wrapper-new p-0">
                                <div class="content">
                                    <div class="modal-header border-0 custom-modal-header">
                                        <div class="page-title">
                                            <h4>Edit User</h4>
                                        </div>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <form action="{{ route('edit-user', $user->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="input-blocks">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="first_name"
                                                            value="{{ $user->first_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-blocks">
                                                        <label>Last Name</label>
                                                        <input type="text" name="last_name" class="form-control"
                                                            value="{{ $user->last_name }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-blocks">
                                                        <label>Phone</label>
                                                        <input type="text" name="phone_number" class="form-control"
                                                            value="{{ $user->phone_number }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="input-blocks">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ $user->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="input-blocks">
                                                        <label>Role</label>
                                                        <select class="select" name="role">
                                                            <option>Choose</option>
                                                            <option {{ $user->role === 'admin' ? 'selected' : '' }}
                                                                value="admin">Admin</option>
                                                            <option {{ $user->role === 'employee' ? 'selected' : '' }}
                                                                value="employee">Employee</option>
                                                        </select>
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
            @endforeach
            {{-- DELETE CONFIRM MODAL --}}
            @foreach ($users as $user)
                <div class="modal fade" id="delete-user-{{ $user->id }}">
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
                                            <p>Do you really want to delete this user, This process cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer-btn delete-footer">
                                            <a href="" class="btn btn-cancel me-2"
                                                data-bs-dismiss="modal">Cancel</a>
                                            <a href="{{ route('delete-user', $user->id) }}"
                                                class="btn btn-submit">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($users as $user)
                <div class="modal fade" id="status_change_user_{{ $user->id }}">
                    <div class="modal-dialog modal-md modal-dialog-centered custom-modal-two">
                        <div class="modal-content">
                            <div class="page-wrapper-new p-0">
                                <div class="content">
                                    <div class="modal-header border-0 custom-modal-header">
                                        <div class="page-title">
                                            <h4>Add User</h4>
                                        </div>
                                        <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body custom-modal-body">
                                        <form action="{{ route('change-status', $user->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="input-blocks">
                                                        <label>Status</label>
                                                        <select class="select" name="role">
                                                            <option>Choose Status</option>
                                                            <option {{ $user->status === "active" ? 'selected' : '' }} value="active">Active</option>
                                                            <option {{  $user->status === "inactive" ? 'selected' : '' }} value="inactive">Inactive</option>
                                                        </select>
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
                    </div>
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>email</th>
                                    <th>Role</th>
                                    <th>Created On</th>
                                    <th>Status</th>
                                    <th class="no-sort">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ \Illuminate\Support\Str::title($user->first_name . ' ' . $user->last_name) }}
                                        </td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ \Illuminate\Support\Str::title($user->role) }}</td>
                                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $user->created_at)->format('d M, Y') }}
                                        </td>
                                        <td>
                                            @if ($user->status === 'active')
                                                <span class="badge badge-linesuccess">{{ 'Active' }}</span>
                                            @else
                                                <span class="badge badge-linedanger">{{ 'Inactive' }}</span>
                                            @endif
                                        </td>
                                        <td class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2 mb-0" data-bs-toggle="modal"
                                                    data-bs-target="#status_change_user_{{ $user->id }}">
                                                    <i data-feather="check" class="feather-edit"></i>
                                                </a>
                                                <a class="me-2 p-2 mb-0" data-bs-toggle="modal"
                                                    data-bs-target="#edit_new_user_{{ $user->id }}">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="deleteConfirmation p-2" href="javascript:void(0);" data-bs-toggle="modal"
                                                data-bs-target="#delete-user-{{ $user->id }}"
                                                data-bs-whatever="@fat">
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
