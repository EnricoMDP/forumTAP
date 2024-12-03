@extends('layouts.header_footer')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Users List</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped table-info table-hover text-center shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <!-- @if($user->is_banned)
                            <span class="badge bg-danger">Banned</span>
                        @elseif($user->is_suspended)
                            <span class="badge bg-warning text-dark">Suspended</span>
                        @else
                            <span class="badge bg-success">Active</span>
                        @endif -->
                    </td>
                    <td>
                        <!-- Botão para suspender -->
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-warning btn-sm">Suspend</button>
                        </form>

                        <!-- Botão para banir -->
                        <form action="" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger btn-sm">Ban</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($users->isEmpty())
        <p class="text-center">No users found.</p>
    @endif
</di
