<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BannersController extends Controller
{
    // =====================================================
    // LIST BANNERS
    // =====================================================

    public function index()
    {
        $banners = DB::table('banners')
            ->orderBy('id', 'desc')
            ->get();

        return view('banners', compact('banners'));
    }


    // =====================================================
    // STORE NEW BANNER
    // =====================================================

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'bannercontent' => [
                'required',
                'string'
            ],

            'bannerimage' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'bannerlink' => [
                'nullable',
                'url',
                'max:500'
            ],
        ], [

            'bannercontent.required' =>
                'Please enter banner content.',

            'bannerimage.required' =>
                'Please select a banner image.',

            'bannerimage.image' =>
                'Banner image must be an image.',

            'bannerimage.mimes' =>
                'Banner image must be JPG, JPEG, PNG or WEBP.',

            'bannerimage.max' =>
                'Banner image size must not exceed 2 MB.',

            'bannerlink.url' =>
                'Please enter a valid banner link.',
        ]);


        // =================================================
        // UPLOAD IMAGE
        // =================================================

        $bannerImagePath = null;

        if ($request->hasFile('bannerimage')) {

            $file = $request->file('bannerimage');

            $folder = public_path('uploads/banners');

            // Create folder if it doesn't exist
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

            // Move image
            $file->move(
                $folder,
                $filename
            );

            // Save path
            $bannerImagePath =
                'uploads/banners/' .
                $filename;
        }


        // =================================================
        // INSERT INTO DATABASE
        // =================================================

        DB::table('banners')->insert([

            'bannercontent' =>
                $request->bannercontent,

            'bannerimage' =>
                $bannerImagePath,

            'bannerlink' =>
                $request->bannerlink,

            'created_at' =>
                now(),

            'updated_at' =>
                now(),

        ]);


        // =================================================
        // REDIRECT
        // =================================================

        return redirect()
            ->route('banners')
            ->with(
                'success',
                'Banner added successfully.'
            );
    }


    // =====================================================
    // SHOW EDIT BANNER
    // =====================================================

    public function edit($id)
    {
        $banner = DB::table('banners')
            ->where('id', $id)
            ->first();

        if (!$banner) {

            return redirect()
                ->route('banners')
                ->with(
                    'error',
                    'Banner not found.'
                );
        }

        return view(
            'edit_banner',
            compact('banner')
        );
    }


    // =====================================================
    // UPDATE BANNER
    // =====================================================

    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'bannercontent' => [
                'required',
                'string'
            ],

            'bannerimage' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048'
            ],

            'bannerlink' => [
                'nullable',
                'url',
                'max:500'
            ],
        ], [

            'bannercontent.required' =>
                'Please enter banner content.',

            'bannerimage.image' =>
                'Banner image must be an image.',

            'bannerimage.mimes' =>
                'Banner image must be JPG, JPEG, PNG or WEBP.',

            'bannerimage.max' =>
                'Banner image size must not exceed 2 MB.',

            'bannerlink.url' =>
                'Please enter a valid banner link.',
        ]);


        // =================================================
        // FIND BANNER
        // =================================================

        $banner = DB::table('banners')
            ->where('id', $id)
            ->first();

        if (!$banner) {

            return redirect()
                ->route('banners')
                ->with(
                    'error',
                    'Banner not found.'
                );
        }


        // =================================================
        // KEEP OLD IMAGE
        // =================================================

        $bannerImagePath = $banner->bannerimage;


        // =================================================
        // NEW IMAGE
        // =================================================

        if ($request->hasFile('bannerimage')) {

            $file = $request->file('bannerimage');

            $folder = public_path('uploads/banners');

            // Create folder if necessary
            if (!File::exists($folder)) {

                File::makeDirectory(
                    $folder,
                    0755,
                    true
                );
            }

            // New filename
            $filename =
                time() . '_' .
                $file->getClientOriginalName();

            // Upload new image
            $file->move(
                $folder,
                $filename
            );


            // =================================================
            // DELETE OLD IMAGE
            // =================================================

            if (!empty($banner->bannerimage)) {

                $oldImage =
                    public_path(
                        $banner->bannerimage
                    );

                if (File::exists($oldImage)) {

                    File::delete($oldImage);
                }
            }


            // New image path
            $bannerImagePath =
                'uploads/banners/' .
                $filename;
        }


        // =================================================
        // UPDATE DATABASE
        // =================================================

        DB::table('banners')
            ->where('id', $id)
            ->update([

                'bannercontent' =>
                    $request->bannercontent,

                'bannerimage' =>
                    $bannerImagePath,

                'bannerlink' =>
                    $request->bannerlink,

                'updated_at' =>
                    now(),

            ]);


        // =================================================
        // REDIRECT
        // =================================================

        return redirect()
            ->route('banners')
            ->with(
                'success',
                'Banner updated successfully.'
            );
    }


    // =====================================================
    // DELETE BANNER
    // =====================================================

    public function destroy($id)
    {
        // Find banner
        $banner = DB::table('banners')
            ->where('id', $id)
            ->first();

        if (!$banner) {

            return redirect()
                ->route('banners')
                ->with(
                    'error',
                    'Banner not found.'
                );
        }


        // =================================================
        // DELETE IMAGE
        // =================================================

        if (!empty($banner->bannerimage)) {

            $imagePath =
                public_path(
                    $banner->bannerimage
                );

            if (File::exists($imagePath)) {

                File::delete($imagePath);
            }
        }


        // =================================================
        // DELETE DATABASE RECORD
        // =================================================

        DB::table('banners')
            ->where('id', $id)
            ->delete();


        // =================================================
        // REDIRECT
        // =================================================

        return redirect()
            ->route('banners')
            ->with(
                'success',
                'Banner deleted successfully.'
            );
    }
}