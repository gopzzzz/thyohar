<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    // LIST
    public function index()
    {
        $categories = DB::table('categories')
            ->orderBy('id', 'asc')
            ->get();

        return view('categories', compact('categories'));
    }


    // ADD
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|regex:/^[A-Za-z\s]+$/|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(
            public_path('uploads/categories'),
            $imageName
        );

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


    // EDIT
    public function edit($id)
    {
        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        if (!$category) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Category not found.');
        }

        $categories = DB::table('categories')
            ->orderBy('id', 'asc')
            ->get();

        return view('categories', compact('categories', 'category'));
    }


    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|regex:/^[A-Za-z\s]+$/|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:10240',
        ]);

        $category = DB::table('categories')
            ->where('id', $id)
            ->first();

        if (!$category) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Category not found.');
        }

        $imageName = $category->image;

        // If new image selected
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

            // Upload new image
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(
                public_path('uploads/categories'),
                $imageName
            );
        }

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
}