@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<div class="containerHome" style="min-height: 100vh;">
        <div class="containerUserHome">
            <h2 class="text-home">HOME</h2>
            @if($user != null)
            <p>Seja bem-vindo {{ $user->name }}</p>
            
            @else
            <p>Seja bem-vindo visitante!</p>
            @endif
        </div>

        <div class="containerButtonUserHome">
            @if($user == null)
            <a href="{{ route('Login') }}">
                <button class="button2">Login</button>
            </a>
            <a href="{{ route('Register') }}">
                <button class="button2">Register</button>
            </a>
            @endif
        </div>
</div>
@endsection
