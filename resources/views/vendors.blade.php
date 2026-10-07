@extends('layouts.mainlayout')

@section('content')

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
    }

    .vendor-table {
        margin: 0;
        border: 0;
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
        min-width: 190px;
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

    .vendor-contact {
        color: #4f5562;
        font-size: 13px;
    }

    .vendor-contact i {
        width: 18px;
        color: var(--th-primary);
        margin-right: 4px;
    }

    .vendor-bio {
        max-width: 180px;
        color: var(--th-muted);
        line-height: 1.45;
    }

    .vendor-address {
        max-width: 190px;
        color: #5f6571;
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
       ACTION BUTTON
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
       CATEGORY DROPDOWN
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

    .vendor-empty h4 {
        margin: 0 0 6px;
        color: var(--th-text);
        font-size: 16px;
        font-weight: 700;
    }

    .vendor-empty p {
        margin: 0;
        color: var(--th-muted);
        font-size: 13px;
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 991px) {
        .vendor-table {
            min-width: 1050px;
        }

        .vendor-table-wrap {
            overflow-x: auto;
        }
    }

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
    }
</style>


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

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb vendor-breadcrumb">

                        <li class="breadcrumb-item">
                            <a href="#">
                                Home
                            </a>
                        </li>

                        <li class="breadcrumb-item active">
                            Vendors
                        </li>

                    </ol>

                </nav>

            </div>

        </div>

    </section>


    <!-- =====================================================
         MAIN CONTENT
         ===================================================== -->

    <section>

        <div class="container-fluid">


            <!-- =================================================
                 ALERTS
                 ================================================= -->

            @if(session('success'))

                <div class="alert alert-success th-alert alert-dismissible fade show">

                    <i class="fas fa-check-circle mr-2"></i>

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


            @if(session('error'))

                <div class="alert alert-danger th-alert alert-dismissible fade show">

                    <i class="fas fa-exclamation-circle mr-2"></i>

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


            @if($errors->any())

                <div class="alert alert-danger th-alert">

                    <strong>
                        Please check the following:
                    </strong>

                    <ul class="mb-0 mt-2">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- =================================================
                 VENDOR CARD
                 ================================================= -->

            <div class="vendor-card">


                <!-- CARD HEADER -->

                <div class="vendor-card-header">

                    <div class="vendor-card-title-wrap">

                        <div class="vendor-card-icon">
                            <i class="fas fa-store"></i>
                        </div>

                        <div>

                            <h2 class="vendor-card-title">

                                Vendor List

                                <span class="vendor-card-count">
                                    {{ $vendors->count() }}
                                </span>

                            </h2>

                        </div>

                    </div>


                    <button
                        type="button"
                        class="btn btn-th-primary"
                        data-toggle="modal"
                        data-target="#newVendorModal"
                    >

                        <i class="fas fa-plus"></i>

                        New Vendor

                    </button>

                </div>


                <!-- =================================================
                     TABLE
                     ================================================= -->

                <div class="vendor-table-wrap">

                    <table class="table vendor-table">

                        <thead>

                            <tr>

                                <th style="width:55px;">
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

                                <th style="width:90px;">
                                    Action
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($vendors as $vendor)

                                @php

                                    /*
                                     * service_id contains CATEGORY ID.
                                     *
                                     * We are reading the vendor's selected
                                     * categories so that their names can
                                     * be displayed in the vendor table.
                                     */

                                    $vendorCategoryIds = DB::table('vendor_services')
                                        ->where('vendor_id', $vendor->id)
                                        ->pluck('service_id')
                                        ->toArray();

                                    $vendorCategories = $categories
                                        ->whereIn('id', $vendorCategoryIds);

                                @endphp


                                <tr>

                                    <!-- NUMBER -->

                                    <td class="vendor-number">

                                        {{ $loop->iteration }}

                                    </td>


                                    <!-- VENDOR -->

                                    <td>

                                        <div class="vendor-profile">

                                            @if($vendor->logo)

                                                <img
                                                    src="{{ asset($vendor->logo) }}"
                                                    class="vendor-logo"
                                                    alt="{{ $vendor->vendor_name }}"
                                                >

                                            @else

                                                <div class="vendor-logo-placeholder">

                                                    <i class="fas fa-store"></i>

                                                </div>

                                            @endif


                                            <div>

                                                <div class="vendor-name">

                                                    {{ $vendor->vendor_name }}

                                                </div>

                                                <div class="vendor-id">

                                                    Vendor #{{ $vendor->id }}

                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    <!-- PHONE -->

                                    <td>

                                        <div class="vendor-contact">

                                            <i class="fas fa-phone-alt"></i>

                                            {{ $vendor->phone_number }}

                                        </div>

                                    </td>


                                    <!-- EMAIL -->

                                    <td>

                                        <div class="vendor-contact">

                                            <i class="far fa-envelope"></i>

                                            {{ $vendor->mail_id }}

                                        </div>

                                    </td>


                                    <!-- ADDRESS -->

                                    <td>

                                        <div class="vendor-address">

                                            {{ $vendor->address }}

                                        </div>

                                    </td>


                                    <!-- CATEGORIES -->

                                    <td>

                                        <div class="category-list">

                                            @forelse($vendorCategories as $category)

                                                <span class="category-badge">

                                                    {{ $category->category_name }}

                                                </span>

                                            @empty

                                                <span class="category-empty">

                                                    No categories

                                                </span>

                                            @endforelse

                                        </div>

                                    </td>


                                    <!-- BIO -->

                                    <td>

                                        <div class="vendor-bio">

                                            {{ \Illuminate\Support\Str::limit($vendor->bio, 70) }}

                                        </div>

                                    </td>


                                    <!-- ACTION -->

                                    <td>

                                        <button
                                            type="button"
                                            class="btn-edit-vendor"
                                            data-toggle="modal"
                                            data-target="#editVendorModal{{ $vendor->id }}"
                                        >

                                            <i class="fas fa-pen"></i>

                                            Edit

                                        </button>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="8"
                                        class="vendor-empty"
                                    >

                                        <div class="vendor-empty-icon">

                                            <i class="fas fa-store-slash"></i>

                                        </div>

                                        <h4>
                                            No vendors found
                                        </h4>

                                        <p>
                                            Start by adding your first vendor.
                                        </p>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                <!-- CARD FOOTER -->

                <div class="vendor-card-footer">

                    <span>
                        <i class="fas fa-users mr-1"></i>
                        {{ $vendors->count() }} vendor(s)
                    </span>

                    <span>
                        Vendor Management
                    </span>

                </div>

            </div>

        </div>

    </section>

</div>


<!-- =========================================================
     NEW VENDOR MODAL
     ========================================================= -->

<div
    class="modal fade vendor-modal"
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


                <!-- HEADER -->

                <div class="modal-header">

                    <h5
                        class="vendor-modal-title"
                        id="newVendorModalLabel"
                    >

                        <span class="modal-title-icon">

                            <i class="fas fa-store"></i>

                        </span>

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


                <!-- BODY -->

                <div class="modal-body">


                    <!-- BASIC INFORMATION -->

                    <div class="form-section">

                        <div class="form-section-title">

                            <i class="fas fa-user"></i>

                            Basic Information

                        </div>


                        <div class="row">

                            <div class="col-md-6">

                                <div class="vendor-form-group">

                                    <label>
                                        Vendor Name
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="vendor_name"
                                        class="vendor-form-control"
                                        value="{{ old('vendor_name') }}"
                                        placeholder="Enter vendor name"
                                        required
                                    >

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="vendor-form-group">

                                    <label>
                                        Phone Number
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="phone_number"
                                        class="vendor-form-control"
                                        value="{{ old('phone_number') }}"
                                        placeholder="10 digit phone number"
                                        maxlength="10"
                                        minlength="10"
                                        pattern="[0-9]{10}"
                                        inputmode="numeric"
                                        required
                                    >

                                    <small class="form-help">
                                        Enter exactly 10 digits.
                                    </small>

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="vendor-form-group">

                                    <label>
                                        Mail ID
                                        <span class="required">*</span>
                                    </label>

                                    <input
                                        type="email"
                                        name="mail_id"
                                        class="vendor-form-control"
                                        value="{{ old('mail_id') }}"
                                        placeholder="vendor@example.com"
                                        required
                                    >

                                </div>

                            </div>


                            <div class="col-md-6">

                                <div class="vendor-form-group">

                                    <label>
                                        Categories
                                        <span class="required">*</span>
                                    </label>


                                    <div class="dropdown category-picker">

                                        <button
                                            type="button"
                                            class="category-picker-button dropdown-toggle"
                                            data-toggle="dropdown"
                                            data-display="static"
                                        >

                                            <span class="category-picker-content">

                                                <i class="fas fa-tags category-picker-icon"></i>

                                                <span class="selected-category-summary">
                                                    Select categories
                                                </span>

                                            </span>

                                            <span class="selected-count">
                                                0
                                            </span>

                                        </button>


                                        <div
                                            class="dropdown-menu category-dropdown-menu"
                                        >

                                            @forelse($categories as $category)

                                                <label class="category-option">

                                                    <input
                                                        type="checkbox"
                                                        name="categories[]"
                                                        value="{{ $category->id }}"
                                                    >

                                                    <span>
                                                        {{ $category->category_name }}
                                                    </span>

                                                </label>

                                            @empty

                                                <div class="p-3 text-muted">
                                                    No categories available.
                                                </div>

                                            @endforelse

                                        </div>

                                    </div>

                                    <small class="form-help">
                                        Select one or more categories.
                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- LOCATION -->

                    <div class="form-section">

                        <div class="form-section-title">

                            <i class="fas fa-map-marker-alt"></i>

                            Location

                        </div>

                        <div class="vendor-form-group">

                            <label>
                                Address
                                <span class="required">*</span>
                            </label>

                            <textarea
                                name="address"
                                class="vendor-form-control"
                                rows="3"
                                placeholder="Enter complete vendor address"
                                required
                            >{{ old('address') }}</textarea>

                        </div>

                    </div>


                    <!-- ABOUT -->

                    <div class="form-section">

                        <div class="form-section-title">

                            <i class="fas fa-align-left"></i>

                            About Vendor

                        </div>

                        <div class="vendor-form-group">

                            <label>
                                Bio
                                <span class="required">*</span>
                            </label>

                            <textarea
                                name="bio"
                                class="vendor-form-control"
                                rows="4"
                                placeholder="Write a short description about this vendor"
                                required
                            >{{ old('bio') }}</textarea>

                        </div>

                    </div>


                    <!-- LOGO -->

                    <div class="form-section">

                        <div class="form-section-title">

                            <i class="fas fa-image"></i>

                            Vendor Logo

                        </div>

                        <div class="logo-upload-box">

                            <div class="vendor-form-group mb-0">

                                <label>
                                    Upload Logo
                                </label>

                                <input
                                    type="file"
                                    name="logo"
                                    class="vendor-form-control logo-upload-input"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >

                                <small class="form-help">
                                    JPG, JPEG, PNG or WEBP. Maximum 2 MB.
                                </small>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- FOOTER -->

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn-modal-cancel"
                        data-dismiss="modal"
                    >

                        Cancel

                    </button>


                    <button
                        type="submit"
                        class="btn-modal-save"
                    >

                        <i class="fas fa-save mr-1"></i>

                        Save New Record

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<!-- =========================================================
     EDIT VENDOR MODALS
     ========================================================= -->

@foreach($vendors as $vendor)

    @php

        $selectedCategoryIds = DB::table('vendor_services')
            ->where('vendor_id', $vendor->id)
            ->pluck('service_id')
            ->toArray();

    @endphp


    <div
        class="modal fade vendor-modal"
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


                    <!-- HEADER -->

                    <div class="modal-header">

                        <h5
                            class="vendor-modal-title"
                            id="editVendorModalLabel{{ $vendor->id }}"
                        >

                            <span class="modal-title-icon">

                                <i class="fas fa-pen"></i>

                            </span>

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


                    <!-- BODY -->

                    <div class="modal-body">


                        <!-- BASIC INFORMATION -->

                        <div class="form-section">

                            <div class="form-section-title">

                                <i class="fas fa-user"></i>

                                Basic Information

                            </div>


                            <div class="row">


                                <!-- NAME -->

                                <div class="col-md-6">

                                    <div class="vendor-form-group">

                                        <label>
                                            Vendor Name
                                            <span class="required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            name="vendor_name"
                                            class="vendor-form-control"
                                            value="{{ $vendor->vendor_name }}"
                                            placeholder="Enter vendor name"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- PHONE -->

                                <div class="col-md-6">

                                    <div class="vendor-form-group">

                                        <label>
                                            Phone Number
                                            <span class="required">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            name="phone_number"
                                            class="vendor-form-control"
                                            value="{{ $vendor->phone_number }}"
                                            placeholder="10 digit phone number"
                                            maxlength="10"
                                            minlength="10"
                                            pattern="[0-9]{10}"
                                            inputmode="numeric"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- EMAIL -->

                                <div class="col-md-6">

                                    <div class="vendor-form-group">

                                        <label>
                                            Mail ID
                                            <span class="required">*</span>
                                        </label>

                                        <input
                                            type="email"
                                            name="mail_id"
                                            class="vendor-form-control"
                                            value="{{ $vendor->mail_id }}"
                                            placeholder="vendor@example.com"
                                            required
                                        >

                                    </div>

                                </div>


                                <!-- CATEGORIES -->

                                <div class="col-md-6">

                                    <div class="vendor-form-group">

                                        <label>
                                            Categories
                                            <span class="required">*</span>
                                        </label>


                                        <div class="dropdown category-picker">

                                            <button
                                                type="button"
                                                class="category-picker-button dropdown-toggle"
                                                data-toggle="dropdown"
                                                data-display="static"
                                            >

                                                <span class="category-picker-content">

                                                    <i class="fas fa-tags category-picker-icon"></i>

                                                    <span class="selected-category-summary">

                                                        @if(count($selectedCategoryIds) > 0)

                                                            {{ count($selectedCategoryIds) }} categories selected

                                                        @else

                                                            Select categories

                                                        @endif

                                                    </span>

                                                </span>


                                                <span class="selected-count">

                                                    {{ count($selectedCategoryIds) }}

                                                </span>

                                            </button>


                                            <div class="dropdown-menu category-dropdown-menu">

                                                @forelse($categories as $category)

                                                    <label class="category-option">

                                                        <input
                                                            type="checkbox"
                                                            name="categories[]"
                                                            value="{{ $category->id }}"
                                                            {{ in_array($category->id, $selectedCategoryIds) ? 'checked' : '' }}
                                                        >

                                                        <span>
                                                            {{ $category->category_name }}
                                                        </span>

                                                    </label>

                                                @empty

                                                    <div class="p-3 text-muted">
                                                        No categories available.
                                                    </div>

                                                @endforelse

                                            </div>

                                        </div>


                                        <small class="form-help">
                                            Select one or more categories.
                                        </small>

                                    </div>

                                </div>


                            </div>

                        </div>


                        <!-- LOCATION -->

                        <div class="form-section">

                            <div class="form-section-title">

                                <i class="fas fa-map-marker-alt"></i>

                                Location

                            </div>


                            <div class="vendor-form-group">

                                <label>
                                    Address
                                    <span class="required">*</span>
                                </label>

                                <textarea
                                    name="address"
                                    class="vendor-form-control"
                                    rows="3"
                                    placeholder="Enter complete vendor address"
                                    required
                                >{{ $vendor->address }}</textarea>

                            </div>

                        </div>


                        <!-- ABOUT -->

                        <div class="form-section">

                            <div class="form-section-title">

                                <i class="fas fa-align-left"></i>

                                About Vendor

                            </div>


                            <div class="vendor-form-group">

                                <label>
                                    Bio
                                    <span class="required">*</span>
                                </label>

                                <textarea
                                    name="bio"
                                    class="vendor-form-control"
                                    rows="4"
                                    placeholder="Write a short description about this vendor"
                                    required
                                >{{ $vendor->bio }}</textarea>

                            </div>

                        </div>


                        <!-- LOGO -->

                        <div class="form-section">

                            <div class="form-section-title">

                                <i class="fas fa-image"></i>

                                Vendor Logo

                            </div>


                            <div class="logo-upload-box">

                                @if($vendor->logo)

                                    <label>
                                        Current Logo
                                    </label>

                                    <br>

                                    <img
                                        src="{{ asset($vendor->logo) }}"
                                        class="current-logo-preview"
                                        alt="{{ $vendor->vendor_name }}"
                                    >

                                @endif


                                <div class="vendor-form-group mb-0">

                                    <label>
                                        Change Logo
                                    </label>

                                    <input
                                        type="file"
                                        name="logo"
                                        class="vendor-form-control logo-upload-input"
                                        accept=".jpg,.jpeg,.png,.webp"
                                    >

                                    <small class="form-help">

                                        Leave empty to keep the current logo.

                                        JPG, JPEG, PNG or WEBP.
                                        Maximum 2 MB.

                                    </small>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- FOOTER -->

                    <div class="modal-footer">

                        <button
                            type="button"
                            class="btn-modal-cancel"
                            data-dismiss="modal"
                        >

                            Cancel

                        </button>


                        <button
                            type="submit"
                            class="btn-modal-save"
                        >

                            <i class="fas fa-save mr-1"></i>

                            Update Vendor

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

@endforeach


<!-- =========================================================
     CATEGORY DROPDOWN JAVASCRIPT
     ========================================================= -->

<script>

$(document).ready(function () {

    /*
     * Prevent Bootstrap dropdown from closing when
     * clicking a category checkbox.
     */
    $('.category-dropdown-menu').on('click', function (e) {

        e.stopPropagation();

    });


    /*
     * Update category count and text.
     */
    function updateCategoryPicker(dropdown) {

        var checked = dropdown
            .find('input[name="categories[]"]:checked');

        var count = checked.length;

        var button = dropdown
            .closest('.category-picker')
            .find('.category-picker-button');

        var summary = button
            .find('.selected-category-summary');

        var countBadge = button
            .find('.selected-count');


        countBadge.text(count);


        if (count === 0) {

            summary.text('Select categories');

            return;

        }


        var names = [];

        checked.each(function () {

            names.push(
                $(this)
                    .closest('.category-option')
                    .find('span')
                    .text()
                    .trim()
            );

        });


        if (count <= 2) {

            summary.text(
                names.join(', ')
            );

        } else {

            summary.text(
                count + ' categories selected'
            );

        }

    }


    /*
     * Initialize every category picker.
     */
    $('.category-picker').each(function () {

        updateCategoryPicker(
            $(this)
        );

    });


    /*
     * Update when category changes.
     */
    $(document).on(
        'change',
        '.category-picker input[name="categories[]"]',
        function () {

            updateCategoryPicker(
                $(this).closest('.category-picker')
            );

        }
    );


    /*
     * Automatically open the new vendor modal with
     * a clean category selection after closing.
     */
    $('#newVendorModal').on(
        'hidden.bs.modal',
        function () {

            $(this)
                .find('input[name="categories[]"]')
                .prop('checked', false);

            updateCategoryPicker(
                $(this).find('.category-picker')
            );

        }
    );


    /*
     * Remove focus from modal buttons after closing.
     */
    $('.vendor-modal').on(
        'hidden.bs.modal',
        function () {

            $('body').removeClass('modal-open');

        }
    );

});

</script>

@endsection