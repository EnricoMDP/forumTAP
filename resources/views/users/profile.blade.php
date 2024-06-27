@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="container d-flex justify-content-center align-items-center flex-column" style="min-height: 100vh;">
    
    <span>{{ session('message') }}</span>
    @if($user != null)
    <form action="{{ route('UpdateUser', [$user->id]) }}" method="POST" class="itemX">
        <h2 class="item2">Perfil</h2>
        @csrf
        @method('put')
        <div class="item2">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>
    
        <div class="item2">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>
    
        <div class="item3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('password') <span>{{ $message }}</span> @enderror
        </div>
    
        <input type="submit" class="item4 button" value="Enviar">
    </form>

    <form action="{{ route('DeleteUser', [$user->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="item4 button">Deletar</button>
    </form>
    @endif
</div>
@endsection
