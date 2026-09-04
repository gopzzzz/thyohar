@extends('layouts.mainlayout')

@section('content')

<div class="content-wrapper">

    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Booking Masters</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Booking Masters
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Booking Master List</h3>
                </div>

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Vendor ID</th>
                                    <th>Customer ID</th>
                                    <th>Booked Address</th>
                                    <th>Pincode ID</th>
                                    <th>Total Amount</th>
                                    <th>Discount</th>
                                    <th>Final Amount</th>
                                    <th>Note</th>
                                    <th>Payment Status</th>
                                    <th>Work Status</th>
                                   
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($bookingmasters as $booking)

                                    <tr>
                                        <td>{{ $booking->id }}</td>

                                        <td>{{ $booking->vendorid }}</td>

                                        <td>{{ $booking->customer_id }}</td>

                                        <td>{{ $booking->bookedaddress }}</td>

                                        <td>{{ $booking->pincode_id }}</td>

                                        <td>{{ $booking->total_amount }}</td>

                                        <td>{{ $booking->discount }}</td>

                                        <td>{{ $booking->finalamount }}</td>

                                        <td>{{ $booking->note }}</td>

                                        <td>{{ $booking->payment_status }}</td>

                                        <td>{{ $booking->work_status }}</td>

                                       
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="13" class="text-center">
                                            No bookings found.
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

@endsection