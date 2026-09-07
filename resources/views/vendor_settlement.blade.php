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
                    <h1>Vendor Settlement</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Vendor Settlement
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
                                Vendor Settlement List
                            </h3>


                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#newSettlementModal"
                            >

                                <i class="fas fa-plus"></i>

                                New Settlement

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
                        <!-- SETTLEMENT TABLE -->
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
                                                Vendor ID
                                            </th>

                                            <th>
                                                Booking ID
                                            </th>

                                            <th>
                                                Payment Amount
                                            </th>

                                            <th>
                                                Payment Remarks
                                            </th>

                                            <th style="width: 120px;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>


                                        @forelse($settlements->sortBy('id')->values() as $settlement)


                                            <tr>


                                                <!-- ================================= -->
                                                <!-- DISPLAY NUMBER -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $loop->iteration }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- VENDOR ID -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $settlement->vendor_id }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- BOOKING ID -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $settlement->booking_id }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- PAYMENT AMOUNT -->
                                                <!-- ================================= -->

                                                <td>

                                                    ₹ {{ number_format($settlement->payment_amount, 2) }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- PAYMENT REMARKS -->
                                                <!-- ================================= -->

                                                <td>

                                                    {{ $settlement->payment_remarks }}

                                                </td>



                                                <!-- ================================= -->
                                                <!-- ACTION -->
                                                <!-- ================================= -->

                                                <td class="text-center">


                                                    <button
                                                        type="button"
                                                        class="btn btn-primary btn-sm editSettlementBtn"

                                                        data-id="{{ $settlement->id }}"

                                                        data-vendor-id="{{ $settlement->vendor_id }}"

                                                        data-booking-id="{{ $settlement->booking_id }}"

                                                        data-payment-amount="{{ $settlement->payment_amount }}"

                                                        data-payment-remarks="{{ $settlement->payment_remarks }}"

                                                        data-toggle="modal"
                                                        data-target="#editSettlementModal"
                                                    >

                                                        <i class="fas fa-edit"></i>

                                                        Edit

                                                    </button>


                                                </td>


                                            </tr>


                                        @empty


                                            <!-- ================================= -->
                                            <!-- NO SETTLEMENTS -->
                                            <!-- ================================= -->

                                            <tr>

                                                <td
                                                    colspan="6"
                                                    class="text-center text-muted"
                                                >

                                                    No settlements found.

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

                                Total Settlements:
                                {{ $settlements->count() }}

                            </span>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- ===================================================== -->
<!-- ADD NEW SETTLEMENT MODAL -->
<!-- ===================================================== -->

<div
    class="modal fade"
    id="newSettlementModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newSettlementModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >


        <form
            action="{{ route('vendor_settlement.store') }}"
            method="POST"
        >

            @csrf


            <div class="modal-content">


                <!-- ================================================= -->
                <!-- MODAL HEADER -->
                <!-- ================================================= -->

                <div class="modal-header">


                    <h5
                        class="modal-title"
                        id="newSettlementModalLabel"
                    >

                        <i class="fas fa-plus"></i>

                        Add New Vendor Settlement

                    </h5>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>&times;</span>

                    </button>


                </div>



                <!-- ================================================= -->
                <!-- MODAL BODY -->
                <!-- ================================================= -->

                <div class="modal-body">


                    <!-- ================================= -->
                    <!-- VENDOR ID -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Vendor ID

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="vendor_id"
                            class="form-control"

                            value="{{ old('vendor_id') }}"

                            placeholder="Enter vendor ID"

                            required
                        >

                    </div>



                    <!-- ================================= -->
                    <!-- BOOKING ID -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Booking ID

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="booking_id"
                            class="form-control"

                            value="{{ old('booking_id') }}"

                            placeholder="Enter booking ID"

                            required
                        >

                    </div>



                    <!-- ================================= -->
                    <!-- PAYMENT AMOUNT -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Payment Amount

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="number"
                            name="payment_amount"
                            class="form-control"

                            value="{{ old('payment_amount') }}"

                            placeholder="Enter payment amount"

                            step="0.01"

                            min="0"

                            required
                        >

                    </div>



                    <!-- ================================= -->
                    <!-- PAYMENT REMARKS -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Payment Remarks

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <textarea
                            name="payment_remarks"
                            class="form-control"
                            rows="4"

                            placeholder="Enter payment remarks"

                            required
                        >{{ old('payment_remarks') }}</textarea>

                    </div>


                </div>



                <!-- ================================================= -->
                <!-- MODAL FOOTER -->
                <!-- ================================================= -->

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

                        Save Settlement

                    </button>


                </div>


            </div>


        </form>


    </div>

</div>



<!-- ===================================================== -->
<!-- EDIT SETTLEMENT MODAL -->
<!-- ===================================================== -->

<div
    class="modal fade"
    id="editSettlementModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editSettlementModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >


        <form
            id="editSettlementForm"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="modal-content">


                <!-- ================================================= -->
                <!-- MODAL HEADER -->
                <!-- ================================================= -->

                <div class="modal-header">


                    <h5
                        class="modal-title"
                        id="editSettlementModalLabel"
                    >

                        <i class="fas fa-edit"></i>

                        Edit Vendor Settlement

                    </h5>


                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                    >

                        <span>&times;</span>

                    </button>


                </div>



                <!-- ================================================= -->
                <!-- MODAL BODY -->
                <!-- ================================================= -->

                <div class="modal-body">


                    <!-- ================================= -->
                    <!-- VENDOR ID -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Vendor ID

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="vendor_id"
                            id="edit_vendor_id"
                            class="form-control"

                            placeholder="Enter vendor ID"

                            required
                        >

                    </div>



                    <!-- ================================= -->
                    <!-- BOOKING ID -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Booking ID

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="booking_id"
                            id="edit_booking_id"
                            class="form-control"

                            placeholder="Enter booking ID"

                            required
                        >

                    </div>



                    <!-- ================================= -->
                    <!-- PAYMENT AMOUNT -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Payment Amount

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="number"
                            name="payment_amount"
                            id="edit_payment_amount"
                            class="form-control"

                            step="0.01"

                            min="0"

                            placeholder="Enter payment amount"

                            required
                        >

                    </div>



                    <!-- ================================= -->
                    <!-- PAYMENT REMARKS -->
                    <!-- ================================= -->

                    <div class="form-group">

                        <label>

                            Payment Remarks

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <textarea
                            name="payment_remarks"
                            id="edit_payment_remarks"
                            class="form-control"

                            rows="4"

                            placeholder="Enter payment remarks"

                            required
                        ></textarea>

                    </div>


                </div>



                <!-- ================================================= -->
                <!-- MODAL FOOTER -->
                <!-- ================================================= -->

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

                        Update Settlement

                    </button>


                </div>


            </div>


        </form>


    </div>

</div>



<!-- ===================================================== -->
<!-- EDIT SETTLEMENT JAVASCRIPT -->
<!-- ===================================================== -->

<script>

$(document).ready(function () {


    // =====================================================
    // EDIT SETTLEMENT BUTTON
    // =====================================================

    $('.editSettlementBtn').on('click', function () {


        // =============================================
        // GET DATABASE ID
        // =============================================

        var id = $(this).attr('data-id');


        // =============================================
        // GET SETTLEMENT DATA
        // =============================================

        var vendorId =
            $(this).attr('data-vendor-id');


        var bookingId =
            $(this).attr('data-booking-id');


        var paymentAmount =
            $(this).attr('data-payment-amount');


        var paymentRemarks =
            $(this).attr('data-payment-remarks');


        // =============================================
        // FILL EDIT FORM
        // =============================================

        $('#edit_vendor_id')
            .val(vendorId);


        $('#edit_booking_id')
            .val(bookingId);


        $('#edit_payment_amount')
            .val(paymentAmount);


        $('#edit_payment_remarks')
            .val(paymentRemarks);


        // =============================================
        // SET UPDATE FORM ACTION
        // =============================================

        $('#editSettlementForm').attr(
            'action',
            '{{ url('/vendor-settlement') }}/' + id
        );


    });


});

</script>


@endsection