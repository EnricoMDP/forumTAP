@extends('layouts.header_footer')

@section('content')
<div class="posts_container">
    <div class="post_autorInfo">
        <div style="display: flex; align-items: center;">
            <img src="../main/img/usuario.png" alt="" class="userProfilePic">
            <h2>Enriquinho123</h2>
            <span>-</span>
            <h3>12 horas atrás</h3>
        </div>
        <button class="dropdown-btn">...</button>
        <div class="dropdown-menu">
            <button class="dropdown-option">Editar</button>
            <button class="dropdown-option">Excluir</button>
        </div>
    </div>

    <div class="post_content">
        <h1>{{$topic -> title}}</h1>
        <p>{{ $topic->description }}</p>
        <img src="../main/img/Screenshot_5.png" alt="">
    </div>

    <div class="post_info">
        <span class="likesContainer">
            <button>🠕</button>
            <span>123</span>
            <button>🠗</button>
        </span>
        <a href="" class="commentsContainer">
            <span>
            </span>V<span>
            </span>123</span>
            <span>
        </a>
    </div>
</div>


<form action="{{ route('CreateComment') }}" method="POST" class="mt-5">
    @csrf
    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <input type="text" name="content" id="searchBarPost" placeholder="Enter your comment">
    <button type="submit" class="btn btn-success">Add Comment</button>
</form>

@foreach ($topic->comments->where('commentable_type', 'App\Models\Post') as $comment)
    <div class="comments_container">
        <div class="post_autorInfo">
            <div style="display: flex; align-items: center;">
                <img src="../main/img/usuario.png" alt="" class="userProfilePic">
                <h2>{{ $comment->user->name ?? 'Anonymous' }}</h2>
                <span>-</span>
                <h3>12 horas atrás</h3>
            </div>
            <button class="dropdown-btn">...</button>
            <div class="dropdown-menu">
                <button class="dropdown-option" onclick="toggleEditForm('{{$comment->id}}')">Editar</button>
                <form action="{{ route('DeleteComment', $comment->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-option">Delete</button>
                </form>
            </div>
        </div>

        <div class="post_content">
            <p>{{ $comment->content }}</p>
        </div>

        <div class="post_info">
            <span class="likesContainer">
                <button>🠕</button>
                <span>123</span>
                <button>🠗</button>
            </span>
            <a href="" class="commentsContainer">
                <span>
                </span>V<span>
                </span>123</span>
                <span>
            </a>
        </div>
    </div>

    @foreach ($comment->replies as $reply)
        <div class="comments_container">
            <div class="post_autorInfo">
                <div style="display: flex; align-items: center;">
                    <img src="../main/img/usuario.png" alt="" class="userProfilePic">
                    <h2>{{ $comment->user->name ?? 'Anonymous' }}</h2>
                    <span>-</span>
                    <h3>12 horas atrás</h3>
                </div>
                <button class="dropdown-btn">...</button>
                <div class="dropdown-menu">
                    <button class="dropdown-option" onclick="toggleEditForm('{{$comment->id}}')">Editar</button>

                    <form action="{{ route('DeleteComment', $reply->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-option">Delete</button>
                    </form>
                </div>
            </div>

            <div class="post_content">
                <p>{{ $reply->content }}</p>
            </div>

            <div class="post_info">
                <span class="likesContainer">
                    <button>🠕</button>
                    <span>123</span>
                    <button>🠗</button>
                </span>
                <a href="" class="commentsContainer">
                    <span>
                    </span>V<span>
                    </span>123</span>
                    <span>
                </a>
            </div>
        </div>
    @endforeach
    <form action="{{ route('CreateComment') }}" method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="commentable_id" value="{{ $comment->id }}">
        <input type="hidden" name="commentable_type" value="App\Models\Comment">
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <input type="text" name="content" id="searchBarPost" placeholder="Write a reply">
        <button type="submit" class="btn btn-primary btn-sm">Reply</button>
    </form>
@endforeach
<div class="inv"></div>

<script>
    function toggleEditForm(commentId) {
        const editForm = document.getElementById(`edit-form-${commentId}`);
        editForm.classList.toggle('d-none'); 
    }
</script>
@endsection