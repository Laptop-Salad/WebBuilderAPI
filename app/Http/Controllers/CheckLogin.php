<?php

namespace App\Http\Controllers;

use App\Response;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin extends Controller
{
    use Response;
    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials)) {
                return response([
                    'access_token' => auth()->user()->createToken('auth_token')->plainTextToken,
                    'payload' => [
                        'id' => auth()->user()->id,
                        'email' => auth()->user()->email,
                    ],
                ]);
            }

            return response('User not found', 404);
        } catch (Exception $e) {
            return response('Email or password invalid.', 400);
        }
    }
}
