@extends('layouts.header_footer')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Tags</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('CreateTag') }}" class="btn btn-secondary">Add New Tag</a>
    </div>

    <table class="table table-bordered table-striped table-info table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->title }}</td>
                    <td>
                        <a href="{{ route('EditTag', $tag->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('DeleteTag', $tag->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No tags available.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
