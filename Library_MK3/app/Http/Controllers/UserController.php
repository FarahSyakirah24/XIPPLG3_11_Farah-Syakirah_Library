<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json([
            'status' => 200,
            'message' => 'Users retrieved successfully.',
            'data' => $users
        ], 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|integer'
        ]);

        $users = User::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'User retrieved successfully.',
            'data' => $users
        ], 201);
    }

    public function show($id)
    {
            $users = User::find($id);

            if (!$users) {
                return response()->json([
                    'status' => 404,
                    'message' => 'User not found.',
                    'data' => null
            ], 404);
        }

        return response()->json([
            'status' => 200,
            'message' => 'User retrieved successfully.',
            'data' => $users
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $users = User::find($id);

            if (!$users) {
                return response()->json([
                    'status' => 404,
                    'message' => 'User not found.',
                    'data' => null
            ], 404);
        }

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'required|string',
            'password' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|integer']);
        $users->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'User updated successfully.',
            'data' => $users
        ], 200);
    }

    public function destroy($id)
    {
        $users = User::find($id);

            if (!$users) {
                return response()->json([
                    'status' => 404,
                    'message' => 'User not found.',
                    'data' => null
            ], 404);
        }

        $users->delete();

        return response()->json([
            'status' => 200,
            'message' => 'User deleted successfully.',
            'data' => null
        ], 200);
    }
}