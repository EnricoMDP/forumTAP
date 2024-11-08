@extends('layouts.header_cauan')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
<div class="topic-container">
    <h1 class="text-center">All Topics</h1>
    <div class="text-center mb-3">
        <a class="btn-purple" href="{{ route('createTopic') }}">
            Create New Topic
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="table-responsive mx-auto" style="width: 100%;">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topics as $topic)
                    <tr>
                        <td>{{ $topic->id }}</td>
                        <td>{{ $topic->title }}</td>
                        <td>{{ $topic->description }}</td>
                        <td>
                            @if($topic->post)
                                <img src="{{ asset('img/' . $topic->post->image) }}" alt="Image" width="50">
                            @else
                                <span>No Image</span> 
                            @endif
                        </td>
                        <td>{{ $topic->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>{{ $topic->category->title }}</td>
                        <td>
                            <a href="{{ route('listTopicById', $topic->id) }}" class="btn btn-success">View</a>
                            <a href="{{ route('editTopic', $topic->id) }}" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editTopicModal"
                               data-id="{{ $topic->id }}" data-title="{{ $topic->title }}" 
                               data-description="{{ $topic->description }}" data-status="{{ $topic->status }}"
                               data-category="{{ $topic->category_id }}">Edit</a>
                            <button class="btn btn-danger" onclick="deleteTopic({{ $topic->id }})">Delete</button>
                            <form id="delete-form-{{ $topic->id }}" action="{{ route('deleteTopic', $topic->id) }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection