@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Vendor Bank Details</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Vendor Bank Details
                        </li>

                    </ol>
                </div>

            </div>

        </div>
    </section>


    <!-- Main Content -->
    <section class="content">

        <div class="container-fluid">

            {{-- Success Message --}}
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            {{-- Validation Errors --}}
            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">
                        Vendor Bank Details List
                    </h3>


                    <!-- Add Button -->
                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addBankModal">

                        <i class="fas fa-plus"></i>
                        Add Bank Details

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>ID</th>
                                    <th>Vendor ID</th>
                                    <th>Account Name</th>
                                    <th>Account Number</th>
                                    <th>IFSC</th>
                                    <th>Bank Branch</th>
                                    <th>Bank Name</th>
                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($vendorbankdetails as $bank)

                                    <tr>

                                        <td>
                                            {{ $bank->id }}
                                        </td>

                                        <td>
                                            {{ $bank->vendor_id }}
                                        </td>

                                        <td>
                                            {{ $bank->bankaccount_name }}
                                        </td>

                                        <td>
                                            {{ $bank->bankaccount_number }}
                                        </td>

                                        <td>
                                            {{ $bank->bank_ifsc }}
                                        </td>

                                        <td>
                                            {{ $bank->bank_brank }}
                                        </td>

                                        <td>
                                            {{ $bank->bank_name }}
                                        </td>

                                        <td>

                                            <!-- Edit Button -->
                                            <button type="button"
                                                    class="btn btn-primary btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#editBankModal{{ $bank->id }}">

                                                <i class="fas fa-edit"></i>
                                                Edit

                                            </button>

                                        </td>

                                    </tr>


                                    <!-- EDIT MODAL -->

                                    <div class="modal fade"
                                         id="editBankModal{{ $bank->id }}">

                                        <div class="modal-dialog">

                                            <div class="modal-content">


                                                <div class="modal-header">

                                                    <h4 class="modal-title">
                                                        Edit Bank Details
                                                    </h4>

                                                    <button type="button"
                                                            class="close"
                                                            data-dismiss="modal">

                                                        <span>&times;</span>

                                                    </button>

                                                </div>


                                                <form method="POST"
                                                      action="{{ route('vendor_bankdetails.update', $bank->id) }}">

                                                    @csrf

                                                    @method('PUT')


                                                    <div class="modal-body">


                                                        <!-- Vendor ID -->

                                                        <div class="form-group">

                                                            <label>
                                                                Vendor ID
                                                            </label>

                                                            <input type="text"
                                                                   name="vendor_id"
                                                                   class="form-control"
                                                                   value="{{ $bank->vendor_id }}"
                                                                   required>

                                                        </div>


                                                        <!-- Account Name -->

                                                        <div class="form-group">

                                                            <label>
                                                                Account Name
                                                            </label>

                                                            <input type="text"
                                                                   name="bankaccount_name"
                                                                   class="form-control"
                                                                   value="{{ $bank->bankaccount_name }}"
                                                                   required>

                                                        </div>


                                                        <!-- Account Number -->

                                                        <div class="form-group">

                                                            <label>
                                                                Account Number
                                                            </label>

                                                            <input type="text"
                                                                   name="bankaccount_number"
                                                                   class="form-control"
                                                                   value="{{ $bank->bankaccount_number }}"
                                                                   required>

                                                        </div>


                                                        <!-- IFSC -->

                                                        <div class="form-group">

                                                            <label>
                                                                IFSC
                                                            </label>

                                                            <input type="text"
                                                                   name="bank_ifsc"
                                                                   class="form-control"
                                                                   value="{{ $bank->bank_ifsc }}"
                                                                   required>

                                                        </div>


                                                        <!-- Branch -->

                                                        <div class="form-group">

                                                            <label>
                                                                Bank Branch
                                                            </label>

                                                            <input type="text"
                                                                   name="bank_brank"
                                                                   class="form-control"
                                                                   value="{{ $bank->bank_brank }}"
                                                                   required>

                                                        </div>


                                                        <!-- Bank Name -->

                                                        <div class="form-group">

                                                            <label>
                                                                Bank Name
                                                            </label>

                                                            <input type="text"
                                                                   name="bank_name"
                                                                   class="form-control"
                                                                   value="{{ $bank->bank_name }}"
                                                                   required>

                                                        </div>


                                                    </div>


                                                    <div class="modal-footer">

                                                        <button type="button"
                                                                class="btn btn-secondary"
                                                                data-dismiss="modal">

                                                            Close

                                                        </button>


                                                        <button type="submit"
                                                                class="btn btn-primary">

                                                            Update

                                                        </button>

                                                    </div>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                @empty

                                    <tr>

                                        <td colspan="8"
                                            class="text-center">

                                            No bank details found.

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>


<!-- ===================================================== -->
<!-- ADD BANK DETAILS MODAL -->
<!-- ===================================================== -->

<div class="modal fade"
     id="addBankModal">

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h4 class="modal-title">
                    Add Bank Details
                </h4>

                <button type="button"
                        class="close"
                        data-dismiss="modal">

                    <span>&times;</span>

                </button>

            </div>


            <form method="POST"
                  action="{{ route('vendor_bankdetails.store') }}">

                @csrf


                <div class="modal-body">


                    <!-- Vendor ID -->

                    <div class="form-group">

                        <label>
                            Vendor ID
                        </label>

                        <input type="text"
                               name="vendor_id"
                               class="form-control"
                               required>

                    </div>


                    <!-- Account Name -->

                    <div class="form-group">

                        <label>
                            Account Name
                        </label>

                        <input type="text"
                               name="bankaccount_name"
                               class="form-control"
                               required>

                    </div>


                    <!-- Account Number -->

                    <div class="form-group">

                        <label>
                            Account Number
                        </label>

                        <input type="text"
                               name="bankaccount_number"
                               class="form-control"
                               required>

                    </div>


                    <!-- IFSC -->

                    <div class="form-group">

                        <label>
                            IFSC
                        </label>

                        <input type="text"
                               name="bank_ifsc"
                               class="form-control"
                               required>

                    </div>


                    <!-- Branch -->

                    <div class="form-group">

                        <label>
                            Bank Branch
                        </label>

                        <input type="text"
                               name="bank_brank"
                               class="form-control"
                               required>

                    </div>


                    <!-- Bank Name -->

                    <div class="form-group">

                        <label>
                            Bank Name
                        </label>

                        <input type="text"
                               name="bank_name"
                               class="form-control"
                               required>

                    </div>


                </div>


                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                        Close

                    </button>


                    <button type="submit"
                            class="btn btn-primary">

                        Save

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection