@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">
                    <h1>Vendor Services</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>

                        <li class="breadcrumb-item active">
                            Vendor Services
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
                        Vendor Services List
                    </h3>


                    <!-- ADD BUTTON -->
                    <button type="button"
                            class="btn btn-primary float-right"
                            data-toggle="modal"
                            data-target="#addServiceModal">

                        <i class="fas fa-plus"></i>
                        Add Service

                    </button>

                </div>


                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>ID</th>
                                    <th>Vendor ID</th>
                                    <th>Service ID</th>
                                    <th>Action</th>

                                </tr>

                            </thead>


                            <tbody>

                                @forelse($vendorservices as $service)

                                    <tr>

                                        <td>
                                            {{ $service->id }}
                                        </td>

                                        <td>
                                            {{ $service->vendor_id }}
                                        </td>

                                        <td>
                                            {{ $service->service_id }}
                                        </td>

                                        <td>

                                            <!-- EDIT BUTTON -->
                                            <button type="button"
                                                    class="btn btn-primary btn-sm"
                                                    data-toggle="modal"
                                                    data-target="#editServiceModal{{ $service->id }}">

                                                <i class="fas fa-edit"></i>
                                                Edit

                                            </button>


                                            <!-- DELETE BUTTON -->
                                            <form action="{{ route('vendor_services.destroy', $service->id) }}"
                                                  method="POST"
                                                  style="display:inline-block;">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-primary btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this service?')">

                                                    <i class="fas fa-trash"></i>
                                                    Delete

                                                </button>

                                            </form>

                                        </td>

                                    </tr>


                                    <!-- ========================= -->
                                    <!-- EDIT MODAL -->
                                    <!-- ========================= -->

                                    <div class="modal fade"
                                         id="editServiceModal{{ $service->id }}">

                                        <div class="modal-dialog">

                                            <div class="modal-content">


                                                <div class="modal-header">

                                                    <h4 class="modal-title">
                                                        Edit Vendor Service
                                                    </h4>

                                                    <button type="button"
                                                            class="close"
                                                            data-dismiss="modal">

                                                        <span>&times;</span>

                                                    </button>

                                                </div>


                                                <form method="POST"
                                                      action="{{ route('vendor_services.update', $service->id) }}">

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
                                                                   value="{{ $service->vendor_id }}"
                                                                   required>

                                                        </div>


                                                        <!-- Service ID -->

                                                        <div class="form-group">

                                                            <label>
                                                                Service ID
                                                            </label>

                                                            <input type="text"
                                                                   name="service_id"
                                                                   class="form-control"
                                                                   value="{{ $service->service_id }}"
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

                                        <td colspan="4"
                                            class="text-center">

                                            No vendor services found.

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


<!-- ================================================= -->
<!-- ADD SERVICE MODAL -->
<!-- ================================================= -->

<div class="modal fade"
     id="addServiceModal">

    <div class="modal-dialog">

        <div class="modal-content">


            <div class="modal-header">

                <h4 class="modal-title">
                    Add Vendor Service
                </h4>

                <button type="button"
                        class="close"
                        data-dismiss="modal">

                    <span>&times;</span>

                </button>

            </div>


            <form method="POST"
                  action="{{ route('vendor_services.store') }}">

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


                    <!-- Service ID -->

                    <div class="form-group">

                        <label>
                            Service ID
                        </label>

                        <input type="text"
                               name="service_id"
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