@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- ===================================================== -->
    <!-- HEADER -->
    <!-- ===================================================== -->

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1>Payment History</h1>

                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Payment History
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
                                Payment History List
                            </h3>


                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#newPaymentModal"
                            >

                                <i class="fas fa-plus"></i>

                                New Payment

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
                        <!-- PAYMENT HISTORY TABLE -->
                        <!-- ================================================= -->

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered table-striped table-hover">

                                    <thead>

                                        <tr>

                                            <th style="width:60px;">
                                                #
                                            </th>

                                            <th>
                                                Customer ID
                                            </th>

                                            <th>
                                                Booking ID
                                            </th>

                                            <th>
                                                Payment Remarks
                                            </th>

                                            <th>
                                                Payment Amount
                                            </th>

                                            <th style="width:100px;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>

                                        <!-- ================================================= -->
                                        <!-- SORT PAYMENT HISTORY BY ID ASCENDING -->
                                        <!-- ================================================= -->

                                        @forelse($paymentHistory->sortBy('id') as $payment)

                                            <tr>

                                                <!-- ========================================= -->
                                                <!-- ID -->
                                                <!-- ========================================= -->

                                                <td>

                                                    {{ $payment->id }}

                                                </td>


                                                <!-- ========================================= -->
                                                <!-- CUSTOMER ID -->
                                                <!-- ========================================= -->

                                                <td>

                                                    {{ $payment->cus_id }}

                                                </td>


                                                <!-- ========================================= -->
                                                <!-- BOOKING ID -->
                                                <!-- ========================================= -->

                                                <td>

                                                    {{ $payment->bookingid }}

                                                </td>


                                                <!-- ========================================= -->
                                                <!-- PAYMENT REMARKS -->
                                                <!-- ========================================= -->

                                                <td>

                                                    {{ $payment->payment_remarks }}

                                                </td>


                                                <!-- ========================================= -->
                                                <!-- PAYMENT AMOUNT -->
                                                <!-- ========================================= -->

                                                <td>

                                                    ₹ {{ number_format($payment->payment_amount, 2) }}

                                                </td>


                                                <!-- ========================================= -->
                                                <!-- ACTION -->
                                                <!-- ========================================= -->

                                                <td class="text-center">

                                                    <button
                                                        type="button"
                                                        class="btn btn-primary btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#editPayment{{ $payment->id }}"
                                                    >

                                                        <i class="fas fa-edit"></i>

                                                        Edit

                                                    </button>

                                                </td>

                                            </tr>


                                            <!-- ================================================= -->
                                            <!-- EDIT PAYMENT MODAL -->
                                            <!-- ================================================= -->

                                            <div
                                                class="modal fade"
                                                id="editPayment{{ $payment->id }}"
                                                tabindex="-1"
                                                role="dialog"
                                                aria-labelledby="editPaymentLabel{{ $payment->id }}"
                                                aria-hidden="true"
                                            >

                                                <div class="modal-dialog modal-lg">

                                                    <form
                                                        action="{{ route('payment_history.update', $payment->id) }}"
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
                                                                    id="editPaymentLabel{{ $payment->id }}"
                                                                >

                                                                    <i class="fas fa-edit"></i>

                                                                    Edit Payment

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


                                                                <!-- CUSTOMER ID -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Customer ID

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <input
                                                                        type="number"
                                                                        name="cus_id"
                                                                        class="form-control"
                                                                        value="{{ $payment->cus_id }}"
                                                                        min="1"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- BOOKING ID -->

                                                                <div class="form-group">

                                                                    <label>

                                                                        Booking ID

                                                                        <span class="text-danger">
                                                                            *
                                                                        </span>

                                                                    </label>


                                                                    <input
                                                                        type="text"
                                                                        name="bookingid"
                                                                        class="form-control"
                                                                        value="{{ $payment->bookingid }}"
                                                                        required
                                                                    >

                                                                </div>


                                                                <!-- PAYMENT REMARKS -->

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
                                                                    >{{ $payment->payment_remarks }}</textarea>

                                                                </div>


                                                                <!-- PAYMENT AMOUNT -->

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
                                                                        value="{{ $payment->payment_amount }}"
                                                                        step="0.01"
                                                                        min="0"
                                                                        required
                                                                    >

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

                                                                    Update Payment

                                                                </button>

                                                            </div>


                                                        </div>

                                                    </form>

                                                </div>

                                            </div>

                                        @empty

                                            <!-- ================================================= -->
                                            <!-- NO PAYMENT HISTORY -->
                                            <!-- ================================================= -->

                                            <tr>

                                                <td
                                                    colspan="6"
                                                    class="text-center text-muted"
                                                >

                                                    No payment history found.

                                                </td>

                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>


                        <!-- ================================================= -->
                        <!-- FOOTER -->
                        <!-- ================================================= -->

                        <div class="card-footer">

                            <span class="text-muted">

                                Total Payments:
                                {{ $paymentHistory->count() }}

                            </span>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- ===================================================== -->
<!-- ADD NEW PAYMENT MODAL -->
<!-- ===================================================== -->

<div
    class="modal fade"
    id="newPaymentModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newPaymentModalLabel"
    aria-hidden="true"
>

    <div class="modal-dialog modal-lg">

        <form
            action="{{ route('payment_history.store') }}"
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
                        id="newPaymentModalLabel"
                    >

                        <i class="fas fa-plus"></i>

                        Add New Payment

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


                    <!-- CUSTOMER ID -->

                    <div class="form-group">

                        <label>

                            Customer ID

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="number"
                            name="cus_id"
                            class="form-control"
                            value="{{ old('cus_id') }}"
                            placeholder="Enter customer ID"
                            min="1"
                            required
                        >

                    </div>


                    <!-- BOOKING ID -->

                    <div class="form-group">

                        <label>

                            Booking ID

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="bookingid"
                            class="form-control"
                            value="{{ old('bookingid') }}"
                            placeholder="Enter booking ID"
                            required
                        >

                    </div>


                    <!-- PAYMENT REMARKS -->

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


                    <!-- PAYMENT AMOUNT -->

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

                        Save Payment

                    </button>

                </div>


            </div>

        </form>

    </div>

</div>



<!-- ===================================================== -->
<!-- OPEN ADD MODAL AFTER VALIDATION ERROR -->
<!-- ===================================================== -->

@if($errors->any() && old('payment_history_form'))

<script>

$(document).ready(function () {

    $('#newPaymentModal').modal('show');

});

</script>

@endif


@endsection