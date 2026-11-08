<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    // Show Create User form
    public function create()
    {
        return view('users.create');
    }

    // Store new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username',
            'full_name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'username' => $validated['username'],
            'full_name' => $validated['full_name'],
            'password' => $validated['password'],
        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User added successfully!');
    }

    // Show Edit User form
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Update user information and avatar
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'full_name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update basic information
        $user->username = $validated['username'];
        $user->full_name = $validated['full_name'];

        // Update password only when provided
        if ($request->filled('password')) {
            $user->password = $validated['password'];
        }

        // Process uploaded avatar
        if ($request->hasFile('avatar')) {

            $image = Image::read($request->file('avatar'))
                ->cover(300, 300)
                ->toJpeg(85);

            $avatarPath = 'avatars/' . Str::uuid() . '.jpg';

            // Store prepared image
            Storage::disk('public')->put(
                $avatarPath,
                (string) $image
            );

            // Delete previous avatar
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Save image path
            $user->avatar = $avatarPath;
        }

        $user->save();

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully!');
    }
}