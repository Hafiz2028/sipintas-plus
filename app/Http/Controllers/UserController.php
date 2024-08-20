<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $currentUserId = auth()->id();
        $users = User::where('id', '!=', $currentUserId)->get();
        $data = [
            'users' => $users
        ];
        return view('back.pages.adminUser', $data);
    }

    public function getUsers()
    {
        $currentUserId = auth()->id();
        $users = User::where('id', '!=', $currentUserId)->get();
        $data = [
            'users' => $users
        ];
        return response()->json($data);
    }
    public function store(Request $request)
    {
        try {
            Log::info('Received request to store user', $request->all());
            $request->validate([
                'name' => 'required|string|max:255',
                'nip' => 'required|string|max:255',
                'no_hp' => 'required|string|max:255',
                'opd' => 'required|string|max:255',
                'password' => 'required|string|max:255|confirmed',
                'role' => 'required|string|max:255',
            ]);

            $user = User::create([
                'name' => $request->name,
                'nip' => $request->nip,
                'no_hp' => $request->no_hp,
                'opd' => $request->opd,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);
            Log::info('User created successfully', ['user' => $user]);
            return response()->json($user, 201);
        } catch (\Exception $e) {
            Log::error('Error in store method', ['exception' => $e]);
            return response()->json(['error' => 'Failed to save user'], 500);
        }
    }
    public function update(Request $request, string $id)
    {
        try {
            Log::info('Received request to Update user', $request->all());
            $request->validate([
                'name' => 'required|string|max:255',
                'nip' => 'required|string|max:255',
                'no_hp' => 'required|string|max:255',
                'opd' => 'required|string|max:255',
                'password' => 'required|string|max:255|confirmed',
                'role' => 'required|string|max:255',
            ]);
            $user = User::findOrFail($id);
            $user->update([
                'name' => $request->name,
                'nip' => $request->nip,
                'no_hp' => $request->no_hp,
                'opd' => $request->opd,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);
            Log::info('User update successfully', ['user' => $user]);
            return response()->json($user, 201);
        } catch (\Exception $e) {
            Log::error('Error in update method', ['exception' => $e]);
            return response()->json(['error' => 'Failed to update user'], 500);
        }
    }
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(null, 204);
    }
    public function create() {}
    public function show(string $id) {}
    public function edit(string $id) {}
}
