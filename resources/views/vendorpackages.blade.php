@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- ===================================================== -->
    <!-- CONTENT HEADER -->
    <!-- ===================================================== -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Vendor Packages</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Vendor Packages
                        </li>

                    </ol>

                </div>

            </div>

        </div>

    </section>


    <!-- ===================================================== -->
    <!-- MAIN CONTENT -->
    <!-- ===================================================== -->

    <section class="content">

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">


                        <!-- ================================================= -->
                        <!-- CARD HEADER -->
                        <!-- ================================================= -->

                        <div class="card-header d-flex justify-content-between align-items-center">

                            <h3 class="card-title">
                                Vendor Package List
                            </h3>


                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#newPackageModal"
                            >

                                <i class="fas fa-plus"></i>

                                New Package

                            </button>

                        </div>



                        <!-- ================================================= -->
                        <!-- SUCCESS MESSAGE -->
                        <!-- ================================================= -->

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



                        <!-- ================================================= -->
                        <!-- ERROR MESSAGE -->
                        <!-- ================================================= -->

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



                        <!-- ================================================= -->
                        <!-- VALIDATION ERRORS -->
                        <!-- ================================================= -->

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



                        <!-- ================================================= -->
                        <!-- PACKAGE TABLE -->
                        <!-- ================================================= -->

                        <div class="card-body">

                            <div class="table-responsive">

                                <table
                                    class="table table-bordered table-striped table-hover"
                                >

                                    <thead>

                                        <tr>

                                            <th style="width: 60px;">
                                                #
                                            </th>

                                            <th>
                                                Package Name
                                            </th>

                                            <th>
                                                Service ID
                                            </th>

                                            <th>
                                                Package Bio
                                            </th>

                                            <th>
                                                Package Amount
                                            </th>

                                            <th>
                                                Offer Price
                                            </th>

                                            <th style="width: 120px;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>


                                        @forelse($vendorpackages->sortBy('id')->values() as $vendorpackage)


                                            <tr>


                                                <!-- ================================= -->
                                                <!-- DISPLAY NUMBER -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $loop->iteration }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- PACKAGE NAME -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $vendorpackage->package_name }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- SERVICE ID -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $vendorpackage->service_id }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- PACKAGE BIO -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $vendorpackage->package_bio }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- PACKAGE AMOUNT -->
                                                <!-- ================================= -->

                                                <td>

                                                    ₹ {{ number_format($vendorpackage->package_amount, 2) }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- OFFER PRICE -->
                                                <!-- ================================= -->

                                                <td>

                                                    @if($vendorpackage->package_offer_price !== null && $vendorpackage->package_offer_price !== '')

                                                        ₹ {{ number_format($vendorpackage->package_offer_price, 2) }}

                                                    @else

                                                        <span class="text-muted">
                                                            No Offer
                                                        </span>

                                                    @endif

                                                </td>



                                                <!-- ================================= -->
                                                <!-- ACTION -->
                                                <!-- ================================= -->

                                                <td class="text-center">


                                                    <!-- EDIT BUTTON -->

                                                    <button
                                                        type="button"
                                                        class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editPackageModal{{ $vendorpackage->id }}"
                                                    >

                                                        <i class="fas fa-edit"></i>

                                                        Edit

                                                    </button>


                                                </td>


                                            </tr>



                                            <!-- ===================================================== -->
                                            <!-- EDIT PACKAGE MODAL -->
                                            <!-- ===================================================== -->

                                            <div
                                                class="modal fade"
                                                id="editPackageModal{{ $vendorpackage->id }}"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="editPackageModalLabel{{ $vendorpackage->id }}"
                                                aria-hidden="true"
                                            >

                                                <div
                                                    class="modal-dialog modal-lg"
                                                    role="document"
                                                >


                                                    <form
                                                        action="{{ route('vendorpackages.update', $vendorpackage->id) }}"
                                                        method="POST"
                                                    >

                                                        @csrf

                                                        @method('PUT')


                                                        <div class="modal-content">


                                                            <!-- ========================================= -->
                                                            <!-- MODAL HEADER -->
                                                            <!-- ========================================= -->

                                                            <div class="modal-header">


                                                                <h5
                                                                    class="modal-title"
                                                                    id="editPackageModalLabel{{ $vendorpackage->id }}"
                                                                >

                                                                    <i class="fas fa-edit"></i>

                                                                    Edit Vendor Package

                                                                </h5>


                                                                <button
                                                                    type="button"
                                                                    class="close"
                                                                    data-dismiss="modal"
                                                                >

                                                                    <span>&times;</span>

                                                                </button>


                                                            </div>



                                                            <!-- ========================================= -->
                                                            <!-- MODAL BODY -->
                                                            <!-- ========================================= -->

                                                            <div class="modal-body">


                                                                <!-- ================================= -->
                                                                <!-- PACKAGE NAME -->
                                                                <!-- ================================= -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Package Name

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <input
                                                                        type="text"
                                                                        name="package_name"
                                                                        class="form-control"
                                                                        value="{{ $vendorpackage->package_name }}"
                                                                        placeholder="Enter package name"
                                                                        required
                                                                    >

                                                                </div>



                                                                <!-- ================================= -->
                                                                <!-- SERVICE ID -->
                                                                <!-- ================================= -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Service ID

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <input
                                                                        type="text"
                                                                        name="service_id"
                                                                        class="form-control"
                                                                        value="{{ $vendorpackage->service_id }}"
                                                                        placeholder="Enter service ID"
                                                                        required
                                                                    >

                                                                </div>



                                                                <!-- ================================= -->
                                                                <!-- PACKAGE BIO -->
                                                                <!-- ================================= -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Package Bio

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <textarea
                                                                        name="package_bio"
                                                                        class="form-control"
                                                                        rows="4"
                                                                        placeholder="Enter package description"
                                                                        required
                                                                    >{{ $vendorpackage->package_bio }}</textarea>

                                                                </div>



                                                                <!-- ================================= -->
                                                                <!-- PACKAGE AMOUNT -->
                                                                <!-- ================================= -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Package Amount

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <input
                                                                        type="number"
                                                                        name="package_amount"
                                                                        class="form-control"
                                                                        value="{{ $vendorpackage->package_amount }}"
                                                                        placeholder="Enter package amount"
                                                                        step="0.01"
                                                                        min="0"
                                                                        required
                                                                    >

                                                                </div>



                                                                <!-- ================================= -->
                                                                <!-- OFFER PRICE -->
                                                                <!-- ================================= -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Package Offer Price

                                                                    </label>


                                                                    <input
                                                                        type="number"
                                                                        name="package_offer_price"
                                                                        class="form-control"
                                                                        value="{{ $vendorpackage->package_offer_price }}"
                                                                        placeholder="Enter offer price"
                                                                        step="0.01"
                                                                        min="0"
                                                                    >


                                                                    <small class="text-muted">

                                                                        Leave empty if there is no offer price.

                                                                    </small>

                                                                </div>


                                                            </div>



                                                            <!-- ========================================= -->
                                                            <!-- MODAL FOOTER -->
                                                            <!-- ========================================= -->

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

                                                                    Update Package

                                                                </button>


                                                            </div>


                                                        </div>


                                                    </form>


                                                </div>

                                            </div>


                                        @empty


                                            <!-- ================================= -->
                                            <!-- NO PACKAGES -->
                                            <!-- ================================= -->

                                            <tr>

                                                <td
                                                    colspan="7"
                                                    class="text-center text-muted"
                                                >

                                                    No vendor packages found.

                                                </td>

                                            </tr>


                                        @endforelse


                                    </tbody>

                                </table>

                            </div>

                        </div>



                        <!-- ================================================= -->
                        <!-- CARD FOOTER -->
                        <!-- ================================================= -->

                        <div class="card-footer clearfix">

                            <span class="text-muted">

                                Total Packages:
                                {{ $vendorpackages->count() }}

                            </span>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- ========================================================= -->
<!-- ADD NEW PACKAGE MODAL -->
<!-- ========================================================= -->

<div
    class="modal fade"
    id="newPackageModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newPackageModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >


        <form
            action="{{ route('vendorpackages.store') }}"
            method="POST"
        >

            @csrf


            <div class="modal-content">


                <!-- ========================================= -->
                <!-- MODAL HEADER -->
                <!-- ========================================= -->

                <div class="modal-header">


                    <h5
                        class="modal-title"
                        id="newPackageModalLabel"
                    >

                        <i class="fas fa-box"></i>

                        Add New Vendor Package

                    </h5>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>&times;</span>

                    </button>


                </div>



                <!-- ========================================= -->
                <!-- MODAL BODY -->
                <!-- ========================================= -->

                <div class="modal-body">


                    <!-- ================================= -->
                    <!-- PACKAGE NAME -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Package Name

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="package_name"
                            class="form-control"
                            value="{{ old('package_name') }}"
                            placeholder="Enter package name"
                            required
                        >

                    </div>



                    <!-- ================================= -->
                    <!-- SERVICE ID -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Service ID

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="service_id"
                            class="form-control"
                            value="{{ old('service_id') }}"
                            placeholder="Enter service ID"
                            required
                        >

                    </div>



                    <!-- ================================= -->
                    <!-- PACKAGE BIO -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Package Bio

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <textarea
                            name="package_bio"
                            class="form-control"
                            rows="4"
                            placeholder="Enter package description"
                            required
                        >{{ old('package_bio') }}</textarea>

                    </div>



                    <!-- ================================= -->
                    <!-- PACKAGE AMOUNT -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Package Amount

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="number"
                            name="package_amount"
                            class="form-control"
                            value="{{ old('package_amount') }}"
                            placeholder="Enter package amount"
                            step="0.01"
                            min="0"
                            required
                        >

                    </div>



                    <!-- ================================= -->
                    <!-- OFFER PRICE -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Package Offer Price

                        </label>


                        <input
                            type="number"
                            name="package_offer_price"
                            class="form-control"
                            value="{{ old('package_offer_price') }}"
                            placeholder="Enter offer price"
                            step="0.01"
                            min="0"
                        >


                        <small class="text-muted">

                            Leave empty if there is no offer price.

                        </small>

                    </div>


                </div>



                <!-- ========================================= -->
                <!-- MODAL FOOTER -->
                <!-- ========================================= -->

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

                        Save Package

                    </button>


                </div>


            </div>


        </form>


    </div>

</div>


@endsection