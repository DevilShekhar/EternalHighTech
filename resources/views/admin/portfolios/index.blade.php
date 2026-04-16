@extends('admin.layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Portfolio List</h1>
    </div>

    <div class="section-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>All Portfolio Case Studies</h4>
                <a href="{{ route('portfolios.create') }}" class="btn btn-primary">Add New Portfolio</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sr No</th>
                                <th>Image</th>
                                <th>Heading</th>
                                <th>Sub Heading</th>
                                <th>Link One</th>
                                <th>Performance Title</th>
                                <th>Client Heading</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($portfolios as $key => $portfolio)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($portfolio->image)
                                            <img src="{{ asset('storage/' . $portfolio->image) }}" width="70" style="border-radius:8px;">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td>{{ $portfolio->heading ?? '-' }}</td>
                                    <td>{{ $portfolio->sub_heading ?? '-' }}</td>
                                    <td>
                                        @if($portfolio->link_one)
                                            <a href="{{ $portfolio->link_one }}" target="_blank">View Link</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{ $portfolio->meta_ads_title ?? '-' }}</td>
                                    <td>{{ $portfolio->feedback_heading ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                        <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this portfolio?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No portfolio records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection