<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $v = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password'  => 'required|min:3|confirmed',
        ]);

        if ($v->fails())
        {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }

        $user = new User;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['status' => 'success'], 200);
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     $tk = JWTAuth::attempt($credentials);

    //     if ($token = $this->guard()->attempt($credentials)) {
    //         return response()->json(['token' => $tk, 'token_type' => 'bearer','expires' => auth('api')->factory()->getTTL() * 60,], 200)->header('Authorization', $token);
    //     }

    //     return response()->json(['error' => 'login_error'], 401);
    // }

     public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            $tk = JWTAuth::attempt($credentials);
            return response()->json(['status' => 'success'], 200)->header('Authorization', $tk);
        }

        return response()->json(['error' => 'login_error'], 401);
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    // public function refresh() {
    //     return $this->respondWithToken(Auth::guard('api')->refresh());
    // }
    // private function guard()
    // {
    //     return Auth::guard('web');
    // }
      private function guard()
    {
        return Auth::guard();
    }

       public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'success'], 200)
                ->header('Authorization', $token);
        }

        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    
}