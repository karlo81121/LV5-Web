<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('update', ['data' => $user]);
    }

    public function update(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->role = $request->role;
        $user->save();

        return redirect('/users');
    }
}
