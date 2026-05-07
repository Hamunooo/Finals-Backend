<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        $user = User::all();
        return response()->json($user);
    }
    function add(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:5',
            'role' => 'required|string|in:admin,seller,customer',
        ]);

        $User = User::create($validated);

        return response()->json($User, 201);
    }
    function update(Request $request)
    {
        $find = User::findOrFail($request->id);
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:5',
            'role' => 'required|string|in:admin,seller,customer',
        ]);
        $find->update($validated);
        return redirect('/dashboard');
    }
    function delete(int $id) {
        $find = User::findOrFail($id);
        $find->delete();
        return redirect('/dashboard');
    }
}
