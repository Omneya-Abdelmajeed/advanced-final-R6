<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\Common;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use Common;
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        //Retrieve all categories from the database
        $categories = Category::get();

        // Return the view with the list of categories.
        return view('admin.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        // Return the view for creating a new category.
        return view('admin.add_category');
    }

    /**
     * Store a newly created category in Database.
     */
    public function store(Request $request)
    {
        // Validate the requested data.
        $data = $request->validate([
            'categoryName' => 'required|string|max:100|unique:categories,categoryName',
        ]);
        // Create a new category using the validated data.
        Category::create($data);

        // Redirect to the category index page which contain all categories.
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(string $id)
    {
        // Find the category by id or fail if not found.
        $category = Category::findOrfail($id);

        // Return the view for editing the category.
        return view('admin.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the requested data.
        $data = $request->validate([
            'categoryName' => 'required|string|max:100|unique:categories,categoryName',
        ]);
        // Update the category with the specified id
        Category::where('id', $id)->update($data);

        // Redirect to the category index page which contain all categories.
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified category from database.
     */
    public function destroy(string $id)
    {
        // Delete the category with the specified id
        Category::where('id', $id)->delete();

        // Redirect to the category index page which contain all categories.
        return redirect()->route('admin.categories.index');
    }
}
