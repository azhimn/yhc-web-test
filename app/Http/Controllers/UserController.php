<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('admin.user.show', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'admin' => 'required|boolean',
        ]);

        $user = User::create($request->all());
        return redirect()->route('users.index')->with('success', 'Pengguna "' . $user->title . '" berhasil dibuat!');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'required|confirmed',
            'admin' => 'required|boolean',
        ]);

        User::create($request->all());
        return redirect()->route('users.index')->with('success', 'Pengguna "' . $user->title . '" berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        $name = $user->name;
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna "' . $name . '" berhasil dihapus!');
    }
}
