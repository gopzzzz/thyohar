<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorServicesController extends Controller
{
    /**
     * Display Vendor Services list
     */
    public function index()
    {
        $vendorservices = DB::table('vendor_services')
            ->leftJoin(
                'vendors',
                'vendor_services.vendor_id',
                '=',
                'vendors.id'
            )
            ->leftJoin(
                'categories',
                'vendor_services.service_id',
                '=',
                'categories.id'
            )
            ->select(
                'vendor_services.id',
                'vendor_services.vendor_id',
                'vendor_services.service_id',
                'vendor_services.created_at',
                'vendor_services.updated_at',

                'vendors.vendor_name',

                'categories.category_name'
            )
            ->orderBy('vendor_services.id', 'desc')
            ->get();


        // Get all vendors for dropdown
        $vendors = DB::table('vendors')
            ->orderBy('vendor_name', 'asc')
            ->get();


        // Get all categories for dropdown
        // vendor_services.service_id stores category ID
        $categories = DB::table('categories')
            ->orderBy('category_name', 'asc')
            ->get();


        return view(
            'vendor_services',
            compact(
                'vendorservices',
                'vendors',
                'categories'
            )
        );
    }


    /**
     * Store Vendor Category
     */
    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',

            'service_id' => 'required|exists:categories,id',
        ]);


        DB::table('vendor_services')->insert([

            'vendor_id' => $request->vendor_id,

            // service_id stores CATEGORY ID
            'service_id' => $request->service_id,

            'created_at' => now(),

            'updated_at' => now(),

        ]);


        return redirect()
            ->route('vendor_services.index')
            ->with(
                'success',
                'Vendor category added successfully.'
            );
    }


    /**
     * Update Vendor Category
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'vendor_id' => 'required|exists:vendors,id',

            'service_id' => 'required|exists:categories,id',
        ]);


        $vendorService = DB::table('vendor_services')
            ->where('id', $id)
            ->first();


        if (!$vendorService) {

            return redirect()
                ->route('vendor_services.index')
                ->with(
                    'error',
                    'Vendor service record not found.'
                );
        }


        DB::table('vendor_services')
            ->where('id', $id)
            ->update([

                'vendor_id' => $request->vendor_id,

                // service_id stores CATEGORY ID
                'service_id' => $request->service_id,

                'updated_at' => now(),

            ]);


        return redirect()
            ->route('vendor_services.index')
            ->with(
                'success',
                'Vendor category updated successfully.'
            );
    }


    /**
     * Delete Vendor Category
     */
    public function destroy($id)
    {
        $vendorService = DB::table('vendor_services')
            ->where('id', $id)
            ->first();


        if (!$vendorService) {

            return redirect()
                ->route('vendor_services.index')
                ->with(
                    'error',
                    'Vendor service record not found.'
                );
        }


        DB::table('vendor_services')
            ->where('id', $id)
            ->delete();


        return redirect()
            ->route('vendor_services.index')
            ->with(
                'success',
                'Vendor category deleted successfully.'
            );
    }
}