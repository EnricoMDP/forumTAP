@extends('layouts.header_footer')

@section('content')
<link rel="stylesheet" href="{{ asset('css/allUsers.css') }}">
<div class="containerAllUsers">
        <ul class="user-list">
        <h2>Lista de Usuários</h2>
            <div class="">
                @foreach($users as $user)
                <div class="">
                    <div class="">
                        <div class="">
                            <h5 class="">{{ $user->name }}</h5>
                            
                            <p class="">{{ $user->email }}</p>
                            <button class="button9">Suspender</button>
                            <button class="button9">Banir</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
        </ul>
    
</div>
@endsection

