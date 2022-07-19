<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function list()
    {
        $userList = User::all();
        return view(view: 'user.index')->with('userList', $userList);
    }

    function show($userId)
    {
        $user = User::find($userId);
        return view(view: 'user.show')->with('user', $user);
    }
}
