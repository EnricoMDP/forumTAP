@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<div class="container">
    <form action="{{ route('Login')}}" method="POST" class="itemX">
    <h3 class="item2">Login</h3>
        @csrf
        <div class="item2">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control"  value="{{ old('email') }}" required>
            @error('email') <span>{{$message}}</span> @enderror
        </div>
    
        <div class="item3">
            <label for="password" class="form-label">Senha:</label>
            <input type="password" id="password" name="password" class="form-control">
            @error('email') <span>{{$message}}</span> @enderror
        </div>
    
        <input type="submit" class="item4 button" value="Enviar">
    </form>
</div>
@endsection
