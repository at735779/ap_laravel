<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InterestWord;
use Illuminate\Support\Facades\Auth;

class PostInterestWordController extends Controller
{
    public function postInterestWord(Request $request)
    {
        $user_id = Auth::id();

        // 登録ワードの初期化
        InterestWord::where('user_id', $user_id)->delete();

        // 「ワード」と「userテーブルとの紐付ID」の登録
        foreach ($request->request as $word) {
                $interest_word = new InterestWord;
                $interest_word->word = $word;
                $interest_word->user_id = $user_id;
                $interest_word->save();
        }
    }
}