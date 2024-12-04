@extends('layouts.header_footer')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Categories</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('CreateCategory') }}" class="btn btn-secondary">Add New Category</a>
    </div>

    <table class="table table-bordered table-striped table-info table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('EditCategory', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('DeleteCategory', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No categories available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
