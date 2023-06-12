<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::where('added_by', Auth::id())->orderBy('id','desc')->get();
        return view('users.categories.index', compact('categories'));
    }
    public function create()
    {
        return view('users.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_description' => 'required|string',
        ]);

        Category::create([
            'name' => $request->name,
            'category_description' => $request->category_description,
            'added_by' => Auth::id(), // Associate the category with the authenticated user
        ]);

        return redirect()->route('users.categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('users.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        // Check if the authenticated user is authorized to edit the category
        if ($category->added_by !== Auth::id()) {
            return redirect()->route('users.categories.index')->with('error', 'You are not authorized to edit this category.');
        }

        return view('users.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Check if the authenticated user is authorized to update the category
        if ($category->added_by !== Auth::id()) {
            return redirect()->route('users.categories.index')->with('error', 'You are not authorized to update this category.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'category_description' => 'required|string',
        ]);

        $category->update([
            'name' => $request->name,
            'category_description' => $request->category_description
        ]);

        return redirect()->route('users.categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Check if the authenticated user is authorized to delete the category
        if ($category->added_by !== Auth::id()) {
            return redirect()->route('users.categories.index')->with('error', 'You are not authorized to delete this category.');
        }

        $category->delete();

        return redirect()->route('users.categories.index')->with('success', 'Category deleted successfully.');
    }
}
