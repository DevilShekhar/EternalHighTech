@extends('admin.layouts.app')

@section('content')
@if(auth()->check() && auth()->user()->role === 'admin')

<section class="section">
    <div class="section-header">
        <h1>Edit Blog</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Blog Wizard Form</h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" id="blogEditForm">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <div class="col-md-6 mb-2">
                            <button type="button" class="btn btn-primary btn-block" id="stepBtn1" onclick="showStep(1)">
                                1. Basic Info
                            </button>
                        </div>
                        <div class="col-md-6 mb-2">
                            <button type="button" class="btn btn-light btn-block" id="stepBtn2" onclick="showStep(2)">
                                2. Meta Details
                            </button>
                        </div>
                    </div>

                    <div id="step1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Heading</label>
                                    <input type="text" name="heading" class="form-control" value="{{ old('heading', $blog->heading) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Sub Heading</label>
                                    <input type="text" name="sub_heading" class="form-control" value="{{ old('sub_heading', $blog->sub_heading) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Heading Image</label>
                                    <input type="file" name="heading_image" class="form-control">
                                    @if($blog->heading_image)
                                        <div class="mt-2">
                                            <img src="{{ asset($blog->heading_image) }}" width="80" style="border-radius:8px;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($blog->image)
                                        <div class="mt-2">
                                            <img src="{{ asset($blog->image) }}" width="80" style="border-radius:8px;">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $blog->company_name) }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control summernote">{{ old('description', $blog->description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-primary" onclick="showStep(2)">Next</button>
                        </div>
                    </div>

                    <div id="step2" style="display:none;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" name="tags" class="form-control" value="{{ old('tags', $blog->tags) }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Title</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $blog->meta_title) }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ old('meta_keyword', $blog->meta_keyword) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{ old('meta_description', $blog->meta_description) }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ old('status', $blog->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $blog->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="text-right">
                            <button type="button" class="btn btn-light mr-2" onclick="showStep(1)">Previous</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<script>
    function showStep(step) {
        document.getElementById('step1').style.display = (step === 1) ? 'block' : 'none';
        document.getElementById('step2').style.display = (step === 2) ? 'block' : 'none';

        if (step === 1) {
            document.getElementById('stepBtn1').classList.remove('btn-light');
            document.getElementById('stepBtn1').classList.add('btn-primary');

            document.getElementById('stepBtn2').classList.remove('btn-primary');
            document.getElementById('stepBtn2').classList.add('btn-light');
        } else {
            document.getElementById('stepBtn2').classList.remove('btn-light');
            document.getElementById('stepBtn2').classList.add('btn-primary');

            document.getElementById('stepBtn1').classList.remove('btn-primary');
            document.getElementById('stepBtn1').classList.add('btn-light');
        }
    }
</script>
@else
    @php abort(403); @endphp
@endif
@endsection