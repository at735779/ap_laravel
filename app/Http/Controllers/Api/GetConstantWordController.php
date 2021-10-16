<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConstantWord;

class GetConstantWordController extends Controller
{
    public function getConstantWord(Request $request) {
        $constant_words = ConstantWord::all();

        return response()->json(compact('constant_words'), 200);
    }
}
