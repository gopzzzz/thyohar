<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    // List Reviews
    public function index()
    {
        $reviews = DB::table('reviews')->get();

        return view('reviews', compact('reviews'));
    }

    // Add Review
    public function store(Request $request)
    {
        $request->validate([
            'vendor_id' => 'required',
            'reviews'   => 'required',
            'rating'    => 'required|integer|min:1|max:5',
        ]);

        DB::table('reviews')->insert([
            'vendor_id' => $request->vendor_id,
            'reviews'   => $request->reviews,
            'rating'    => $request->rating,
        ]);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review added successfully!');
    }

    // Update Review
    public function update(Request $request, $id)
    {
        $request->validate([
            'vendor_id' => 'required',
            'reviews'   => 'required',
            'rating'    => 'required|integer|min:1|max:5',
        ]);

        DB::table('reviews')
            ->where('id', $id)
            ->update([
                'vendor_id' => $request->vendor_id,
                'reviews'   => $request->reviews,
                'rating'    => $request->rating,
            ]);

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review updated successfully!');
    }

    // Delete Review
    public function destroy($id)
    {
        DB::table('reviews')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->route('reviews.index')
            ->with('success', 'Review deleted successfully!');
    }
}