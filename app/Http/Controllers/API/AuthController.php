<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        // Ambil email
        $user = User::where('email', $request->email)->first();

        // Check jika user ada
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah'
            ], 401);
        }

        $token = $user->createToken('token_name')->plainTextToken;

        return response()->json([
            'message' => 'Berhasil login',
            'user' => $user,
            'token' => $token
        ], 200);
    }
}
