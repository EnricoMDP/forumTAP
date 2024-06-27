<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listAllUsers() {
        $users = User::all(); // Busca todos os usuários
        return view('users.listAllUsers', ['users' => $users]); // Retorna a view com os dados dos usuários
    }

    public function index() {
        $user = Auth::user();
        return view('users.home', compact('user'));
    }

    public function listUserById(Request $request,$uid) {
        $user = User::where('id', $uid)->first();
        return view('users.profile', ['user' => $user]);
        // return view('users.find');
    }

    public function updateUser(Request $request, $uid) {
        $user = User::where('id', $uid)->first();
        $user->name = $request-> name;
        $user->email = $request-> email;
        if($request -> password != '') {
            $user ->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('ListAllUsers', [$user->id])
            ->with('message', 'Atualizado com sucesso!');
    }

    
public function register(Request $request) {
    if ($request->isMethod('GET')) {
        return view('users.create');
    } else {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('ListAllUsers');
    }
}

    public function editUser() {
        return view('users.edit');
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('ListAllUsers')->with('success', 'User deleted successfully');
    }
    
}
