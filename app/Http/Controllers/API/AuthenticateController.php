<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Laravel\Passport\Passport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 500,
                'message' => 'Invalid email or password'
            ]);
        }

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();

            if ($request->remember_me == 'true') {
                Passport::personalAccessTokensExpireIn(now()->addWeek());
            }

            $token = $this->getToken($user);

            $user->token = $token;

            return response()->json([
                'status' => 200,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Account has been deactivate'
            ]);
        }
    }

    public function getToken($user)
    {
        return $user->createToken('token')->accessToken;
    }
}
