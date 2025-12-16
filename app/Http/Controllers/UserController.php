<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|unique:users|max:255',
            'contact_no' => 'nullable|max:20',
            'email' => 'required|email|unique:users',
            'address' => 'nullable|max:500',
            'status' => 'required|in:active,inactive,suspended',
        ]);

        $user = User::create($validated);

        return redirect()->route('users.show', $user->user_id)
                        ->with('success', 'User created successfully!');
    }

    /**
     * Display the specified user
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'user_name' => 'required|unique:users,user_name,' . $user->user_id . ',user_id|max:255',
            'contact_no' => 'nullable|max:20',
            'email' => 'required|email|unique:users,email,' . $user->user_id . ',user_id',
            'address' => 'nullable|max:500',
            'status' => 'required|in:active,inactive,suspended',
        ]);

        $user->update($validated);

        return redirect()->route('users.show', $user->user_id)
                        ->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified user from storage
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
                        ->with('success', 'User deleted successfully!');
    }
}
