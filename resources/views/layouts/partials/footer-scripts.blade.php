<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>




<script>

$(document).ready(function () {

    $('.editSettlementBtn').on('click', function () {

        // =============================================
        // GET DATA FROM BUTTON
        // =============================================

        var id = $(this).attr('data-id');

        var vendorId = $(this).attr('data-vendor-id');

        var bookingId = $(this).attr('data-booking-id');

        var paymentAmount = $(this).attr('data-payment-amount');

        var paymentRemarks = $(this).attr('data-payment-remarks');


        // =============================================
        // PUT DATA INTO FORM
        // =============================================

        $('#edit_vendor_id').val(vendorId);

        $('#edit_booking_id').val(bookingId);

        $('#edit_payment_amount').val(paymentAmount);

        $('#edit_payment_remarks').val(paymentRemarks);


        // =============================================
        // SET UPDATE FORM ACTION
        // =============================================

        $('#editSettlementForm').attr(
            'action',
            '{{ url('/vendorsettlement') }}/' + id
        );

    });

});

</script>




<script>

$(document).ready(function () {


    // =====================================================
    // EDIT CUSTOMER BUTTON
    // =====================================================

    $('.editCustomerBtn').on('click', function () {


        // Get customer ID

        var id = $(this).attr('data-id');


        // Get customer details

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
        // SET UPDATE FORM ACTION
        // =================================================

        $('#editCustomerForm').attr(
            'action',
            '{{ url('/customers') }}/' + id
        );


    });


});

</script>