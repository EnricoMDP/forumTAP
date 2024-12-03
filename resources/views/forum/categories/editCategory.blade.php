@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    
    <span>{{ session('message') }}</span>
    @if($category != null)
    <form action="{{ route('UpdateCategory', [$category->id]) }}" method="POST" class="itemX">
        <h2 class="item2">Categorias</h2>
        @csrf
        @method('put')
        <div class="item2">
            
            <label for="title" class="form-label">Título:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $category->title }}" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
    
        <div class="item2">
            <label for="description" class="form-label">Descrição:</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ $category->description }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>
    
        <input type="submit" class="item4 button" value="Enviar">
    </form>
    @endif
</div>
@endsection
