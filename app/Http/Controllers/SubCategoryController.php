<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category = null)
    {


        $subcategories = SubCategory::where('added_by', Auth::id());
        if($category != null)
        {
            $subcategories = $subcategories->where('category_id',$category->id);
        }
        $subcategories = $subcategories->orderBy('id','desc')->get();
        // return $subcategories;
        return view('users.subcategories.index', compact('subcategories','category'));
    }
    public function create()
    {
        $categories = Category::where('added_by', Auth::id())->orderBy('id','desc')->get();
        return view('users.subcategories.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|numeric',
        ]);

        SubCategory::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category,
            'added_by' => Auth::id(), // Associate the category with the authenticated user
        ]);

        return redirect()->route('users.subcategories.index',$request->category)->with('success', 'SubCategory created successfully.');
    }

    public function show(SubCategory $subcategory)
    {
        return view('users.subcategories.show', compact('subcategory'));
    }

    public function edit(SubCategory $subcategory)
    {
        $categories = Category::where('added_by', Auth::id())->orderBy('id','desc')->get();
        // Check if the authenticated user is authorized to edit the category
        if ($subcategory->added_by !== Auth::id()) {
            return redirect()->route('users.subcategories.index')->with('error', 'You are not authorized to edit this category.');
        }

        return view('users.subcategories.edit', compact('categories','subcategory'));
    }

    public function update(Request $request, SubCategory $subcategory)
    {
        // return $request->all();
        // Check if the authenticated user is authorized to update the category
        if ($subcategory->added_by !== Auth::id()) {
            return redirect()->route('dashboard')->with('error', 'You are not authorized to update this category.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category_description' => 'required|string',
            'category' => 'required',
        ]);

        $subcategory->update([
            'name' => $request->name,
            'description' => $request->category_description,
            'category_id' => $request->category
        ]);

        return redirect()->route('users.subcategories.index',$request->category)->with('success', 'SubCategory updated successfully.');
    }

    public function destroy(SubCategory $subcategory)
    {
        // Check if the authenticated user is authorized to delete the category
        if ($subcategory->added_by !== Auth::id()) {
            return redirect()->route('users.subcategories.index')->with('error', 'You are not authorized to delete this category.');
        }

        $subcategory->delete();

        return redirect()->route('users.subcategories.index')->with('success', 'SubCategory deleted successfully.');
    }
}
