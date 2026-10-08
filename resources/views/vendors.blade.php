@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <style>
        /* =========================================================
           THYO HAR - VENDOR PAGE DESIGN SYSTEM
           ========================================================= */

        :root {
            --th-primary: #5b35d5;
            --th-primary-dark: #4725b5;
            --th-primary-soft: #f0ebff;
            --th-bg: #f6f7fb;
            --th-card: #ffffff;
            --th-text: #20242d;
            --th-muted: #7b8190;
            --th-border: #e8eaf0;
            --th-success: #1fa774;
            --th-danger: #e05252;
            --th-warning: #f0a52b;
            --th-radius: 16px;
            --th-shadow: 0 8px 30px rgba(31, 35, 50, 0.07);
        }


        /* =========================================================
           PAGE
           ========================================================= */

        .vendor-page {
            background: var(--th-bg);
            min-height: calc(100vh - 57px);
            padding-bottom: 35px;
        }


        /* =========================================================
           PAGE HEADER
           ========================================================= */

        .vendor-page-header {
            padding: 28px 0 22px;
        }

        .vendor-page-header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }

        .vendor-page-title {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: var(--th-text);
            letter-spacing: -0.5px;
        }

        .vendor-page-subtitle {
            margin: 6px 0 0;
            color: var(--th-muted);
            font-size: 14px;
        }

        .vendor-breadcrumb {
            background: transparent;
            margin: 0;
            padding: 0;
            font-size: 13px;
        }

        .vendor-breadcrumb a {
            color: var(--th-primary);
            font-weight: 600;
        }

        .vendor-breadcrumb .active {
            color: var(--th-muted);
        }


        /* =========================================================
           PRIMARY BUTTON
           ========================================================= */

        .btn-th-primary {
            border: 0;
            border-radius: 11px;
            background: linear-gradient(
                135deg,
                var(--th-primary),
                #7654e6
            );
            color: #fff !important;
            font-weight: 600;
            padding: 11px 18px;
            box-shadow: 0 6px 18px rgba(91, 53, 213, 0.22);
            transition: all .2s ease;
        }

        .btn-th-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 9px 22px rgba(91, 53, 213, 0.28);
        }

        .btn-th-primary i {
            margin-right: 6px;
        }


        /* =========================================================
           ALERTS
           ========================================================= */

        .th-alert {
            border: 0;
            border-radius: 12px;
            margin-bottom: 20px;
            padding: 13px 16px;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
        }

        .th-alert ul {
            padding-left: 20px;
        }


        /* =========================================================
           MAIN CARD
           ========================================================= */

        .vendor-card {
            background: var(--th-card);
            border: 1px solid var(--th-border);
            border-radius: var(--th-radius);
            box-shadow: var(--th-shadow);
            overflow: hidden;
        }

        .vendor-card-header {
            padding: 20px 22px;
            border-bottom: 1px solid var(--th-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
        }

        .vendor-card-title-wrap {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .vendor-card-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: var(--th-primary-soft);
            color: var(--th-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .vendor-card-title {
            margin: 0;
            color: var(--th-text);
            font-size: 18px;
            font-weight: 700;
        }

        .vendor-card-count {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 28px;
            height: 25px;
            padding: 0 8px;
            margin-left: 6px;
            background: var(--th-primary-soft);
            color: var(--th-primary);
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
        }


        /* =========================================================
           TABLE
           ========================================================= */

        .vendor-table-wrap {
            padding: 0;
            overflow-x: auto;
        }

        .vendor-table {
            margin: 0;
            border: 0;
            min-width: 1100px;
        }

        .vendor-table thead th {
            background: #fafbfe;
            border-top: 0;
            border-bottom: 1px solid var(--th-border);
            color: #666c79;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .6px;
            padding: 15px 16px;
            white-space: nowrap;
        }

        .vendor-table tbody td {
            border-top: 1px solid #f0f1f5;
            padding: 15px 16px;
            vertical-align: middle;
            color: var(--th-text);
            font-size: 13px;
        }

        .vendor-table tbody tr {
            transition: background .18s ease;
        }

        .vendor-table tbody tr:hover {
            background: #fafaff;
        }

        .vendor-number {
            color: var(--th-muted);
            font-weight: 700;
            width: 45px;
        }


        /* =========================================================
           VENDOR PROFILE
           ========================================================= */

        .vendor-profile {
            display: flex;
            align-items: center;
            min-width: 210px;
            gap: 11px;
        }

        .vendor-logo {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            object-fit: cover;
            border: 1px solid var(--th-border);
            background: #f8f9fc;
            flex-shrink: 0;
        }

        .vendor-logo-placeholder {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: var(--th-primary-soft);
            color: var(--th-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
            flex-shrink: 0;
        }

        .vendor-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--th-text);
            margin-bottom: 2px;
        }

        .vendor-id {
            font-size: 11px;
            color: var(--th-muted);
        }


        /* =========================================================
           CONTACT
           ========================================================= */

        .vendor-contact {
            color: #4f5562;
            font-size: 13px;
            white-space: nowrap;
        }

        .vendor-contact i {
            width: 18px;
            color: var(--th-primary);
            margin-right: 4px;
        }


        /* =========================================================
           ADDRESS
           ========================================================= */

        .vendor-address {
            max-width: 190px;
            color: #5f6571;
            line-height: 1.45;
        }


        /* =========================================================
           BIO
           ========================================================= */

        .vendor-bio {
            max-width: 180px;
            color: var(--th-muted);
            line-height: 1.45;
        }


        /* =========================================================
           CATEGORY BADGES
           ========================================================= */

        .category-list {
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
            min-width: 160px;
        }

        .category-badge {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 20px;
            background: var(--th-primary-soft);
            color: var(--th-primary);
            font-size: 11px;
            font-weight: 600;
            white-space: nowrap;
        }

        .category-empty {
            color: #a1a5ae;
            font-size: 12px;
        }


        /* =========================================================
           EDIT BUTTON
           ========================================================= */

        .btn-edit-vendor {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 0;
            border-radius: 9px;
            padding: 8px 12px;
            background: #edf3ff;
            color: #3d73c9;
            font-size: 12px;
            font-weight: 700;
            transition: all .18s ease;
        }

        .btn-edit-vendor:hover {
            background: #dfeaff;
            color: #285ca9;
            transform: translateY(-1px);
        }


        /* =========================================================
           CARD FOOTER
           ========================================================= */

        .vendor-card-footer {
            border-top: 1px solid var(--th-border);
            padding: 14px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: var(--th-muted);
            font-size: 12px;
        }


        /* =========================================================
           MODAL
           ========================================================= */

        .vendor-modal .modal-dialog {
            max-width: 820px;
        }

        .vendor-modal .modal-content {
            border: 0;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 25px 70px rgba(21, 24, 35, .25);
        }

        .vendor-modal .modal-header {
            padding: 20px 24px;
            background: linear-gradient(
                135deg,
                #faf9ff,
                #ffffff
            );
            border-bottom: 1px solid var(--th-border);
        }

        .vendor-modal-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
            color: var(--th-text);
            font-size: 18px;
            font-weight: 700;
        }

        .modal-title-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: var(--th-primary-soft);
            color: var(--th-primary);
        }

        .vendor-modal .close {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: #f2f3f6;
            color: #626773;
            opacity: 1;
            font-size: 20px;
            transition: all .2s ease;
        }

        .vendor-modal .close:hover {
            background: #e8e9ee;
        }

        .vendor-modal .modal-body {
            padding: 25px;
            max-height: 70vh;
            overflow-y: auto;
        }


        /* =========================================================
           FORM SECTIONS
           ========================================================= */

        .form-section {
            margin-bottom: 24px;
        }

        .form-section:last-child {
            margin-bottom: 0;
        }

        .form-section-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
            color: var(--th-text);
            font-size: 14px;
            font-weight: 700;
        }

        .form-section-title i {
            color: var(--th-primary);
        }

        .vendor-form-group {
            margin-bottom: 17px;
        }

        .vendor-form-group label {
            display: block;
            margin-bottom: 7px;
            color: #414650;
            font-size: 12px;
            font-weight: 700;
        }

        .vendor-form-control {
            width: 100%;
            min-height: 43px;
            border: 1px solid #dfe2e9;
            border-radius: 10px;
            background: #fff;
            color: #252933;
            padding: 10px 13px;
            font-size: 13px;
            transition: all .18s ease;
            outline: none;
        }

        .vendor-form-control:focus {
            border-color: var(--th-primary);
            box-shadow: 0 0 0 3px rgba(91, 53, 213, .09);
        }

        textarea.vendor-form-control {
            min-height: 100px;
            resize: vertical;
        }

        .form-help {
            display: block;
            margin-top: 6px;
            color: #9297a2;
            font-size: 11px;
        }

        .required {
            color: var(--th-danger);
        }


        /* =========================================================
           CATEGORY MULTI SELECT
           ========================================================= */

        .category-picker {
            position: relative;
        }

        .category-picker-button {
            width: 100%;
            min-height: 43px;
            border: 1px solid #dfe2e9;
            border-radius: 10px;
            background: #fff;
            padding: 8px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-align: left;
            color: #555b67;
            font-size: 13px;
        }

        .category-picker-button:hover,
        .category-picker-button:focus {
            border-color: var(--th-primary);
            outline: none;
        }

        .category-picker-content {
            display: flex;
            align-items: center;
            gap: 7px;
            overflow: hidden;
        }

        .category-picker-icon {
            color: var(--th-primary);
            flex-shrink: 0;
        }

        .selected-category-summary {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .category-dropdown-menu {
            width: 100%;
            max-height: 270px;
            overflow-y: auto;
            padding: 8px;
            border: 1px solid var(--th-border);
            border-radius: 12px;
            box-shadow: 0 12px 30px rgba(25, 28, 40, .13);
        }

        .category-option {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 9px 10px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            color: #3e434d;
            transition: background .15s ease;
        }

        .category-option:hover {
            background: var(--th-primary-soft);
        }

        .category-option input {
            accent-color: var(--th-primary);
            width: 15px;
            height: 15px;
        }

        .category-option span {
            flex: 1;
        }

        .selected-count {
            background: var(--th-primary);
            color: #fff;
            border-radius: 20px;
            padding: 2px 7px;
            font-size: 10px;
            font-weight: 700;
        }


        /* =========================================================
           LOGO UPLOAD
           ========================================================= */

        .logo-upload-box {
            border: 1px dashed #d7dae3;
            border-radius: 12px;
            background: #fafbfe;
            padding: 15px;
        }

        .current-logo-preview {
            width: 85px;
            height: 85px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid var(--th-border);
            background: #fff;
            margin-bottom: 10px;
        }

        .logo-upload-input {
            background: #fff;
        }


        /* =========================================================
           MODAL FOOTER
           ========================================================= */

        .vendor-modal .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--th-border);
            background: #fafbfe;
        }

        .btn-modal-cancel {
            border: 1px solid #dfe2e9;
            background: #fff;
            color: #626773;
            border-radius: 10px;
            padding: 9px 16px;
            font-weight: 600;
        }

        .btn-modal-save {
            border: 0;
            border-radius: 10px;
            padding: 10px 18px;
            background: linear-gradient(
                135deg,
                var(--th-primary),
                #7654e6
            );
            color: #fff;
            font-weight: 700;
            box-shadow: 0 5px 15px rgba(91, 53, 213, .2);
        }

        .btn-modal-save:hover {
            color: #fff;
        }


        /* =========================================================
           EMPTY STATE
           ========================================================= */

        .vendor-empty {
            padding: 60px 20px !important;
            text-align: center;
        }

        .vendor-empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 15px;
            border-radius: 18px;
            background: var(--th-primary-soft);
            color: var(--th-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

    <!-- =====================================================
         CONTENT HEADER
         ===================================================== -->

    <section class="content-header">

        .vendor-empty h4 {
            margin: 0 0 6px;
            color: var(--th-text);
            font-size: 16px;
            font-weight: 700;
        }

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Vendors</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

        @media (max-width: 767px) {

            .vendor-page-header {
                padding-top: 20px;
            }

            .vendor-page-title {
                font-size: 23px;
            }

            .vendor-modal .modal-body {
                padding: 18px;
            }

            .vendor-modal .modal-header,
            .vendor-modal .modal-footer {
                padding: 16px 18px;
            }

            .vendor-card-header {
                padding: 17px;
            }
        }
    </style>


    <!-- =========================================================
         VENDOR PAGE
         ========================================================= -->

    <div class="vendor-page">


        <!-- =====================================================
             PAGE HEADER
             ===================================================== -->

        <section class="vendor-page-header">

            <div class="container-fluid">

                <div class="vendor-page-header-inner">

                    <div>

                        <h1 class="vendor-page-title">
                            Vendors
                        </h1>

                        <p class="vendor-page-subtitle">
                            Manage vendors, profiles and their service categories.
                        </p>

                </div>

            </div>

        </section>


        <!-- =====================================================
             MAIN CONTENT
             ===================================================== -->

    <section class="content">

            <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">


                        <!-- =================================================
                             CARD HEADER
                             ================================================= -->

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h3 class="card-title">
                                Vendor List
                            </h3>


                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#newVendorModal"
                            >

                                <i class="fas fa-plus"></i>

                                New Vendor

                            </button>

                        </div>


                        <!-- =================================================
                             SUCCESS MESSAGE
                             ================================================= -->

                        @if(session('success'))

                            <div class="alert alert-success alert-dismissible fade show m-3">

                                {{ session('success') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                >

                                    <span>&times;</span>

                                </button>

                            </div>

                        @endif


                        <!-- =================================================
                             ERROR MESSAGE
                             ================================================= -->

                        @if(session('error'))

                            <div class="alert alert-danger alert-dismissible fade show m-3">

                                {{ session('error') }}

                                <button
                                    type="button"
                                    class="close"
                                    data-dismiss="alert"
                                >

                                    <span>&times;</span>

                                </button>

                            </div>

                        @endif


                        <!-- =================================================
                             VALIDATION ERRORS
                             ================================================= -->

                        @if($errors->any())

                            <div class="alert alert-danger m-3">

                                <ul class="mb-0">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        @endif


                        <!-- =================================================
                             VENDOR TABLE
                             ================================================= -->

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover">

                                    <thead>

                                        <tr>

                                            <th style="width:60px;">
                                                #
                                            </th>

                                            <th>
                                                Vendor
                                            </th>

                                            <th>
                                                Contact
                                            </th>

                                            <th>
                                                Email
                                            </th>

                                            <th>
                                                Address
                                            </th>

                                            <th>
                                                Categories
                                            </th>

                                            <th>
                                                Bio
                                            </th>

                                            <th style="width:120px;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>

                            <thead>

                                    <tbody>

                                        @forelse($vendors->sortBy('id')->values() as $vendor)

                                            @php

                                                $vendorCategoryIds = DB::table('vendor_services')
                                                    ->where('vendor_id', $vendor->id)
                                                    ->pluck('service_id')
                                                    ->toArray();

                                                $vendorCategories = $categories
                                                    ->whereIn('id', $vendorCategoryIds);

                                            @endphp


                                            <tr>


                                                <!-- NUMBER -->

                                                <td>

                                                    {{ $loop->iteration }}

                                                </td>


                                                <!-- VENDOR -->

                                                <td>

                                                    <div class="d-flex align-items-center">

                                                        @if($vendor->logo)

                                                            <img
                                                                src="{{ asset($vendor->logo) }}"
                                                                alt="{{ $vendor->vendor_name }}"
                                                                style="
                                                                    width:40px;
                                                                    height:40px;
                                                                    object-fit:cover;
                                                                    border-radius:6px;
                                                                    margin-right:10px;
                                                                "
                                                            >

                                                        @else

                                                            <i
                                                                class="fas fa-store mr-2"
                                                                style="font-size:20px;"
                                                            ></i>

                                                        @endif


                                                        <div>

                                                            <strong>
                                                                {{ $vendor->vendor_name }}
                                                            </strong>

                                                            <br>

                                                            <small class="text-muted">
                                                                Vendor #{{ $vendor->id }}
                                                            </small>

                                                        </div>

                                                    </div>

                                                </td>


                                                <!-- CONTACT -->

                                                <td>

                                                    <i class="fas fa-phone-alt mr-1"></i>

                                                    {{ $vendor->phone_number }}

                                                </td>


                                                <!-- EMAIL -->

                                                <td>

                                                    <i class="far fa-envelope mr-1"></i>

                                                    {{ $vendor->mail_id }}

                                                </td>


                                                <!-- ADDRESS -->

                                                <td>

                                                    {{ $vendor->address }}

                                                </td>


                                                <!-- CATEGORIES -->

                                                <td>

                                                    @forelse($vendorCategories as $category)

                                                        <span class="badge badge-primary mr-1">

                                                            {{ $category->category_name }}

                                                        </span>

                                                    @empty

                                                        <span class="text-muted">

                                                            No categories

                                                        </span>

                                                    @endforelse

                                                </td>


                                                <!-- BIO -->

                                                <td>

                                                    {{ \Illuminate\Support\Str::limit($vendor->bio, 70) }}

                                                </td>


                                                <!-- ACTION -->

                                                <td class="text-center">

                                                    <button
                                                        type="button"
                                                        class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editVendorModal{{ $vendor->id }}"
                                                    >

                                                        <i class="fas fa-edit"></i>

                                                    </button>

                                                </td>

                                            </tr>


                                            <!-- =================================================
                                                 EDIT VENDOR MODAL
                                                 ================================================= -->

                                            <div
                                                class="modal fade"
                                                id="editVendorModal{{ $vendor->id }}"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="editVendorModalLabel{{ $vendor->id }}"
                                                aria-hidden="true"
                                            >

                                                <div
                                                    class="modal-dialog modal-lg"
                                                    role="document"
                                                >

                                                    <form
                                                        action="{{ route('vendors.update', $vendor->id) }}"
                                                        method="POST"
                                                        enctype="multipart/form-data"
                                                    >

                                                        @csrf

                                                        @method('PUT')


                                                        <div class="modal-content">


                                                            <!-- MODAL HEADER -->

                                                            <div class="modal-header">

                                                                <h5
                                                                    class="modal-title"
                                                                    id="editVendorModalLabel{{ $vendor->id }}"
                                                                >

                                                                    <i class="fas fa-edit"></i>

                                                                    Edit Vendor

                                                                </h5>


                                                                <button
                                                                    type="button"
                                                                    class="close"
                                                                    data-dismiss="modal"
                                                                >

                                                                    <span>&times;</span>

                                                                </button>

                                                            </div>


                                                            <!-- MODAL BODY -->

                                                            <div class="modal-body">


                                                                <!-- VENDOR NAME -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Vendor Name

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <input
                                                                        type="text"
                                                                        name="vendor_name"
                                                                        class="form-control"
                                                                        value="{{ $vendor->vendor_name }}"
                                                                        placeholder="Enter vendor name"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- PHONE -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Phone Number

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <input
                                                                        type="text"
                                                                        name="phone_number"
                                                                        class="form-control"
                                                                        value="{{ $vendor->phone_number }}"
                                                                        maxlength="10"
                                                                        minlength="10"
                                                                        pattern="[0-9]{10}"
                                                                        inputmode="numeric"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- EMAIL -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Mail ID

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <input
                                                                        type="email"
                                                                        name="mail_id"
                                                                        class="form-control"
                                                                        value="{{ $vendor->mail_id }}"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- CATEGORIES -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Categories

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <div
                                                                        style="
                                                                            border:1px solid #ced4da;
                                                                            border-radius:.25rem;
                                                                            padding:10px;
                                                                            max-height:200px;
                                                                            overflow-y:auto;
                                                                        "
                                                                    >

                                                                        @forelse($categories as $category)

                                                                            <div class="custom-control custom-checkbox">

                                                                                <input
                                                                                    type="checkbox"
                                                                                    class="custom-control-input"
                                                                                    id="edit_category_{{ $vendor->id }}_{{ $category->id }}"
                                                                                    name="categories[]"
                                                                                    value="{{ $category->id }}"
                                                                                    {{ in_array($category->id, $vendorCategoryIds) ? 'checked' : '' }}
                                                                                >

                                                                                <label
                                                                                    class="custom-control-label"
                                                                                    for="edit_category_{{ $vendor->id }}_{{ $category->id }}"
                                                                                >

                                                                                    {{ $category->category_name }}

                                                                                </label>

                                                                            </div>

                                                                        @empty

                                                                            <span class="text-muted">

                                                                                No categories available.

                                                                            </span>

                                                                        @endforelse

                                                                    </div>

                                                                </div>


                                                                <!-- ADDRESS -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Address

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <textarea
                                                                        name="address"
                                                                        class="form-control"
                                                                        rows="3"
                                                                        required
                                                                    >{{ $vendor->address }}</textarea>

                                                                </div>


                                                                <!-- BIO -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Bio

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>

                                                                    <textarea
                                                                        name="bio"
                                                                        class="form-control"
                                                                        rows="4"
                                                                        required
                                                                    >{{ $vendor->bio }}</textarea>

                                                                </div>


                                                                <!-- CURRENT LOGO -->

                                                                @if($vendor->logo)

                                                                    <div class="form-group">

                                                                        <label>
                                                                            Current Logo
                                                                        </label>

                                                                        <br>

                                                                        <img
                                                                            src="{{ asset($vendor->logo) }}"
                                                                            alt="{{ $vendor->vendor_name }}"
                                                                            style="
                                                                                width:80px;
                                                                                height:80px;
                                                                                object-fit:cover;
                                                                                border-radius:6px;
                                                                            "
                                                                        >

                                                                    </div>

                                                                @endif


                                                                <!-- NEW LOGO -->

                                                                <div class="form-group">

                                                                    <label>
                                                                        Change Logo
                                                                    </label>

                                                                    <input
                                                                        type="file"
                                                                        name="logo"
                                                                        class="form-control"
                                                                        accept=".jpg,.jpeg,.png,.webp"
                                                                    >

                                                                    <small class="text-muted">

                                                                        Leave empty to keep the current logo.

                                                                    </small>

                                                                </div>

                                                            </div>


                                                            <!-- MODAL FOOTER -->

                                                            <div class="modal-footer">

                                                                <button
                                                                    type="button"
                                                                    class="btn btn-secondary"
                                                                    data-dismiss="modal"
                                                                >

                                                                    Close

                                                                </button>


                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-primary"
                                                                >

                                                                    <i class="fas fa-save"></i>

                                                                    Update Vendor

                                                                </button>

                                                            </div>

                                                        </div>

                                                    </form>

                                                </div>

                                            </div>


                                        @empty

                                            <tr>

                                                <td
                                                    colspan="8"
                                                    class="text-center text-muted"
                                                >

                                                    No vendors found.

                                                </td>

                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>


                        <!-- =================================================
                             CARD FOOTER
                             ================================================= -->

                        <div class="card-footer clearfix">

                            <span class="text-muted">

                                Total Vendors:

                                {{ $vendors->count() }}

                            </span>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- =========================================================
     ADD NEW VENDOR MODAL
     ========================================================= -->

<div
    class="modal fade"
    id="newVendorModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newVendorModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >

        <form
            action="{{ route('vendors.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf


            <div class="modal-content">


                <!-- MODAL HEADER -->

                <div class="modal-header">

                    <h5
                        class="modal-title"
                        id="newVendorModalLabel"
                    >

                        <i class="fas fa-store"></i>

                        Add New Vendor

                    </h5>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>&times;</span>

                    </button>

                </div>


                <!-- MODAL BODY -->

                <div class="modal-body">


                    <!-- VENDOR NAME -->

                    <div class="form-group">

                        <label>

                            Vendor Name

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            name="vendor_name"
                            class="form-control"
                            value="{{ old('vendor_name') }}"
                            placeholder="Enter vendor name"
                            required
                        >

                    </div>


                    <!-- PHONE -->

                    <div class="form-group">

                        <label>

                            Phone Number

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <input
                            type="text"
                            name="phone_number"
                            class="form-control"
                            value="{{ old('phone_number') }}"
                            placeholder="10 digit phone number"
                            maxlength="10"
                            minlength="10"
                            pattern="[0-9]{10}"
                            inputmode="numeric"
                            required
                        >

                    </div>


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label>

                            Mail ID

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <input
                            type="email"
                            name="mail_id"
                            class="form-control"
                            value="{{ old('mail_id') }}"
                            placeholder="vendor@example.com"
                            required
                        >

                    </div>


                    <!-- CATEGORIES -->

                    <div class="form-group">

                        <label>

                            Categories

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <div
                            style="
                                border:1px solid #ced4da;
                                border-radius:.25rem;
                                padding:10px;
                                max-height:200px;
                                overflow-y:auto;
                            "
                        >

                            @forelse($categories as $category)

                                <div class="custom-control custom-checkbox">

                                    <input
                                        type="checkbox"
                                        class="custom-control-input"
                                        id="new_category_{{ $category->id }}"
                                        name="categories[]"
                                        value="{{ $category->id }}"
                                    >

                                    <label
                                        class="custom-control-label"
                                        for="new_category_{{ $category->id }}"
                                    >

                                        {{ $category->category_name }}

                                    </label>

                                </div>

                            @empty

                                <span class="text-muted">

                                    No categories available.

                                </span>

                            @endforelse

                        </div>

                    </div>


                    <!-- ADDRESS -->

                    <div class="form-group">

                        <label>

                            Address

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <textarea
                            name="address"
                            class="form-control"
                            rows="3"
                            placeholder="Enter complete vendor address"
                            required
                        >{{ old('address') }}</textarea>

                    </div>


                    <!-- BIO -->

                    <div class="form-group">

                        <label>

                            Bio

                            <span class="text-danger">
                                *
                            </span>

                        </label>

                        <textarea
                            name="bio"
                            class="form-control"
                            rows="4"
                            placeholder="Write a short description about this vendor"
                            required
                        >{{ old('bio') }}</textarea>

                    </div>


                    <!-- LOGO -->

                    <div class="form-group">

                        <label>
                            Upload Logo
                        </label>

                        <input
                            type="file"
                            name="logo"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp"
                        >

                        <small class="text-muted">

                            JPG, JPEG, PNG or WEBP. Maximum 2 MB.

                        </small>

                    </div>

                </div>


                <!-- MODAL FOOTER -->

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal"
                    >

                        Close

                    </button>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="fas fa-save"></i>

                        Save Vendor

                    </button>

                </div>

            </div>

        </section>

    </div>

</div>

@endsection