<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listAllUsers() {
        return view('users.listAllUsers');
    }

    public function listUserByID() {
        
    }

    public function createUser() {
        return view('users.createUser');
    }

    public function showProfile() {
        return view('users.userProfile');
    }

}
