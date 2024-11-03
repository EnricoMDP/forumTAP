@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="container">
    <form  action="{{route('CreateCategory')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
            <label for="title" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Category</button>
    </form>
</div>
@endsection
