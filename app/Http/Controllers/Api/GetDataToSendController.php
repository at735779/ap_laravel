<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataToSend;
use Illuminate\Support\Facades\Auth;

class GetDataToSendController extends Controller
{
    public function getDataToSend(Request $request) {
        $user_id = Auth::id();
        $data_to_send = DataToSend::where('user_id', $user_id)->get();
        return response()->json(compact('data_to_send'),200);
    }
}
