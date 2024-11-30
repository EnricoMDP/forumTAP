@extends('layouts.header_footer')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
@section('content')
<div class="container">
    <h1>Create New Topic</h1>
    <form action="{{ route('createTopic') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="description">Status</label>
            <input type="number" class="form-control" id="status" name="status" rows="3" required></input>
        </div>

        <select  type="" id="category" name="category" value="">
        @foreach ($categories as $category)
            <option value = "{{$category->id}}">
                {{$category -> title}}
            </option>
        @endforeach
        </select>

        <label for="tags">Tags</label>
        <select name="tags[]" id="tags" multiple>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>


        <button type="submit" class="btn btn-primary">Create Topic</button>
    </form>
</div>
@endsection