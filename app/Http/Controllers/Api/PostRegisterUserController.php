<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PostRegisterUserController extends Controller
{
    public function registerUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $regist_result = $user->save();
        return response()->json(compact('regist_result'),200);
    }
}
