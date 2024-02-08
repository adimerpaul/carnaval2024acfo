<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('nickname', 'password');
        //login con token
        $user = User::where('nickname', $credentials['nickname'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['error' => 'Credenciales incorrectas'], 401);
        }else{
            $token = $user->createToken('token')->plainTextToken;
            return response()->json(['token' => $token, 'user' => $user]);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Sesión cerrada']);
    }
    public function users()
    {
        $users = User::all();
        $users->each(function($user){
            $user->time = $this->timeCalculate(date('Y-m-d H:i:s'), $user->access);
        });
        return $users;
    }
    public function timeCalculate($timeNew, $timeOld){
        $timeNew = strtotime($timeNew);
        $timeOld = strtotime($timeOld);
        $time = $timeNew - $timeOld;
        return $time;
    }
}
