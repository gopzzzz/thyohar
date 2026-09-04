<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorSettlementController extends Controller
{
    // =====================================================
    // LIST VENDOR SETTLEMENTS
    // =====================================================

    public function index()
    {
        $settlements = DB::table('vendor_settlement')
            ->orderBy('id', 'desc')
            ->get();

        return view('vendor_settlement', compact('settlements'));
    }


    // =====================================================
    // STORE NEW SETTLEMENT
    // =====================================================

    public function store(Request $request)
    {
        // =================================================
        // VALIDATION
        // =================================================

        $request->validate([

            'vendor_id' => [
                'required',
                'string',
                'max:255'
            ],

            'booking_id' => [
                'required',
                'string',
                'max:255'
            ],

            'payment_amount' => [
                'required',
                'numeric',
                'min:0'
            ],

            'payment_remarks' => [
                'required',
                'string'
            ],

        ], [

            'vendor_id.required' =>
                'Please enter vendor ID.',

            'booking_id.required' =>
                'Please enter booking ID.',

            'payment_amount.required' =>
                'Please enter payment amount.',

            'payment_amount.numeric' =>
                'Payment amount must be a number.',

            'payment_amount.min' =>
                'Payment amount cannot be negative.',

            'payment_remarks.required' =>
                'Please enter payment remarks.',

        ]);


        // =================================================
        // INSERT
        // =================================================

        DB::table('vendor_settlement')->insert([

            'vendor_id' =>
                $request->vendor_id,

            'payment_amount' =>
                $request->payment_amount,

            'booking_id' =>
                $request->booking_id,

            'payment_remarks' =>
                $request->payment_remarks,

            'created_at' =>
                now(),

            'updated_at' =>
                now(),

        ]);


        // =================================================
        // REDIRECT
        // =================================================

        return redirect()
            ->route('vendorsettlement')
            ->with(
                'success',
                'Vendor settlement added successfully.'
            );
    }


    // =====================================================
    // UPDATE SETTLEMENT
    // =====================================================

    public function update(Request $request, $id)
    {
        // =================================================
        // VALIDATION
        // =================================================

        $request->validate([

            'vendor_id' => [
                'required',
                'string',
                'max:255'
            ],

            'booking_id' => [
                'required',
                'string',
                'max:255'
            ],

            'payment_amount' => [
                'required',
                'numeric',
                'min:0'
            ],

            'payment_remarks' => [
                'required',
                'string'
            ],

        ], [

            'vendor_id.required' =>
                'Please enter vendor ID.',

            'booking_id.required' =>
                'Please enter booking ID.',

            'payment_amount.required' =>
                'Please enter payment amount.',

            'payment_amount.numeric' =>
                'Payment amount must be a number.',

            'payment_amount.min' =>
                'Payment amount cannot be negative.',

            'payment_remarks.required' =>
                'Please enter payment remarks.',

        ]);


        // =================================================
        // CHECK SETTLEMENT
        // =================================================

        $settlement = DB::table('vendor_settlement')
            ->where('id', $id)
            ->first();


        if (!$settlement) {

            return redirect()
                ->route('vendorsettlement')
                ->with(
                    'error',
                    'Vendor settlement not found.'
                );
        }


        // =================================================
        // UPDATE
        // =================================================

        DB::table('vendor_settlement')
            ->where('id', $id)
            ->update([

                'vendor_id' =>
                    $request->vendor_id,

                'payment_amount' =>
                    $request->payment_amount,

                'booking_id' =>
                    $request->booking_id,

                'payment_remarks' =>
                    $request->payment_remarks,

                'updated_at' =>
                    now(),

            ]);


        // =================================================
        // REDIRECT
        // =================================================

        return redirect()
            ->route('vendorsettlement')
            ->with(
                'success',
                'Vendor settlement updated successfully.'
            );
    }
}