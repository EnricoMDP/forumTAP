@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    
    <span>{{ session('message') }}</span>
    @if($tag != null)
    <form action="{{ route('UpdateTag', [$tag->id]) }}" method="POST" class="itemX">
        <h2 class="item2">Editar tag</h2>
        @csrf
        @method('put')
        <div class="item2">
            
            <label for="title" class="form-label">Título:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $tag->title }}" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
    
    
        <input type="submit" class="item4 button" value="Enviar">
    </form>

    <form action="{{ route('DeleteTag', [$tag->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="item4 button">Deletar</button>
    </form>
    @endif
</div>
@endsection
