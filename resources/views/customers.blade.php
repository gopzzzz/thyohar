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
                    <h1>Customers</h1>
                </div>

                <div class="col-sm-6">

                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Customers
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
                                Customer List
                            </h3>


                            <!-- ADD CUSTOMER BUTTON -->

                            <button
                                type="button"
                                class="btn btn-primary btn-sm"
                                data-toggle="modal"
                                data-target="#newCustomerModal"
                            >

                                <i class="fas fa-plus"></i>

                                New Customer

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
                        <!-- CUSTOMER TABLE -->
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
                                                Customer Name
                                            </th>

                                            <th>
                                                Phone Number
                                            </th>

                                            <th>
                                                Email
                                            </th>

                                            <th style="width: 120px;">
                                                Action
                                            </th>

                                        </tr>

                                    </thead>


                                    <tbody>


                                        <!-- ================================================= -->
                                        <!-- SERIAL NUMBER STARTS FROM 1 -->
                                        <!-- ================================================= -->

                                        @php
                                            $serial = 1;
                                        @endphp


                                        @forelse($customers as $customer)

                                            <tr>


                                                <!-- ================================================= -->
                                                <!-- DISPLAY SERIAL NUMBER -->
                                                <!-- ================================================= -->

                                                <td>
                                                    {{ $serial }}
                                                </td>


                                                <!-- ================================================= -->
                                                <!-- CUSTOMER NAME -->
                                                <!-- ================================================= -->

                                                <td>
                                                    {{ $customer->customername }}
                                                </td>


                                                <!-- ================================================= -->
                                                <!-- PHONE NUMBER -->
                                                <!-- ================================================= -->

                                                <td>
                                                    {{ $customer->phone_number }}
                                                </td>


                                                <!-- ================================================= -->
                                                <!-- EMAIL -->
                                                <!-- ================================================= -->

                                                <td>
                                                    {{ $customer->email }}
                                                </td>


                                                <!-- ================================================= -->
                                                <!-- ACTION -->
                                                <!-- ================================================= -->

                                                <td class="text-center">


                                                    <!-- EDIT BUTTON -->

                                                    <button
                                                        type="button"
                                                        class="btn btn-primary btn-sm editCustomerBtn"

                                                        data-id="{{ $customer->id }}"

                                                        data-customername="{{ $customer->customername }}"

                                                        data-phone="{{ $customer->phone_number }}"

                                                        data-email="{{ $customer->email }}"

                                                        data-toggle="modal"
                                                        data-target="#editCustomerModal"
                                                    >

                                                        <i class="fas fa-edit"></i>

                                                        Edit

                                                    </button>


                                                </td>


                                            </tr>


                                            <!-- ================================================= -->
                                            <!-- INCREASE SERIAL NUMBER -->
                                            <!-- ================================================= -->

                                            @php
                                                $serial++;
                                            @endphp


                                        @empty


                                            <tr>

                                                <td
                                                    colspan="5"
                                                    class="text-center text-muted"
                                                >

                                                    No customers found.

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

                                Total Customers:
                                {{ $customers->count() }}

                            </span>

                        </div>


                    </div>

                </div>

            </div>

        </div>

    </section>

</div>



<!-- ===================================================== -->
<!-- ADD CUSTOMER MODAL -->
<!-- ===================================================== -->

<div
    class="modal fade"
    id="newCustomerModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="newCustomerModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >

        <form
            action="{{ route('customers.store') }}"
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
                        id="newCustomerModalLabel"
                    >

                        <i class="fas fa-user-plus"></i>

                        Add New Customer

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


                    <!-- CUSTOMER NAME -->

                    <div class="form-group">

                        <label>

                            Customer Name

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="customername"
                            class="form-control"

                            value="{{ old('customername') }}"

                            placeholder="Enter customer name"

                            required
                        >

                    </div>


                    <!-- PHONE NUMBER -->

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

                            placeholder="Enter phone number"

                            maxlength="20"

                            minlength="7"

                            inputmode="numeric"

                            required
                        >


                        <small class="text-muted">

                            Enter a valid phone number.

                        </small>

                    </div>


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label>

                            Email

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="email"
                            name="email"
                            class="form-control"

                            value="{{ old('email') }}"

                            placeholder="Enter email address"

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

                        Save Customer

                    </button>


                </div>


            </div>

        </form>

    </div>

</div>



<!-- ===================================================== -->
<!-- EDIT CUSTOMER MODAL -->
<!-- ===================================================== -->

<div
    class="modal fade"
    id="editCustomerModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editCustomerModalLabel"
    aria-hidden="true"
>

    <div
        class="modal-dialog modal-lg"
        role="document"
    >

        <form
            id="editCustomerForm"
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
                        id="editCustomerModalLabel"
                    >

                        <i class="fas fa-edit"></i>

                        Edit Customer

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


                    <!-- CUSTOMER NAME -->

                    <div class="form-group">

                        <label>

                            Customer Name

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            name="customername"
                            id="edit_customername"
                            class="form-control"

                            placeholder="Enter customer name"

                            required
                        >

                    </div>


                    <!-- PHONE NUMBER -->

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
                            id="edit_phone_number"
                            class="form-control"

                            maxlength="20"

                            minlength="7"

                            inputmode="numeric"

                            placeholder="Enter phone number"

                            required
                        >

                    </div>


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label>

                            Email

                            <span class="text-danger">
                                *
                            </span>

                        </label>


                        <input
                            type="email"
                            name="email"
                            id="edit_email"
                            class="form-control"

                            placeholder="Enter email address"

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

                        Update Customer

                    </button>


                </div>


            </div>

        </form>

    </div>

</div>



<!-- ===================================================== -->
<!-- EDIT CUSTOMER JAVASCRIPT -->
<!-- ===================================================== -->

<script>

$(document).ready(function () {


    // =====================================================
    // EDIT CUSTOMER BUTTON
    // =====================================================

    $('.editCustomerBtn').on('click', function () {


        // =================================================
        // GET REAL DATABASE ID
        // =================================================

        var id = $(this).attr('data-id');


        // =================================================
        // GET CUSTOMER DATA
        // =================================================

        var customerName =
            $(this).attr('data-customername');


        var phoneNumber =
            $(this).attr('data-phone');


        var email =
            $(this).attr('data-email');


        // =================================================
        // FILL EDIT FORM
        // =================================================

        $('#edit_customername')
            .val(customerName);


        $('#edit_phone_number')
            .val(phoneNumber);


        $('#edit_email')
            .val(email);


        // =================================================
        // SET UPDATE URL
        // =================================================

        $('#editCustomerForm').attr(
            'action',
            '{{ url('/customers') }}/' + id
        );


    });


});

</script>


@endsection