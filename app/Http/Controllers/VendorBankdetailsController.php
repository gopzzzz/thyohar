<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorBankdetailsController extends Controller
{
    // LIST
    public function index()
    {
        $vendorbankdetails = DB::table('vendor_bankdetails')
            ->orderBy('id', 'asc')
            ->get();

        return view('vendor_bankdetails', compact('vendorbankdetails'));
    }


    // ADD
    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required|string|max:20',
            'bankaccount_name' => 'required|string|max:100',
            'bankaccount_number' => 'required|string|max:30',
            'bank_ifsc' => 'required|string|max:20',
            'bank_brank' => 'required|string|max:100',
            'bank_name' => 'required|string|max:100',
        ]);

        DB::table('vendor_bankdetails')->insert([
            'vendor_id' => $request->vendor_id,
            'bankaccount_name' => $request->bankaccount_name,
            'bankaccount_number' => $request->bankaccount_number,
            'bank_ifsc' => $request->bank_ifsc,
            'bank_brank' => $request->bank_brank,
            'bank_name' => $request->bank_name,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('vendor_bankdetails.index')
            ->with('success', 'Bank details added successfully.');
    }


    // EDIT / UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'vendor_id' => 'required|string|max:20',
            'bankaccount_name' => 'required|string|max:100',
            'bankaccount_number' => 'required|string|max:30',
            'bank_ifsc' => 'required|string|max:20',
            'bank_brank' => 'required|string|max:100',
            'bank_name' => 'required|string|max:100',
        ]);

        DB::table('vendor_bankdetails')
            ->where('id', $id)
            ->update([
                'vendor_id' => $request->vendor_id,
                'bankaccount_name' => $request->bankaccount_name,
                'bankaccount_number' => $request->bankaccount_number,
                'bank_ifsc' => $request->bank_ifsc,
                'bank_brank' => $request->bank_brank,
                'bank_name' => $request->bank_name,
                'updated_at' => now(),
            ]);

        return redirect()->route('vendor_bankdetails.index')
            ->with('success', 'Bank details updated successfully.');
    }
}