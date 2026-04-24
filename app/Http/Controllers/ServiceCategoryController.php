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
        $serviceCategories = ServiceCategory::with(['creator', 'updater'])->latest()->get();
        return view('admin.service-category.index', compact('serviceCategories'));
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

        ServiceCategory::create([
            'category_name' => $request->category_name,
            'slug' => \Illuminate\Support\Str::slug($request->category_name),
            'status' => 1,
            'created_by' => auth()->id(),
            'updated_by' => null,
        ]);

        return redirect()->route('service-category.index')->with('success', 'Service category created successfully.');
    }

    public function edit($id)
    {
        $category = ServiceCategory::findOrFail($id);
        return view('admin.service-category.edit', compact('category'));
    }

   public function update(Request $request, ServiceCategory $serviceCategory)
{
    $request->validate([
        'category_name' => 'required|string|max:255',
        'status' => 'required|in:0,1',
    ]);

    $baseSlug = Str::slug($request->category_name);
    $slug = $baseSlug;
    $count = 1;

    while (
        ServiceCategory::where('slug', $slug)
            ->where('id', '!=', $serviceCategory->id)
            ->exists()
    ) {
        $slug = $baseSlug . '-' . $count;
        $count++;
    }

    $serviceCategory->update([
        'category_name' => $request->category_name,
        'slug' => $slug,
        'status' => $request->status,
        'updated_by' => auth()->id(),
    ]);

    return redirect()->route('service-category.index')
        ->with('success', 'Service category updated successfully.');
}
    public function destroy($id)
    {
        $serviceCategory = ServiceCategory::findOrFail($id);

        $serviceCategory->update([
            'status' => 0,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('service-category.index')->with('success', 'Service category deactivated successfully.');
    }
}