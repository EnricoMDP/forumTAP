@extends('layouts.header_footer')

@section('content')

@if($topics != null)
    @foreach($topics as $topic)
        <a href="{{ route('ListTopicById', $topic->id) }}" class="text-decoration-none text-dark">
            <div class="posts_container">
                <div class="post_autorInfo">
                    <div style="display: flex; align-items: center;">
                        <img src="./img/usuario.png" alt="" class="userProfilePic">
                        <h2>{{$topic->post->user->name}}</h2>
                        <span>-</span>
                        <h3>{{$topic->created_at->format('H:i a')}}</h3>
                    </div>
                    <button>...</button>
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

                    <span class="commentsContainer">
                        <i class="far fa-comment"></i>
                        <span>123</span>
                    </span>
                </div>
            </div>
        </a>
    @endforeach
@else
<h1>Não existem tópicos no momento, seja o primeiro!</h1>
@endif