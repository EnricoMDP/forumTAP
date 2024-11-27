@extends('layouts.header_cauan')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">{{ $topic->title }}</h1>
    <p class="text-muted text-center">{{ $topic->description }}</p>

    <!-- Comentários -->
    <h3 class="mt-5">Comments</h3>

    <!-- Formulário para adicionar comentário -->
    <form id="createCommentForm" action="{{ route('createComment') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" id="comment-post-id" value="">
        <input type="hidden" name="topic_id" id="comment-topic-id" value="">
        <input type="hidden" name="commentable_id" id="comment-commentable-id" value="">
        <div class="mb-3">
            <label for="content" class="form-label">Comment</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>

    <div class="mt-3">
        @foreach ($topic->comments as $comment)
            <div class="card mb-3">
                <div class="card-body">
                    <p>{{ $comment->content }}</p>
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Posted by: {{ $comment->user->name ?? 'Anonymous' }}</small>
                        <div>
                            <!-- Botão para abrir formulário de edição -->
                            <button class="btn btn-link text-warning p-0" onclick="toggleEditForm('{{ $comment->id }}')">Edit</button>

                            <!-- Formulário para excluir comentário -->
                            <form action="{{ route('deleteComment', $comment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0">Delete</button>
                            </form>
                        </div>
                    </div>

                    <!-- Respostas -->
                    <div class="mt-3 ms-4">
                        @foreach ($comment->replies as $reply)
                            <div class="card mb-2">
                                <div class="card-body">
                                    <p>{{ $reply->content }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Formulário para responder -->
                    <form id="createReplyForm" action="{{ route('createComment') }}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" id="comment-post-id" value="">
                        <input type="hidden" name="topic_id" id="comment-topic-id" value="">
                        <input type="hidden" name="commentable_id" id="comment-commentable-id" value="">
                        <div class="mb-3">
                            <label for="content" class="form-label">Comment</label>
                            <textarea class="form-control" id="content" name="content" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    function toggleEditForm(commentId) {
        const editForm = document.getElementById(`edit-form-${commentId}`);
        editForm.classList.toggle('d-none');
    }
</script>
@endsection
