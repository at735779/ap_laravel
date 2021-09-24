<?php

namespace app\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGetController extends Controller
{
    public function userGet(Request $request) {
        $user = $request->user();
        return response()->json(compact('user'),200);
    }
}
