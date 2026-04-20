<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with(['category', 'creator', 'updater'])->latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::latest()->get();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'heading' => 'required|string|max:255',
            'sub_heading' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->heading);
        $originalSlug = $slug;
        $count = 1;

        while (Service::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $service = new Service();
        $service->category_id = $request->category_id;
        $service->heading = $request->heading;
        $service->sub_heading = $request->sub_heading;
        $service->slug = $slug;
        $service->status = 'Active';
        $service->meta_title = $request->meta_title;
        $service->meta_keyword = $request->meta_keyword;
        $service->meta_description = $request->meta_description;
        $service->created_by = Auth::id();
        $service->save();

        if ($request->has('extra_sections')) {
            foreach ($request->extra_sections as $section) {
                $imagePath = null;

                if (isset($section['image']) && $section['image'] instanceof \Illuminate\Http\UploadedFile) {
                    $file = $section['image'];
                    $filename = time() . '_extra_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/services'), $filename);
                    $imagePath = 'uploads/services/' . $filename;
                }

                ServiceSection::create([
                    'service_id'   => $service->id,
                    'section_no'   => $section['section_no'] ?? null,
                    'heading'      => $section['heading'] ?? null,
                    'sub_heading'  => $section['sub_heading'] ?? null,
                    'image'        => $imagePath,
                    'description'  => $section['description'] ?? null,
                ]);
            }
        }

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit($id)
    {
        $service = Service::with('extraSections')->findOrFail($id);
        $categories = ServiceCategory::latest()->get();

        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'heading' => 'required|string|max:255',
            'sub_heading' => 'nullable|string|max:255',
            'status' => 'required|in:Active,Inactive',
        ]);

        $slug = Str::slug($request->heading);
        $originalSlug = $slug;
        $count = 1;

        while (Service::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $service->category_id = $request->category_id;
        $service->heading = $request->heading;
        $service->sub_heading = $request->sub_heading;
        $service->slug = $slug;
        $service->status = $request->status;
        $service->meta_title = $request->meta_title;
        $service->meta_keyword = $request->meta_keyword;
        $service->meta_description = $request->meta_description;
        $service->updated_by = Auth::id();
        $service->save();

        if ($request->has('existing_extra_sections')) {
            foreach ($request->existing_extra_sections as $sectionId => $section) {
                $existingSection = ServiceSection::where('service_id', $service->id)
                    ->where('id', $sectionId)
                    ->first();

                if ($existingSection) {
                    $imagePath = $existingSection->image;

                    if (isset($section['image']) && $section['image'] instanceof \Illuminate\Http\UploadedFile) {
                        $file = $section['image'];
                        $filename = time() . '_extra_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path('uploads/services'), $filename);
                        $imagePath = 'uploads/services/' . $filename;
                    }

                    $existingSection->update([
                        'section_no'  => $section['section_no'] ?? $existingSection->section_no,
                        'heading'     => $section['heading'] ?? null,
                        'sub_heading' => $section['sub_heading'] ?? null,
                        'image'       => $imagePath,
                        'description' => $section['description'] ?? null,
                    ]);
                }
            }
        }

        $submittedExistingIds = collect($request->existing_extra_sections ?? [])
            ->keys()
            ->map(fn($id) => (int) $id)
            ->toArray();

        ServiceSection::where('service_id', $service->id)
            ->whereNotIn('id', $submittedExistingIds)
            ->delete();

        if ($request->has('new_extra_sections')) {
            foreach ($request->new_extra_sections as $section) {
                $imagePath = null;

                if (isset($section['image']) && $section['image'] instanceof \Illuminate\Http\UploadedFile) {
                    $file = $section['image'];
                    $filename = time() . '_extra_' . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads/services'), $filename);
                    $imagePath = 'uploads/services/' . $filename;
                }

                ServiceSection::create([
                    'service_id'   => $service->id,
                    'section_no'   => $section['section_no'] ?? null,
                    'heading'      => $section['heading'] ?? null,
                    'sub_heading'  => $section['sub_heading'] ?? null,
                    'image'        => $imagePath,
                    'description'  => $section['description'] ?? null,
                ]);
            }
        }

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

   public function destroy($id)
{
    $service = Service::findOrFail($id);

    ServiceSection::where('service_id', $service->id)->delete();
    $service->delete();

    return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
}
}