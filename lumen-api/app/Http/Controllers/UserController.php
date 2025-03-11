<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = DB::table('users')->where('username', $request->username)->first();

        if (!$user || $request->password !== $user->password) {
            return response()->json([
                'message' => 'Invalid username or password'
            ], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'age' => $user->age
            ]
        ]);
    }
}
