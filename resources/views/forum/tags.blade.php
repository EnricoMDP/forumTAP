@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/topics.css') }}">
<div class="TopicsContainer">
    <ul class="topics-list">
    <a href="">
        <i class="fa fa-plus-square"></i>
    </a>
    <a href="">
        <i class="fa fa-pencil-square"></i>
    </a>
    <a href="">
        <i class="fa fa-trash"></i>
    </a>
    <h2>Lista de Tags</h2>
        <div class="">
            <h5 class="">Tópico:</h5>
            <p class="">php</p>

            <h5 class="">Tópico:</h5>
            <p class="">ruby</p>

            <h5 class="">Tópico:</h5>
            <p class="">elixir</p>

            <h5 class="">Tópico:</h5>
            <p class="">lua</p>

            <h5 class="">Tópico:</h5>
            <p class="">cobol</p>
        </div>
    </ul>
</div>
@endsection
