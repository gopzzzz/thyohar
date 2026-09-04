<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorServicesController extends Controller
{
    // LIST
    public function index()
    {
        $vendorservices = DB::table('vendor_services')
            ->orderBy('id', 'asc')
            ->get();

        return view('vendor_services', compact('vendorservices'));
    }


    // ADD
    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required|string|max:20',
            'service_id' => 'required|integer',
        ]);

        DB::table('vendor_services')->insert([
            'vendor_id' => $request->vendor_id,
            'service_id' => $request->service_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('vendor_services.index')
            ->with('success', 'Vendor service added successfully.');
    }


    // EDIT / UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'vendor_id' => 'required|string|max:20',
            'service_id' => 'required|integer',
        ]);

        DB::table('vendor_services')
            ->where('id', $id)
            ->update([
                'vendor_id' => $request->vendor_id,
                'service_id' => $request->service_id,
                'updated_at' => now(),
            ]);

        return redirect()->route('vendor_services.index')
            ->with('success', 'Vendor service updated successfully.');
    }


    // DELETE
    public function destroy($id)
    {
        DB::table('vendor_services')
            ->where('id', $id)
            ->delete();

        return redirect()->route('vendor_services.index')
            ->with('success', 'Vendor service deleted successfully.');
    }
}