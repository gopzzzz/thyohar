<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    // =========================================
    // LIST CATEGORIES
    // =========================================

    public function index()
    {
        $categories = DB::table('categories')
            ->orderBy('id', 'asc')
            ->get();

        return view('categories', compact('categories'));
    }


    // =========================================
    // ADD CATEGORY
    // =========================================

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|regex:/^[A-Za-z\s]+$/|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        // Create upload folder if it doesn't exist
        $uploadPath = public_path('uploads/categories');

        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        // Create image name
        $imageName = time() . '_' . $request->image->getClientOriginalName();

        // Upload image
        $request->image->move(
            $uploadPath,
            $imageName
        );

        // Insert category
        DB::table('categories')->insert([
            'category_name' => $request->category_name,
            'image' => $imageName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category added successfully.');
    }


    // =========================================
    // UPDATE CATEGORY
    // =========================================

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|regex:/^[A-Za-z\s]+$/|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        // Find category
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        if (!$category) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Category not found.');
        }

        // Keep old image
        $imageName = $category->image;

        // If new image is selected
        if ($request->hasFile('image')) {

            // Delete old image
            if ($category->image) {

                $oldImage = public_path(
                    'uploads/categories/' . $category->image
                );

                if (file_exists($oldImage)) {
                    unlink($oldImage);
                }
            }

            // Create upload folder if needed
            $uploadPath = public_path('uploads/categories');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // New image name
            $imageName = time() . '_' . $request->image->getClientOriginalName();

            // Upload new image
            $request->image->move(
                $uploadPath,
                $imageName
            );
        }

        // Update database
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'category_name' => $request->category_name,
                'image' => $imageName,
                'updated_at' => now(),
            ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }


    // =========================================
    // DELETE CATEGORY
    // =========================================

    public function destroy($id)
    {
        // Find category
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        if (!$category) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Category not found.');
        }

        // Delete image
        if ($category->image) {

            $imagePath = public_path(
                'uploads/categories/' . $category->image
            );

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete category
        DB::table('categories')
            ->where('id', $id)
            ->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}