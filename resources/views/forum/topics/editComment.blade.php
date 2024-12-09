@extends('layouts.header_footer')

@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">

    <span>{{ session('message') }}</span>

    @if($topic)
        <form action="{{ route('UpdateComment', [$comment->id]) }}" method="POST" class="itemX">
            @csrf
            @method('put')

            <div class="item2">
                <input type="hidden" name="commentable_id" value="{{ $comment->commentable_id }}">
                <input type="hidden" name="commentable_type" value="{{ $comment->commentable_type }}">
                <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                <label for="content" class="form-label">Comment:</label>
                <input type="text" id="content" name="content" class="form-control" value="{{ $comment->content }}" required>
            </div>

            <input type="submit" class="item4 button" value="Salvar">
        </form>
    @endif
</div>
@endsection
