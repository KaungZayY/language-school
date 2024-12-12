<?php

namespace App\Http\Controllers\v1;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        try {
            $user = User::create($request->validated());

            if (!$user) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'An excepted error occured!',
                ], 500);
            }

            $token = $user->createToken($request->name);
            UserRegistered::dispatch($user);
            
            return response()->json([
                'user' => $user,
                'token' => $token->plainTextToken
            ],201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            $data = $request->validated();

            $user = User::where('email', $data['email'])->first();
            if(!$user || !Hash::check($data['password'], $user->password)){
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Invalid credentials!',
                ], 401);
            }

            $token = $user->createToken($user->name);
            return response()->json([
                'user' => $user,
                'token' => $token->plainTextToken
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Successfully logged out'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An unexpected error occurred. Please try again later.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
