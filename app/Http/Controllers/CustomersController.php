<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    // =====================================================
    // LIST CUSTOMERS
    // =====================================================

    public function index()
    {
        $customers = DB::table('customers')
            ->orderBy('id', 'desc')
            ->get();

        return view('customers', compact('customers'));
    }


    // =====================================================
    // STORE NEW CUSTOMER
    // =====================================================

    public function store(Request $request)
    {
        // =================================================
        // VALIDATION
        // =================================================

        $request->validate([

            'customername' => [
                'required',
                'string',
                'max:255'
            ],

            'phone_number' => [
                'required',
                'digits_between:7,20'
            ],

            'email' => [
                'required',
                'email',
                'max:255'
            ],

        ], [

            'customername.required' =>
                'Please enter customer name.',

            'phone_number.required' =>
                'Please enter phone number.',

            'phone_number.digits_between' =>
                'Please enter a valid phone number.',

            'email.required' =>
                'Please enter email address.',

            'email.email' =>
                'Please enter a valid email address.',

        ]);


        // =================================================
        // INSERT CUSTOMER
        // =================================================

        DB::table('customers')->insert([

            'customername' =>
                $request->customername,

            'phone_number' =>
                $request->phone_number,

            'email' =>
                $request->email,

            'created_at' =>
                now(),

            'updated_at' =>
                now(),

        ]);


        // =================================================
        // REDIRECT
        // =================================================

        return redirect()
            ->route('customers')
            ->with(
                'success',
                'Customer added successfully.'
            );
    }


    // =====================================================
    // UPDATE CUSTOMER
    // =====================================================

    public function update(Request $request, $id)
    {
        // =================================================
        // VALIDATION
        // =================================================

        $request->validate([

            'customername' => [
                'required',
                'string',
                'max:255'
            ],

            'phone_number' => [
                'required',
                'digits_between:7,20'
            ],

            'email' => [
                'required',
                'email',
                'max:255'
            ],

        ], [

            'customername.required' =>
                'Please enter customer name.',

            'phone_number.required' =>
                'Please enter phone number.',

            'phone_number.digits_between' =>
                'Please enter a valid phone number.',

            'email.required' =>
                'Please enter email address.',

            'email.email' =>
                'Please enter a valid email address.',

        ]);


        // =================================================
        // CHECK CUSTOMER
        // =================================================

        $customer = DB::table('customers')
            ->where('id', $id)
            ->first();


        if (!$customer) {

            return redirect()
                ->route('customers')
                ->with(
                    'error',
                    'Customer not found.'
                );
        }


        // =================================================
        // UPDATE CUSTOMER
        // =================================================

        DB::table('customers')
            ->where('id', $id)
            ->update([

                'customername' =>
                    $request->customername,

                'phone_number' =>
                    $request->phone_number,

                'email' =>
                    $request->email,

                'updated_at' =>
                    now(),

            ]);


        // =================================================
        // REDIRECT
        // =================================================

        return redirect()
            ->route('customers')
            ->with(
                'success',
                'Customer updated successfully.'
            );
    }
}