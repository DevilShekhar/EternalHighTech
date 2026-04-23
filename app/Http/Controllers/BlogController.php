<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::with(['creator', 'updater'])->latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'sub_heading' => 'nullable|string|max:255',
            'heading_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'title' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'description' => 'required',
            'tags' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        $blog = new Blog();

        $blog->heading = $request->heading;
        $blog->sub_heading = $request->sub_heading;
        $blog->title = $request->title;
        $blog->company_name = $request->company_name;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        $blog->status = 'Active';
        $blog->created_by = Auth::id();
        $blog->updated_by = null;

        if ($request->hasFile('heading_image')) {
            $file = $request->file('heading_image');
            $filename = time() . '_heading.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $filename);
            $blog->heading_image = 'uploads/blog/' . $filename;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_image.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $filename);
            $blog->image = 'uploads/blog/' . $filename;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'heading' => 'required|string|max:255',
            'sub_heading' => 'nullable|string|max:255',
            'heading_image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'title' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'description' => 'required',
            'tags' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'status' => 'required|in:Active,Inactive',
        ]);

        $blog->heading = $request->heading;
        $blog->sub_heading = $request->sub_heading;
        $blog->title = $request->title;
        $blog->company_name = $request->company_name;
        $blog->description = $request->description;
        $blog->tags = $request->tags;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keyword = $request->meta_keyword;
        $blog->meta_description = $request->meta_description;
        $blog->status = $request->status;
        $blog->updated_by = Auth::id();

        if ($request->hasFile('heading_image')) {
            $file = $request->file('heading_image');
            $filename = time() . '_heading.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $filename);
            $blog->heading_image = 'uploads/blog/' . $filename;
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_image.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $filename);
            $blog->image = 'uploads/blog/' . $filename;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->update([
            'status' => 'Inactive',
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog deactivated successfully.');
    }
}