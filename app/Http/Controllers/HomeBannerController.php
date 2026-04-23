<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeBannerController extends Controller
{
    public function index()
    {
        $homeBanners = HomeBanner::with(['creator', 'updater'])
            ->latest()
            ->get();

        return view('admin.home_banner.index', compact('homeBanners'));
    }

    public function create()
    {
        return view('admin.home_banner.create');
    }

    public function store(Request $request)
    {
                $request->validate([
                'heading' => 'required|string|max:255',
                'short_description' => 'required|string',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);
        

        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->heading) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home_banners'), $imageName);
        }

                HomeBanner::create([
                'heading' => $request->heading,
                'short_description' => $request->short_description,
                'image' => $imageName,
                'status' => 1,
                'created_by' => Auth::id(),
            ]);

        return redirect()->route('home-banner.index')->with('success', 'Home banner added successfully.');
    }

    public function edit($id)
    {
        $homeBanner = HomeBanner::findOrFail($id);
        return view('admin.home_banner.edit', compact('homeBanner'));
    }

    public function update(Request $request, $id)
    {
        $homeBanner = HomeBanner::findOrFail($id);

        $request->validate([
            'heading' => 'required|string|max:255',
            'short_description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:0,1',
        ]);

        $imageName = $homeBanner->image;

        if ($request->hasFile('image')) {
            if ($homeBanner->image && file_exists(public_path('uploads/home_banners/' . $homeBanner->image))) {
                unlink(public_path('uploads/home_banners/' . $homeBanner->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::slug($request->heading) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/home_banners'), $imageName);
        }

        $homeBanner->update([
            'heading' => $request->heading,
            'short_description' => $request->short_description,
            'image' => $imageName,
            'status' => $request->status,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('home-banner.index')->with('success', 'Home banner updated successfully.');
    }

   public function destroy($id)
{
    $homeBanner = HomeBanner::findOrFail($id);

    $homeBanner->update([
        'status' => 0,
        'updated_by' => auth()->id(),
    ]);

    return redirect()->route('home-banner.index')->with('success', 'Home banner marked as inactive successfully.');
}
}