<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listAllUsers(Request $request) {
        return view('users.listAllUsers');
    }

    public function listUser(Request $request, $uid) {
        print($uid);
    }

    public function createUser() {
        return view('users.createUser');
    }

    public function showProfile() {
        return view('users.userProfile');
    }

}
