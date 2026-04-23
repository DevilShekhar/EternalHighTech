<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'link_one' => 'nullable|url',
            'link_two' => 'nullable|url',
            'results_delivered' => 'nullable',
            'meta_ads_title' => 'nullable|string|max:255',
            'performance_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'feedback_heading' => 'nullable|string|max:255',
            'client_name' => 'nullable|string|max:255',
            'feedback_description' => 'nullable',
            'feedback_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
        ]);

        $data = $request->except(['image', 'performance_image', 'feedback_image']);

        $data['status'] = 1;
        $data['title'] = $request->heading;
        $data['slug'] = Str::slug($request->heading . '-' . time());

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        if ($request->hasFile('performance_image')) {
            $data['performance_image'] = $request->file('performance_image')->store('portfolios', 'public');
        }

        if ($request->hasFile('feedback_image')) {
            $data['feedback_image'] = $request->file('feedback_image')->store('portfolios', 'public');
        }

        Portfolio::create($data);

        return redirect()->route('portfolios.index')->with('success', 'Portfolio created successfully.');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $request->validate([
            'heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'description' => 'required',
            'results_delivered' => 'nullable',
            'link_one' => 'nullable|url',
            'link_two' => 'nullable|url',
            'meta_ads_title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'performance_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'feedback_heading' => 'nullable|string|max:255',
            'feedback_description' => 'nullable',
            'client_name' => 'nullable|string|max:255',
            'feedback_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable',
            'meta_keyword' => 'nullable',
            'status' => 'required|in:0,1',
        ]);

        $data = $request->except(['image', 'performance_image', 'feedback_image']);

        $data['title'] = $request->heading;
        $data['slug'] = Str::slug($request->heading . '-' . time());

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        if ($request->hasFile('performance_image')) {
            $data['performance_image'] = $request->file('performance_image')->store('portfolios', 'public');
        }

        if ($request->hasFile('feedback_image')) {
            $data['feedback_image'] = $request->file('feedback_image')->store('portfolios', 'public');
        }

        $portfolio->update($data);

        return redirect()->route('portfolios.index')->with('success', 'Portfolio updated successfully.');
    }

 
     public function destroy(Portfolio $portfolio)
    {
        $portfolio->update([
            'status' => 0,
          
        ]);

        return redirect()
            ->route('portfolios.index')
            ->with('success', 'portfolio deactivated successfully.');
    }
}