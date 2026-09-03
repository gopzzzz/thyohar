<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class VendorsController extends Controller
{
    // =====================================================
    // SHOW VENDOR LIST
    // =====================================================

    public function index()
    {
        $vendors = DB::table('vendors')
            ->orderBy('id', 'desc')
            ->get();

        return view('vendors', compact('vendors'));
    }


    // =====================================================
    // SHOW EDIT VENDOR PAGE
    // =====================================================

    public function edit($id)
    {
        $vendor = DB::table('vendors')
            ->where('id', $id)
            ->first();

        if (!$vendor) {

            return redirect()
                ->route('vendors')
                ->with('error', 'Vendor not found.');
        }

        return view('edit_vendor', compact('vendor'));
    }


    // =====================================================
    // STORE NEW VENDOR
    // =====================================================

    public function store(Request $request)
    {
        // Validation

        $request->validate([

            'vendor_name' => [
                'required',
                'string',
                'max:255'
            ],

            'phone_number' => [
                'required',
                'digits:10'
            ],

            'mail_id' => [
                'required',
                'email',
                'max:255'
            ],

            'address' => [
                'required',
                'string'
            ],

            'bio' => [
                'required',
                'string'
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

        ], [

            'vendor_name.required' =>
                'Please enter vendor name.',

            'phone_number.required' =>
                'Please enter phone number.',

            'phone_number.digits' =>
                'Phone number must be exactly 10 digits.',

            'mail_id.required' =>
                'Please enter mail ID.',

            'mail_id.email' =>
                'Please enter a valid email address.',

            'address.required' =>
                'Please enter address.',

            'bio.required' =>
                'Please enter vendor bio.',

            'logo.image' =>
                'Logo must be an image.',

            'logo.mimes' =>
                'Logo must be JPG, JPEG, PNG or WEBP.',

            'logo.max' =>
                'Logo size must not exceed 2 MB.',
        ]);


        // =================================================
        // LOGO UPLOAD
        // =================================================

        $logoPath = null;

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $folder = public_path('uploads/vendors');

            // Create folder if it does not exist

            if (!File::exists($folder)) {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );
            }


            // Create unique filename

            $filename =
                time() . '_' .
                $file->getClientOriginalName();


            // Move file

            $file->move(
                $folder,
                $filename
            );


            // Save path

            $logoPath =
                'uploads/vendors/' .
                $filename;
        }


        // =================================================
        // INSERT VENDOR
        // =================================================

        DB::table('vendors')->insert([

            'vendor_name' =>
                $request->vendor_name,

            'phone_number' =>
                $request->phone_number,

            'mail_id' =>
                $request->mail_id,

            'address' =>
                $request->address,

            'bio' =>
                $request->bio,

            'logo' =>
                $logoPath,

            'created_at' =>
                now(),

            'updated_at' =>
                now(),

        ]);


        // =================================================
        // REDIRECT
        // =================================================

        return redirect()
            ->route('vendors')
            ->with(
                'success',
                'Vendor added successfully.'
            );
    }


    // =====================================================
    // UPDATE VENDOR
    // =====================================================

    public function update(Request $request, $id)
    {
        // =================================================
        // VALIDATION
        // =================================================

        $request->validate([

            'vendor_name' => [
                'required',
                'string',
                'max:255'
            ],

            'phone_number' => [
                'required',
                'digits:10'
            ],

            'mail_id' => [
                'required',
                'email',
                'max:255'
            ],

            'address' => [
                'required',
                'string'
            ],

            'bio' => [
                'required',
                'string'
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

        ], [

            'vendor_name.required' =>
                'Please enter vendor name.',

            'phone_number.required' =>
                'Please enter phone number.',

            'phone_number.digits' =>
                'Phone number must be exactly 10 digits.',

            'mail_id.required' =>
                'Please enter mail ID.',

            'mail_id.email' =>
                'Please enter a valid email address.',

            'address.required' =>
                'Please enter address.',

            'bio.required' =>
                'Please enter vendor bio.',

            'logo.image' =>
                'Logo must be an image.',

            'logo.mimes' =>
                'Logo must be JPG, JPEG, PNG or WEBP.',

            'logo.max' =>
                'Logo size must not exceed 2 MB.',
        ]);


        // =================================================
        // FIND VENDOR
        // =================================================

        $vendor = DB::table('vendors')
            ->where('id', $id)
            ->first();


        if (!$vendor) {

            return redirect()
                ->route('vendors')
                ->with(
                    'error',
                    'Vendor not found.'
                );
        }


        // =================================================
        // KEEP OLD LOGO
        // =================================================

        $logoPath = $vendor->logo;


        // =================================================
        // NEW LOGO UPLOAD
        // =================================================

        if ($request->hasFile('logo')) {

            $file = $request->file('logo');

            $folder = public_path('uploads/vendors');


            // Create folder if necessary

            if (!File::exists($folder)) {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );
            }


            // Create new filename

            $filename =
                time() . '_' .
                $file->getClientOriginalName();


            // Move new logo

            $file->move(
                $folder,
                $filename
            );


            // =================================================
            // DELETE OLD LOGO
            // =================================================

            if (!empty($vendor->logo)) {

                $oldLogo =
                    public_path($vendor->logo);

                if (File::exists($oldLogo)) {

                    File::delete($oldLogo);
                }
            }


            // Save new logo path

            $logoPath =
                'uploads/vendors/' .
                $filename;
        }


        // =================================================
        // UPDATE DATABASE
        // =================================================

        DB::table('vendors')
            ->where('id', $id)
            ->update([

                'vendor_name' =>
                    $request->vendor_name,

                'phone_number' =>
                    $request->phone_number,

                'mail_id' =>
                    $request->mail_id,

                'address' =>
                    $request->address,

                'bio' =>
                    $request->bio,

                'logo' =>
                    $logoPath,

                'updated_at' =>
                    now(),

            ]);


        // =================================================
        // REDIRECT
        // =================================================

        return redirect()
            ->route('vendors')
            ->with(
                'success',
                'Vendor updated successfully.'
            );
    }
}