@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/allUsers.css') }}">
<div class="containerAllUsers">
        <ul class="user-list">
        <h2>Lista de categorias</h2>
            <div class="">
                @foreach($categories as $category)
                <div class="">
                    <div class="">
                        <div class="">
                            <h5 class="">{{ $category->title }}</h5>
                            
                            <p class="">{{ $category->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
        </ul>
    
</div>
@endsection

