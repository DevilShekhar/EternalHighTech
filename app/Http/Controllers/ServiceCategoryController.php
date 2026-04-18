<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::with(['creator', 'updater'])->latest()->get();
        return view('admin.service-category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.service-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $slug = Str::slug($request->category_name);
        $originalSlug = $slug;
        $count = 1;

        while (ServiceCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        ServiceCategory::create([
            'category_name' => $request->category_name,
            'slug' => $slug,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('service-category.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = ServiceCategory::findOrFail($id);
        return view('admin.service-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ServiceCategory::findOrFail($id);

        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $slug = Str::slug($request->category_name);
        $originalSlug = $slug;
        $count = 1;

        while (ServiceCategory::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $category->update([
            'category_name' => $request->category_name,
            'slug' => $slug,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('service-category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = ServiceCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('service-category.index')->with('success', 'Category deleted successfully.');
    }
}