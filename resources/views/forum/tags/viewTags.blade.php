@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/allUsers.css') }}">
<div class="containerAllUsers">
        <ul class="user-list">
        <h2>Lista de tags</h2>
            <div class="">
                @foreach($tags as $tag)
                <div class="">
                    <div class="">
                        <div class="">
                            <h5 class="">{{ $tag->title }}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
        </ul>
    
</div>
@endsection

