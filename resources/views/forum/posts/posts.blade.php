@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="container">
    
    <form action="" method="get" class="itemX">
    <h2 class="item2">Crie sua postagem</h2>
        @csrf
        <div class="item2">
            <label for="name" class="form-label">Título:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
    
        <div class="item2">
            <label for="email" class="form-label">Tópico:</label>
            <input type="email" id="email" name="email" class="form-control"  value="{{ old('email') }}" required>
        </div>
    
        <div class="item3">
            <label for="password" class="form-label">Descrição:</label>
            <input type="text" id="password" name="password" class="form-control">
        </div>

        <div class="item3">
            <label for="password" class="form-label">Tags:</label>
            <input type="text" id="password" name="password" class="form-control">
        </div>
    
        <input type="submit" class="item4 button" value="Enviar">
    </form>
</div>
@endsection
