<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorPackagesController extends Controller
{
    // =====================================================
    // LIST VENDOR PACKAGES
    // =====================================================

    public function index()
    {
        $vendorpackages = DB::table('vendorpackages')
            ->orderBy('id', 'desc')
            ->get();

        return view('vendorpackages', compact('vendorpackages'));
    }


    // =====================================================
    // STORE NEW VENDOR PACKAGE
    // =====================================================

    public function store(Request $request)
{
    $request->validate([
        'package_name' => 'required|string|max:255',
        'service_id' => 'required',
        'package_bio' => 'required|string',
        'package_amount' => 'required|numeric',
        'package_offer_price' => 'nullable|numeric',
    ], [
        'package_name.required' => 'Please enter package name.',
        'service_id.required' => 'Please enter service ID.',
        'package_bio.required' => 'Please enter package bio.',
        'package_amount.required' => 'Please enter package amount.',
        'package_amount.numeric' => 'Package amount must be a number.',
        'package_offer_price.numeric' => 'Offer price must be a number.',
    ]);

    DB::table('vendorpackages')->insert([
        'package_name' => $request->package_name,
        'service_id' => $request->service_id,
        'package_bio' => $request->package_bio,
        'package_amount' => $request->package_amount,
        'package_offer_price' => $request->package_offer_price,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()
        ->route('vendorpackages')
        ->with('success', 'Vendor package added successfully.');
}

    // =====================================================
    // EDIT VENDOR PACKAGE
    // =====================================================

   public function edit($id)
{
    $vendorpackage = DB::table('vendorpackages')
        ->where('id', $id)
        ->first();

    if (!$vendorpackage) {
        return redirect()
            ->route('vendorpackages')
            ->with('error', 'Vendor package not found.');
    }

    $vendorpackages = DB::table('vendorpackages')
        ->orderBy('id', 'desc')
        ->get();

    return view('vendorpackages', compact(
        'vendorpackages',
        'vendorpackage'
    ));
}


    // =====================================================
    // UPDATE VENDOR PACKAGE
    // =====================================================

    public function update(Request $request, $id)
    {
        $request->validate([
            'package_name' => 'required|string|max:255',
            'service_id' => 'required',
            'package_bio' => 'required|string',
            'package_amount' => 'required|numeric',
            'package_offer_price' => 'nullable|numeric',
        ], [
            'package_name.required' => 'Please enter package name.',
            'service_id.required' => 'Please enter service ID.',
            'package_bio.required' => 'Please enter package bio.',
            'package_amount.required' => 'Please enter package amount.',
            'package_amount.numeric' => 'Package amount must be a number.',
            'package_offer_price.numeric' => 'Offer price must be a number.',
        ]);


        // Check package exists
        $vendorpackage = DB::table('vendorpackages')
            ->where('id', $id)
            ->first();


        if (!$vendorpackage) {

            return redirect()
                ->route('vendorpackages')
                ->with('error', 'Vendor package not found.');
        }


        // Update package
        DB::table('vendorpackages')
            ->where('id', $id)
            ->update([
                'package_name' => $request->package_name,
                'service_id' => $request->service_id,
                'package_bio' => $request->package_bio,
                'package_amount' => $request->package_amount,
                'package_offer_price' => $request->package_offer_price,
            ]);


        return redirect()
            ->route('vendorpackages')
            ->with('success', 'Vendor package updated successfully.');
    }
}