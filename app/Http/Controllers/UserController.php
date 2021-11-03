<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request): \Illuminate\Http\RedirectResponse
    {
        User::create($request->merge([
            'password' => Hash::make($request->get('password')),
        ])->all());

        return redirect()->route('users.index')->with('success', 'User have been registered');
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function update(User $user, UserUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {
        if($request->has('password')) {
            $request->merge([
                'password' => Hash::make($request->get('password')),
            ]);
        }

        $user->update($request->all());

        return redirect()->route('users.index');
    }

    public function destroy(User $user): \Illuminate\Http\RedirectResponse
    {
        $user->delete();

        return redirect()->back();
    }
}
