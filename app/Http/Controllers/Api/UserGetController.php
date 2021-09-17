<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGetController extends Controller
{
    public function userGet(Request $request) {
        return $request->user();
    }
}
