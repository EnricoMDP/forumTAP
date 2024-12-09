@extends('layouts.header_footer')

@section('content')
<div class="posts_container">
    <div class="post_autorInfo">
        <div style="display: flex; align-items: center;">
            <img src="../main/img/usuario.png" alt="" class="userProfilePic">
            <h2>{{$topic->post->user->name}}</h2>
            <span>-</span>
            <h3>{{$topic->created_at->format('H:i a')}}</h3>
        </div>
        @if(auth()->check() && (auth()->user()->name === $topic->post->user->name || auth()->user()->name === 'admin'))
            <button class="dropdown-btn">...</button>
            <div class="dropdown-menu">
                @if(auth()->check() && (auth()->user()->name === $topic->post->user->name))
                    <a href="{{ route('EditTopic', $topic->id) }}" class="dropdown-option" style="text-decoration:none;">Editar</a>
                @endif
                <form action="{{ route('DeleteTopic', $topic->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-option">Delete</button>
                </form>
            </div>
        @endif
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
                <h3>{{$topic->created_at->format('H:i a')}}</h3>
            </div>
            @if(auth()->check() && (auth()->user()->name === $comment->user->name || auth()->user()->name === 'admin'))
                <button class="dropdown-btn">...</button>
                <div class="dropdown-menu">
                    @if(auth()->check() && (auth()->user()->name === $comment->user->name))
                        <a href="{{ route('EditComment', $comment->id, $topic->id) }}" class="dropdown-option" style="text-decoration:none;">Editar</a>
                    @endif
                    <form action="{{ route('DeleteComment', $comment->id, $topic->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-option">Delete</button>
                    </form>
                </div>
            @endif
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
        </div>
        @foreach ($comment->replies as $reply)
            <div class="replies_container">
                <div class="post_autorInfo">
                    <div style="display: flex; align-items: center;">
                        <img src="../main/img/usuario.png" alt="" class="userProfilePic">
                        <h2>{{ $comment->user->name ?? 'Anonymous' }}</h2>
                        <span>-</span>
                        <h3>{{$topic->created_at->format('H:i a')}}</h3>
                    </div>

                    @if(auth()->check() && (auth()->user()->name === $comment->user->name || auth()->user()->name === 'admin'))
                        <button class="dropdown-btn">...</button>
                        <div class="dropdown-menu">
                            @if(auth()->check() && (auth()->user()->name === $comment->user->name))
                                <a href="{{ route('EditComment', $reply->id) }}" class="dropdown-option" style="text-decoration:none;">Editar</a>
                            @endif
                            <form action="{{ route('DeleteComment', $reply->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-option">Delete</button>
                            </form>
                        </div>
                    @endif
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
                </div>
            </div>
        @endforeach
    </div>
    <form action="{{ route('CreateComment') }}" method="POST" class="mt-3">
        @csrf
        <input type="hidden" name="commentable_id" value="{{ $comment->id }}">
        <input type="hidden" name="commentable_type" value="App\Models\Comment">
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