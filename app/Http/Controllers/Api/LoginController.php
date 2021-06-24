<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'string',
        ]);

        $user = User::where('email', '=', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {

            $device_name = $request->input('device_name', $request->userAgent());
            $token = $user->createToken($device_name, [
                'products.create', 'products.update'
            ]);

            $token->accessToken->forceFill([
                'ip' => $request->ip(),
            ])->update();

            return [
                'token' => $token->plainTextToken,
            ];
        }



        return response()->json([
            'message' => 'Invalid email and password',
        ], 401);

    }

    public function logout(Request $request)
    {
        $user = $request->user();

        // Logout from current device
        $user->currentAccessToken()->delete();

        return [
            'message' => 'Logged out',
        ];
    }

    public function logoutAll(Request $request)
    {
        $user = $request->user();

        // Logout from all devices
        $user->tokens()->delete();

        return [
            'message' => 'Logged out',
        ];
    }
}
