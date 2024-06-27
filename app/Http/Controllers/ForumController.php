<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ForumController extends Controller
{
    public function mainForum() {
        $users = User::all(); // Busca todos os usuários
        return view('forum.mainForum', ['users' => $users]); // Retorna a view com os dados dos usuários
    }

    public function topics() {
        return view('forum.topics');
    }

    public function posts() {
        return view('forum.posts');
    }

    public function tags() {
        return view('forum.tags');
    }

}
