<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request) {
        // 1. Setup Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:8'
        ]);

        // 2. Cek Validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Create User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // 4. Cek keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'user' => $user
            ], 201);
        }

        // 5. Cek gagal
        return response()->json([
            'success' => false,
            'message' => 'User creation failed'
        ], 409); //conflict
    }

    public function login(Request $request) {
        // 1. Setup Validator
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // 2. Cek Validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 3. Get kredensial dari request yang dikirim oleh postman
        $credentials = $request->only('email', 'password');

        // 4. cek isFailed
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password anda salah'
            ], 401);
        }

        // 5. Cek isSUccess
        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'user' => auth()->guard('api')->user(),
            'token' => $token
        ], 200);
    }

    public function logout() {
        // try
        // 1. Invalidate token
        // 2. cek isSuccess

        // catch
        // 1. Cek isFailed
        try{
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'message' => 'Logout successfully!'
            ], 200);
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Logout failed!'
            ], 500);
        }
    }

}
