@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="container">
    <form  action="{{route('CreateTag')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <button type="submit" class="btn btn-primary">Create tags</button>
    </form>
</div>
@endsection
