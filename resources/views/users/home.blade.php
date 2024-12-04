@extends('layouts.header_footer')

@section('content')

@if($topics != null)
    @foreach($topics as $topic)
            <div class="posts_container">
                <div class="post_autorInfo">
                    <div style="display: flex; align-items: center;">
                        <img src="./img/usuario.png" alt="" class="userProfilePic">
                        <h2>{{$topic->post->user->name}}</h2>
                        <span>-</span>
                        <h3>{{$topic->created_at->format('H:i a')}}</h3>
                    </div>
                    <button class="dropdown-btn">...</button>
                    <div class="dropdown-menu">
                        <button class="dropdown-option">Editar</button>
                        <form action="{{ route('DeleteTopic', $topic->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-option">Delete</button>
                        </form>
                    </div>
                </div>

                <div class="post_content">
                    <h1>{{$topic -> title}}</h1>
                    <p>{{$topic -> description}}</p>
                    <img src="./img/Screenshot_5.png" alt="">
                </div>

                <div class="post_info">
                    <span class="likesContainer">
                        <button>🠕</button>
                        <span>123</span>
                        <button>🠗</button>
                    </span>
                    <a href="{{ route('ListTopicById', $topic->id) }}" class="commentsContainer">
                        <span class="">
                            <i class="far fa-comment"></i>
                            <span>123</span>
                        </span>
                    </a>
                </div>
            </div>
    @endforeach
<div class="inv"></div>
@else
    <div>
        <h1>Não existem tópicos no momento, seja o primeiro!</h1>
    </div>
@endif