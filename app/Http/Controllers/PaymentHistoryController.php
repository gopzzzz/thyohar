<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentHistoryController extends Controller
{
    // =====================================================
    // LIST PAYMENT HISTORY
    // =====================================================

    public function index()
    {
        $paymentHistory = DB::table('payment_history')
            ->orderBy('id', 'desc')
            ->get();

        return view('payment_history', compact('paymentHistory'));
    }


    // =====================================================
    // STORE PAYMENT
    // =====================================================

    public function store(Request $request)
    {
        $request->validate([

            'cus_id' => [
                'required',
                'integer'
            ],

            'bookingid' => [
                'required',
                'string',
                'max:255'
            ],

            'payment_remarks' => [
                'required',
                'string'
            ],

            'payment_amount' => [
                'required',
                'numeric',
                'min:0'
            ],

        ], [

            'cus_id.required' =>
                'Please enter customer ID.',

            'cus_id.integer' =>
                'Customer ID must be a number.',

            'bookingid.required' =>
                'Please enter booking ID.',

            'payment_remarks.required' =>
                'Please enter payment remarks.',

            'payment_amount.required' =>
                'Please enter payment amount.',

            'payment_amount.numeric' =>
                'Payment amount must be a number.',

            'payment_amount.min' =>
                'Payment amount cannot be negative.',

        ]);


        DB::table('payment_history')->insert([

            'cus_id' =>
                $request->cus_id,

            'bookingid' =>
                $request->bookingid,

            'payment_remarks' =>
                $request->payment_remarks,

            'payment_amount' =>
                $request->payment_amount,

            'created_at' =>
                now(),

            'updated_at' =>
                now(),

        ]);


        return redirect()
            ->route('payment_history')
            ->with(
                'success',
                'Payment history added successfully.'
            );
    }


    // =====================================================
    // UPDATE PAYMENT
    // =====================================================

    public function update(Request $request, $id)
    {
        $request->validate([

            'cus_id' => [
                'required',
                'integer'
            ],

            'bookingid' => [
                'required',
                'string',
                'max:255'
            ],

            'payment_remarks' => [
                'required',
                'string'
            ],

            'payment_amount' => [
                'required',
                'numeric',
                'min:0'
            ],

        ], [

            'cus_id.required' =>
                'Please enter customer ID.',

            'cus_id.integer' =>
                'Customer ID must be a number.',

            'bookingid.required' =>
                'Please enter booking ID.',

            'payment_remarks.required' =>
                'Please enter payment remarks.',

            'payment_amount.required' =>
                'Please enter payment amount.',

            'payment_amount.numeric' =>
                'Payment amount must be a number.',

            'payment_amount.min' =>
                'Payment amount cannot be negative.',

        ]);


        // Find payment

        $payment = DB::table('payment_history')
            ->where('id', $id)
            ->first();


        if (!$payment) {

            return redirect()
                ->route('payment_history')
                ->with(
                    'error',
                    'Payment history not found.'
                );
        }


        // Update payment

        DB::table('payment_history')
            ->where('id', $id)
            ->update([

                'cus_id' =>
                    $request->cus_id,

                'bookingid' =>
                    $request->bookingid,

                'payment_remarks' =>
                    $request->payment_remarks,

                'payment_amount' =>
                    $request->payment_amount,

                'updated_at' =>
                    now(),

            ]);


        return redirect()
            ->route('payment_history')
            ->with(
                'success',
                'Payment history updated successfully.'
            );
    }
}