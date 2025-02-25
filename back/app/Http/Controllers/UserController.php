<?php

namespace App\Http\Controllers;

use App\Models\Dancer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    function updateData(Request $request){
        $dancers = $request->dancers;
        foreach ($dancers as $dancer){
//            error_log($dancer['nombre']);
            $dancerFind = Dancer::where('id', ($dancer['id']-1))->first();
            if($dancerFind) {
                $dancerFind->lat = $dancer['lat'];
                $dancerFind->lng = $dancer['lng'];
                $dancerFind->save();
                error_log('Dancer'.json_encode($dancerFind));
            }

        }
        $dancers = Dancer::where('lat', '!=', 0)->where('lng', '!=', 0)->get();

        $this->soketIO('dance', $dancers->toArray());
        return $dancers;
    }
    public function login(Request $request)
    {
        $credentials = $request->only('nickname', 'password');
        //login con token
        $user = User::where('nickname', $credentials['nickname'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }else{
            $token = $user->createToken('token')->plainTextToken;
            return response()->json(['token' => $token, 'user' => $user]);
        }
    }
    function me(Request $request){
        return $request->user();
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
