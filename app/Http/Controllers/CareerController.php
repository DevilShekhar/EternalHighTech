<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::with(['creator', 'updater'])->latest()->get();
        return view('admin.career.index', compact('careers'));
    }

    public function create()
    {
        return view('admin.career.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'experience' => 'required|string|max:255',
            'industry' => 'required|string|max:255',
            'description' => 'required',
            'job_type' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->except('image');
        $data['created_by'] = auth()->id();
        $data['updated_by'] = null;
        $data['status'] = 1;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('careers', 'public');
        }

        Career::create($data);

        return redirect()->route('career.index')->with('success', 'Career created successfully.');
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);
        return view('admin.career.edit', compact('career'));
    }

    public function update(Request $request, $id)
    {
        $career = Career::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'description' => 'nullable',
            'job_type' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'status' => 'required|in:0,1',
        ]);

        $data = $request->except('image');
        $data['updated_by'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('careers', 'public');
        }

        $career->update($data);

        return redirect()->route('career.index')->with('success', 'Career updated successfully.');
    }

    public function destroy($id)
    {
        $career = Career::findOrFail($id);

        $career->update([
            'status' => 0,
            'updated_by' => auth()->id(),
        ]);

        return redirect()->route('career.index')->with('success', 'Career deactivated successfully.');
    }
}